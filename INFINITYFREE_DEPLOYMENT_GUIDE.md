# InfinityFree Deployment Guide for Laravel

## ⚠️ IMPORTANT WARNINGS

InfinityFree is **NOT recommended** for Laravel applications due to:
- No SSH access (can't run `php artisan` commands)
- No Composer on server (can't install dependencies)
- Limited PHP configuration
- No email sending capabilities
- Database management limitations

**Recommended alternatives**: Hostinger ($2/month), Namecheap, DigitalOcean, or Heroku

---

## Prerequisites

Before starting, ensure you have:
- [ ] InfinityFree account created
- [ ] Your Laravel project working locally
- [ ] FileZilla or another FTP client installed
- [ ] Database exported from Railway (if applicable)

---

## Step 1: Prepare Your Laravel Project Locally

### 1.1 Optimize for Production

```bash
# Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Install dependencies (production only)
composer install --optimize-autoloader --no-dev
```

### 1.2 Update .env for Production

Create a `.env.production` file:

```env
APP_NAME="Salenga Farm System"
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.infinityfreeapp.com

DB_CONNECTION=mysql
DB_HOST=sqlXXX.infinityfree.com
DB_PORT=3306
DB_DATABASE=epizXXXX_database
DB_USERNAME=epizXXXX_user
DB_PASSWORD=your_password

# InfinityFree doesn't support email, use log driver
MAIL_MAILER=log
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="${APP_NAME}"

# Use file-based sessions and cache
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync

# Disable broadcasting
BROADCAST_CONNECTION=log

# File storage
FILESYSTEM_DISK=public
```

### 1.3 Create .htaccess for Public Folder

Create `public/.htaccess`:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

### 1.4 Create Root .htaccess

Create `.htaccess` in root:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

---

## Step 2: Set Up InfinityFree Account

### 2.1 Create Account
1. Go to https://infinityfree.net
2. Click "Sign Up"
3. Choose a subdomain (e.g., `salengafarm.infinityfreeapp.com`)
4. Complete registration

### 2.2 Access Control Panel
1. Log in to InfinityFree
2. Go to "Control Panel" (cPanel)
3. Note your FTP credentials

### 2.3 Create MySQL Database
1. In cPanel, find "MySQL Databases"
2. Create a new database
3. Create a database user
4. Add user to database with ALL PRIVILEGES
5. Note down:
   - Database name (e.g., `epiz12345_salenga`)
   - Database user (e.g., `epiz12345_user`)
   - Database password
   - Database host (e.g., `sql123.infinityfree.com`)

---

## Step 3: Prepare Files for Upload

### 3.1 Create Upload Package

```bash
# Create a deployment folder
mkdir deployment
cd deployment

# Copy necessary files (exclude node_modules, .git, etc.)
# You'll need to do this manually or use a script
```

### 3.2 Files to Upload:
- ✅ `app/` folder
- ✅ `bootstrap/` folder
- ✅ `config/` folder
- ✅ `database/` folder (migrations, seeders)
- ✅ `public/` folder
- ✅ `resources/` folder
- ✅ `routes/` folder
- ✅ `storage/` folder (with proper structure)
- ✅ `vendor/` folder (from `composer install --no-dev`)
- ✅ `.env` file (renamed from `.env.production`)
- ✅ `.htaccess` files (root and public)
- ✅ `artisan` file
- ✅ `composer.json` and `composer.lock`

### 3.3 Files to EXCLUDE:
- ❌ `node_modules/`
- ❌ `.git/`
- ❌ `.env.example`
- ❌ `tests/`
- ❌ `.gitignore`
- ❌ `README.md`
- ❌ Development files

---

## Step 4: Upload Files via FTP

### 4.1 Connect with FileZilla
1. Open FileZilla
2. Enter FTP credentials:
   - Host: `ftpupload.net` or your specific FTP host
   - Username: Your InfinityFree username
   - Password: Your FTP password
   - Port: 21
3. Click "Quickconnect"

### 4.2 Upload Structure

**IMPORTANT**: InfinityFree uses `htdocs` as the web root.

Upload structure:
```
htdocs/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/          ← This contains your public files
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── .htaccess        ← Root htaccess (redirects to public/)
├── artisan
└── composer.json
```

### 4.3 Upload Process
1. Navigate to `htdocs` folder in FileZilla (right panel)
2. Select all your Laravel files (left panel)
3. Right-click → Upload
4. Wait for upload to complete (may take 30-60 minutes)

---

## Step 5: Configure Storage Permissions

Since you can't use SSH, you need to ensure storage folders exist:

### 5.1 Create Storage Folders via FTP
Make sure these folders exist in `storage/`:
```
storage/
├── app/
│   ├── public/
│   │   ├── avatars/
│   │   ├── display-plant-photos/
│   │   ├── plant-photos/
│   │   └── site-visits/
│   └── pdfs/
├── framework/
│   ├── cache/
│   │   └── data/
│   ├── sessions/
│   └── views/
└── logs/
```

### 5.2 Set Permissions via cPanel
1. Go to cPanel → File Manager
2. Navigate to `storage` folder
3. Right-click → Change Permissions
4. Set to `755` for folders
5. Set to `644` for files

---

## Step 6: Import Database

### 6.1 Export from Railway (if applicable)
```bash
# If you have Railway database access
mysqldump -u username -p database_name > database_backup.sql
```

### 6.2 Import to InfinityFree
1. Go to cPanel → phpMyAdmin
2. Select your database
3. Click "Import" tab
4. Choose your `.sql` file
5. Click "Go"

**Note**: InfinityFree has a 10MB upload limit. If your database is larger:
- Split the SQL file into smaller parts
- Or use BigDump script (search "BigDump PHP")

---

## Step 7: Configure Laravel

### 7.1 Update .env File
1. Go to cPanel → File Manager
2. Navigate to `htdocs`
3. Edit `.env` file
4. Update database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=sql123.infinityfree.com
DB_PORT=3306
DB_DATABASE=epiz12345_salenga
DB_USERNAME=epiz12345_user
DB_PASSWORD=your_actual_password
```

### 7.2 Generate Application Key (Manual Method)

Since you can't run `php artisan key:generate`, do this:

1. Go to https://generate-random.org/laravel-key-generator
2. Generate a key
3. Update `.env`:
```env
APP_KEY=base64:generated_key_here
```

---

## Step 8: Test Your Application

### 8.1 Access Your Site
Visit: `https://yourdomain.infinityfreeapp.com`

### 8.2 Common Issues and Fixes

**Issue 1: 500 Internal Server Error**
- Check `.htaccess` files are uploaded
- Check `storage/` and `bootstrap/cache/` permissions
- Check `.env` file exists and has correct database credentials

**Issue 2: "No input file specified"**
- Check root `.htaccess` redirects to `public/`
- Ensure `public/.htaccess` exists

**Issue 3: Database Connection Error**
- Verify database credentials in `.env`
- Ensure database user has ALL PRIVILEGES
- Check database host is correct

**Issue 4: CSS/JS Not Loading**
- Run `npm run build` locally before uploading
- Upload `public/build/` folder
- Check `APP_URL` in `.env`

**Issue 5: File Uploads Not Working**
- Check `storage/app/public/` exists
- Verify folder permissions (755)
- InfinityFree may have file size limits

---

## Step 9: Limitations and Workarounds

### 9.1 Email Sending
InfinityFree blocks SMTP. Workarounds:
- Use external email API (SendGrid, Mailgun)
- Use contact form services
- Upgrade to paid hosting

### 9.2 Cron Jobs
InfinityFree doesn't support cron jobs. Workarounds:
- Use external cron services (cron-job.org)
- Manually trigger scheduled tasks

### 9.3 Migrations
Can't run `php artisan migrate`. Workarounds:
- Run migrations locally
- Export database and import to InfinityFree
- Use phpMyAdmin to run SQL manually

### 9.4 Performance
Free hosting is slow. Expect:
- Slow page loads
- Limited concurrent users
- Possible downtime

---

## Step 10: Maintenance

### 10.1 Updating Code
1. Make changes locally
2. Test thoroughly
3. Upload changed files via FTP
4. Clear cache by deleting files in:
   - `storage/framework/cache/data/`
   - `storage/framework/views/`

### 10.2 Database Backups
1. Go to cPanel → phpMyAdmin
2. Select database
3. Click "Export"
4. Download SQL file
5. Store safely

### 10.3 File Backups
1. Use FileZilla to download entire `htdocs` folder
2. Store locally
3. Do this weekly

---

## Troubleshooting

### Check PHP Version
Create `info.php` in `public/`:
```php
<?php
phpinfo();
```
Visit: `yourdomain.infinityfreeapp.com/info.php`
Delete after checking!

### Check Laravel Logs
Download `storage/logs/laravel.log` via FTP to see errors

### Enable Debug Mode (Temporarily)
In `.env`:
```env
APP_DEBUG=true
```
**Remember to set back to `false` after debugging!**

---

## Alternative: Better Hosting Options

If InfinityFree doesn't work well, consider:

### Hostinger ($2-3/month)
- Full Laravel support
- SSH access
- Composer available
- Email sending works
- Better performance

### DigitalOcean ($4/month)
- Full control
- SSH access
- Best for Laravel
- Scalable

### Heroku (Free tier)
- Easy deployment
- Git-based
- Automatic deployments
- Better than InfinityFree

---

## Need Help?

If you encounter issues:
1. Check `storage/logs/laravel.log`
2. Check InfinityFree forums
3. Consider upgrading to paid hosting
4. Ask for help with specific error messages

---

## Summary Checklist

- [ ] Laravel project optimized for production
- [ ] InfinityFree account created
- [ ] Database created and credentials noted
- [ ] Files uploaded via FTP
- [ ] Storage permissions set
- [ ] Database imported
- [ ] .env file configured
- [ ] Application key generated
- [ ] Site tested and working
- [ ] Backups configured

---

**Good luck with your deployment! Remember, InfinityFree has limitations. If you face issues, consider paid hosting for better Laravel support.**
