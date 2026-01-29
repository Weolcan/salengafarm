# --------------------------
# Stage 1: Build Frontend
# --------------------------
FROM node:18 AS frontend
WORKDIR /app

# Copy only package files first for caching
COPY package*.json ./
RUN npm install

# Copy all frontend source files
COPY . .

# Build frontend
RUN npm run build


# --------------------------
# Stage 2: Backend (Laravel + PHP)
# --------------------------
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel app files
COPY . .

# Copy frontend build (optional)
COPY --from=frontend /app/public/dist ./public/dist

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Clear caches
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Set permissions (important for storage & cache)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose Render port
ENV PORT=10000

# Run Laravel using the Render $PORT
CMD php artisan serve --host=0.0.0.0 --port=$PORT
