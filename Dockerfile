# ===============================
# Stage 1: Build Frontend (Vite)
# ===============================
FROM node:18 AS frontend

WORKDIR /app

# Copy package files and install dependencies
COPY package*.json ./
RUN npm ci

# Copy all source files and build
COPY . .
RUN npm run build

# ===============================
# Stage 2: Backend (Laravel + PHP)
# ===============================
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev zip \
    nginx supervisor \
    && docker-php-ext-install pdo pdo_mysql mbstring zip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy composer files first for better caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Copy Laravel app files
COPY . .

# Copy frontend build into public directory
COPY --from=frontend /app/public/build ./public/build

# Complete composer installation
RUN composer dump-autoload --optimize

# Create SQLite database if it doesn't exist
RUN touch /var/www/html/database/database.sqlite

# Create necessary directories and set permissions for Laravel
RUN mkdir -p /var/www/html/storage/framework/sessions \
    && mkdir -p /var/www/html/storage/framework/views \
    && mkdir -p /var/www/html/storage/framework/cache \
    && mkdir -p /var/www/html/storage/logs \
    && mkdir -p /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache \
    && chmod -R 755 /var/www/html/public \
    && chmod 664 /var/www/html/database/database.sqlite

# NGINX configuration
COPY nginx.conf /etc/nginx/sites-available/default

# Create supervisor config
RUN echo '[supervisord]\n\
nodaemon=true\n\
user=root\n\
logfile=/var/log/supervisor/supervisord.log\n\
pidfile=/var/run/supervisord.pid\n\
\n\
[program:php-fpm]\n\
command=/usr/local/sbin/php-fpm -F\n\
autostart=true\n\
autorestart=true\n\
priority=5\n\
stdout_logfile=/dev/stdout\n\
stdout_logfile_maxbytes=0\n\
stderr_logfile=/dev/stderr\n\
stderr_logfile_maxbytes=0\n\
\n\
[program:nginx]\n\
command=/usr/sbin/nginx -g "daemon off;"\n\
autostart=true\n\
autorestart=true\n\
priority=10\n\
stdout_logfile=/dev/stdout\n\
stdout_logfile_maxbytes=0\n\
stderr_logfile=/dev/stderr\n\
stderr_logfile_maxbytes=0' > /etc/supervisor/conf.d/supervisord.conf

# Create startup script
RUN echo '#!/bin/bash\n\
set -e\n\
\n\
# Force SQLite configuration (override any Render auto-config)\n\
export DB_CONNECTION=sqlite\n\
export DB_DATABASE=/var/www/html/database/database.sqlite\n\
unset DATABASE_URL\n\
unset DB_HOST\n\
unset DB_PORT\n\
unset DB_USERNAME\n\
unset DB_PASSWORD\n\
\n\
# Ensure storage directories exist and have correct permissions\n\
mkdir -p /var/www/html/storage/framework/sessions\n\
mkdir -p /var/www/html/storage/framework/views\n\
mkdir -p /var/www/html/storage/framework/cache/data\n\
mkdir -p /var/www/html/storage/logs\n\
mkdir -p /var/www/html/bootstrap/cache\n\
\n\
# Set ownership and permissions\n\
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database\n\
chmod -R 775 /var/www/html/storage\n\
chmod -R 775 /var/www/html/bootstrap/cache\n\
chmod 664 /var/www/html/database/database.sqlite 2>/dev/null || true\n\
\n\
# Generate APP_KEY if not set\n\
if [ -z "$APP_KEY" ]; then\n\
    php artisan key:generate --force\n\
fi\n\
\n\
# Run migrations\n\
php artisan migrate --force\n\
\n\
# Create admin user if it does not exist\n\
php artisan db:seed --class=AdminUserSeeder --force\n\
\n\
# Clear ALL caches before recaching\n\
php artisan cache:clear\n\
php artisan config:clear\n\
php artisan route:clear\n\
php artisan view:clear\n\
\n\
# Now cache with correct configuration\n\
php artisan config:cache\n\
php artisan route:cache\n\
\n\
# Fix permissions one more time after artisan commands\n\
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache\n\
chmod -R 775 /var/www/html/storage\n\
chmod -R 775 /var/www/html/bootstrap/cache\n\
\n\
# Start supervisor\n\
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf' > /usr/local/bin/start.sh \
    && chmod +x /usr/local/bin/start.sh

# Expose port 80
EXPOSE 80

# Start application
CMD ["/usr/local/bin/start.sh"]
