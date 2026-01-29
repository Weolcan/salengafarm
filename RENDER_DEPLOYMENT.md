# Render Deployment Guide for Salengap

## Prerequisites
1. GitHub repository with your code
2. Render account (free tier works)

## Step-by-Step Deployment

### 1. Prepare Your Repository

Make sure these files are committed to your GitHub repo:
- `Dockerfile` (updated)
- `render.yaml` (new)
- `.dockerignore` (new)
- `nginx.conf`

### 2. Push to GitHub

```bash
git add .
git commit -m "Add Render deployment configuration"
git push origin main
```

### 3. Deploy on Render

#### Option A: Using render.yaml (Recommended)

1. Go to [Render Dashboard](https://dashboard.render.com/)
2. Click "New +" → "Blueprint"
3. Connect your GitHub repository
4. Render will automatically detect `render.yaml`
5. Click "Apply"

#### Option B: Manual Setup

1. Go to [Render Dashboard](https://dashboard.render.com/)
2. Click "New +" → "Web Service"
3. Connect your GitHub repository
4. Configure:
   - **Name**: salengap-app
   - **Environment**: Docker
   - **Region**: Oregon (or closest to you)
   - **Branch**: main
   - **Plan**: Free

5. Add Environment Variables:
   ```
   APP_NAME=Salengap
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:YOUR_KEY_HERE
   DB_CONNECTION=sqlite
   SESSION_DRIVER=database
   CACHE_STORE=database
   QUEUE_CONNECTION=database
   LOG_CHANNEL=stack
   LOG_LEVEL=error
   ```

6. Click "Create Web Service"

### 4. Generate APP_KEY

If you didn't set APP_KEY, the container will generate one automatically on first run.

To generate manually:
```bash
php artisan key:generate --show
```

Then add it to Render environment variables as:
```
APP_KEY=base64:generated_key_here
```

### 5. Set Your APP_URL

After deployment, update the APP_URL environment variable:
```
APP_URL=https://your-app-name.onrender.com
```

## Common Issues & Solutions

### Issue 1: "Permission denied" for database
**Solution**: Already handled in Dockerfile with proper permissions

### Issue 2: "No application encryption key"
**Solution**: Set APP_KEY in environment variables or let the startup script generate it

### Issue 3: "500 Internal Server Error"
**Solution**: 
- Check logs in Render dashboard
- Ensure APP_DEBUG=false in production
- Verify all environment variables are set

### Issue 4: Assets not loading
**Solution**: 
- Run `npm run build` locally first to test
- Ensure `public/build` directory is created during Docker build
- Check nginx.conf serves static files correctly

### Issue 5: Database migrations fail
**Solution**: 
- Migrations run automatically on container start
- Check logs for specific migration errors
- Ensure database/database.sqlite has write permissions

## Monitoring

View logs in Render dashboard:
1. Go to your service
2. Click "Logs" tab
3. Monitor startup and runtime logs

## Updating Your App

1. Push changes to GitHub:
   ```bash
   git add .
   git commit -m "Your changes"
   git push origin main
   ```

2. Render will automatically rebuild and redeploy

## Free Tier Limitations

- Service spins down after 15 minutes of inactivity
- First request after spin-down takes ~30 seconds
- 750 hours/month free (enough for one service)

## Upgrading to Paid Plan

For production use, consider:
- **Starter Plan** ($7/month): No spin-down, better performance
- **Standard Plan** ($25/month): More resources, faster builds

## Troubleshooting Commands

If you need to debug, you can use Render Shell:
1. Go to your service
2. Click "Shell" tab
3. Run commands:
   ```bash
   php artisan migrate:status
   php artisan config:cache
   php artisan route:list
   tail -f storage/logs/laravel.log
   ```

## Support

If issues persist:
1. Check Render logs
2. Check Laravel logs: `storage/logs/laravel.log`
3. Verify environment variables
4. Test Docker build locally:
   ```bash
   docker build -t salengap .
   docker run -p 8080:80 salengap
   ```
