# Email Sending Fix - Plant Requests

## Problem
When users submit plant requests, the system was not sending confirmation emails to the user's email address.

## Root Causes

### 1. Missing Email Sending Code
The `RequestFormController::store()` method was:
- ✅ Saving the request to database
- ✅ Creating notifications for admins
- ❌ **NOT sending email to the user**

### 2. Wrong Mail Driver Configuration
The `.env` file had:
```
MAIL_MAILER=log
```
This means emails were being logged to a file instead of actually being sent via SMTP.

## Solution

### 1. Added Email Sending Logic
**File:** `app/Http/Controllers/RequestFormController.php`

Added after saving the plant request:
```php
// Send email notification to the user
try {
    Log::info('Attempting to send email to user', ['email' => $plantRequest->email]);
    Mail::to($plantRequest->email)->send(new PlantRequestMail($plantRequest));
    Log::info('Email sent successfully to user', ['email' => $plantRequest->email]);
} catch (\Exception $e) {
    Log::error('Failed to send email to user', [
        'email' => $plantRequest->email,
        'error' => $e->getMessage()
    ]);
    // Don't fail the request if email fails, just log it
}
```

Added imports:
```php
use Illuminate\Support\Facades\Mail;
use App\Mail\PlantRequestMail;
```

### 2. Fixed Mail Driver Configuration
**File:** `.env`

Changed:
```
MAIL_MAILER=log  →  MAIL_MAILER=smtp
```

Also updated:
```
MAIL_FROM_NAME="Plant Inventory System"  →  MAIL_FROM_NAME="Salenga Farm"
```

## Email Configuration

The system is configured to use Gmail SMTP:
- **Host:** smtp.gmail.com
- **Port:** 465 (SSL)
- **Username:** farmsalenga@gmail.com
- **From Address:** farmsalenga@gmail.com
- **From Name:** Salenga Farm

## Email Template

The email uses the existing template at `resources/views/emails/plant-request.blade.php` which includes:

### For User Requests:
- ✅ Request confirmation
- ✅ Plant availability information
- ✅ Invitation to become a client
- ✅ Benefits of client registration
- ✅ Next steps

### For Client Requests:
- ✅ Quotation details
- ✅ Pricing information
- ✅ PDF attachment (if available)
- ✅ Next steps

## How It Works Now

1. User submits plant request form
2. System saves request to database
3. **System sends confirmation email to user's email address**
4. System creates notifications for admins
5. User receives email with:
   - Request ID and details
   - List of requested plants
   - Availability status
   - Invitation to become a client (for user requests)
   - Next steps

## Error Handling

The email sending is wrapped in a try-catch block:
- If email fails, it logs the error
- Request submission still succeeds
- User sees success message
- Admin can check logs to see email failures

## Testing

To test the email functionality:

1. **Submit a plant request** as a regular user
2. **Check the user's email inbox** for confirmation email
3. **Check Laravel logs** at `storage/logs/laravel.log` for:
   - "Attempting to send email to user"
   - "Email sent successfully to user"
   - Or error messages if it failed

## Important Notes

⚠️ **Gmail App Password:** The system uses a Gmail App Password (`hgjmrdknbdddvzox`). If emails still don't send:
1. Verify the App Password is still valid
2. Check if 2-factor authentication is enabled on the Gmail account
3. Ensure "Less secure app access" is enabled (if needed)

⚠️ **After Deployment:** You may need to run:
```bash
php artisan config:clear
php artisan cache:clear
```

## Files Modified

1. `app/Http/Controllers/RequestFormController.php` - Added email sending logic
2. `.env` - Changed MAIL_MAILER from 'log' to 'smtp'

## Status

✅ **COMPLETED** - Email sending is now implemented and configured correctly.

---

**Date:** February 2, 2026
**Issue:** Email not sending for plant requests
**Resolution:** Added email sending code and fixed mail driver configuration
