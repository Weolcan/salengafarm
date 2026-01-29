# Production Deployment Checklist for Render

## ✅ Completed Fixes

1. **HTTPS Asset URLs** - Added `URL::forceScheme('https')` in AppServiceProvider
2. **SQLite Database** - Fixed DB_CONNECTION and DB_DATABASE configuration
3. **Migration Compatibility** - Updated migration to support both MySQL and SQLite
4. **Docker Build** - Optimized Dockerfile with proper permissions
5. **Nginx Configuration** - Added static file caching and proper routing
6. **Frontend Build** - Vite assets building correctly

## 🔧 Required Render Environment Variables

Make sure these are set in your Render dashboard:

```
APP_NAME=Salengap
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:qlS+7gx+DbZJrU2fU27Bbcy/ZXj89Xb4JMZO9egTAsQ=
APP_URL=https://salengafarm.onrender.com

DB_CONNECTION=sqlite
DB_DATABASE=/var/www/html/database/database.sqlite

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

LOG_CHANNEL=stack
LOG_LEVEL=error

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=farmsalenga@gmail.com
MAIL_PASSWORD=hgjmrdknbdddvzox
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=farmsalenga@gmail.com
MAIL_FROM_NAME=Salengap
```

## ⚠️ Important Notes

### Database
- Using SQLite for simplicity on free tier
- Database file persists in container (will reset on redeploy)
- For production with data persistence, consider upgrading to PostgreSQL

### Email
- Gmail SMTP configured
- May need to enable "Less secure app access" or use App Password
- Test email functionality after deployment

### File Uploads
- User avatars stored in `storage/app/public/avatars`
- Plant photos stored in `storage/app/public/plant-photos`
- Files will be lost on container restart (ephemeral storage)
- Consider using S3 or similar for persistent file storage

### Performance
- Free tier spins down after 15 minutes of inactivity
- First request after spin-down takes ~30 seconds
- Consider upgrading to paid tier for production use

## 🚀 Deployment Steps

1. Ensure all environment variables are set in Render
2. Push code to GitHub
3. Render auto-deploys on push to main branch
4. Monitor logs in Render dashboard
5. Test the site after deployment

## 🐛 Troubleshooting

### Assets not loading
- Check browser console for mixed content errors
- Verify APP_URL is set to HTTPS
- Clear Laravel cache: `php artisan config:clear`

### Database errors
- Verify DB_CONNECTION=sqlite
- Verify DB_DATABASE=/var/www/html/database/database.sqlite
- Check migrations ran successfully in logs

### 500 Errors
- Check Render logs
- Verify APP_KEY is set
- Check storage permissions

## 📝 Post-Deployment Tasks

1. Create admin user (if needed)
2. Test login/registration
3. Test file uploads
4. Test email notifications
5. Verify all pages load correctly
6. Check mobile responsiveness

## 🔐 Security Recommendations

1. Change APP_KEY for production
2. Use environment-specific email credentials
3. Enable rate limiting
4. Set up proper backup strategy
5. Monitor error logs regularly
