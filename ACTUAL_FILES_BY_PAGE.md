# Salenga Farm Inventory System - ACTUAL FILES BY PAGE

**Base Directory:** `C:\CODING\my_Inventory\`

This document organizes ALL REAL FILES that actually exist in your system by page/functionality with complete absolute Windows paths.

---

## 1. HOME PAGE (Public Plant Catalog)

### Controllers
```
C:\CODING\my_Inventory\app\Http\Controllers\PublicController.php
```

### Models
```
C:\CODING\my_Inventory\app\Models\DisplayPlant.php
C:\CODING\my_Inventory\app\Models\Plant.php
```

### Views
```
C:\CODING\my_Inventory\resources\views\public\plants.blade.php
C:\CODING\my_Inventory\resources\views\layouts\public.blade.php
```

### CSS
```
C:\CODING\my_Inventory\public\css\public.css
C:\CODING\my_Inventory\public\css\plant-details.css
C:\CODING\my_Inventory\public\css\plant-details-fix.css
C:\CODING\my_Inventory\public\css\plant-selection.css
C:\CODING\my_Inventory\public\css\plant-selection-grid.css
```

### JavaScript
```
C:\CODING\my_Inventory\public\js\home.js
```

### Images
```
C:\CODING\my_Inventory\public\images\categories\bamboo-g.png
C:\CODING\my_Inventory\public\images\categories\fertilizer-g.png
C:\CODING\my_Inventory\public\images\categories\grass-g.png
C:\CODING\my_Inventory\public\images\categories\herbs-g.png
C:\CODING\my_Inventory\public\images\categories\palm-g.png
C:\CODING\my_Inventory\public\images\categories\shrub-g.png
C:\CODING\my_Inventory\public\images\categories\tree-g.png
C:\CODING\my_Inventory\public\images\plantpic\bamboo-p.jpg
C:\CODING\my_Inventory\public\images\plantpic\fertilizer-p.jpg
C:\CODING\my_Inventory\public\images\plantpic\grass-p.jpg
C:\CODING\my_Inventory\public\images\plantpic\herbs-pp.jpg
C:\CODING\my_Inventory\public\images\plantpic\palm-pp.jpg
C:\CODING\my_Inventory\public\images\plantpic\shrubs-p.jpg
C:\CODING\my_Inventory\public\images\plantpic\tree-p.jpg
C:\CODING\my_Inventory\public\images\salengap-modified.png
C:\CODING\my_Inventory\public\images\salengap.png
C:\CODING\my_Inventory\public\images\warehouse-blur.jpg
```

---

## 2. DASHBOARD PAGE

### Controllers
```
C:\CODING\my_Inventory\app\Http\Controllers\DashboardController.php
```

### Models
```
C:\CODING\my_Inventory\app\Models\Plant.php
C:\CODING\my_Inventory\app\Models\Sale.php
C:\CODING\my_Inventory\app\Models\PlantRequest.php
C:\CODING\my_Inventory\app\Models\SiteVisit.php
C:\CODING\my_Inventory\app\Models\User.php
```

### Views
```
C:\CODING\my_Inventory\resources\views\dashboard.blade.php
```

### CSS
```
C:\CODING\my_Inventory\public\css\dashboard.css
```

### JavaScript
```
C:\CODING\my_Inventory\public\js\dashboard.js
```

---

## 3. INVENTORY PAGE (Plant Management)

### Controllers
```
C:\CODING\my_Inventory\app\Http\Controllers\PlantController.php
```

### Models
```
C:\CODING\my_Inventory\app\Models\Plant.php
C:\CODING\my_Inventory\app\Models\DisplayPlant.php
```

### Views
```
C:\CODING\my_Inventory\resources\views\plants\index.blade.php
```

### CSS
```
C:\CODING\my_Inventory\public\css\inventory.css
```

---

## 4. WALK-IN SALES (Point of Sale)

### Controllers
```
C:\CODING\my_Inventory\app\Http\Controllers\WalkInSalesController.php
C:\CODING\my_Inventory\app\Http\Controllers\WalkInInventoryController.php
```

### Models
```
C:\CODING\my_Inventory\app\Models\Sale.php
C:\CODING\my_Inventory\app\Models\Plant.php
```

### Views
```
C:\CODING\my_Inventory\resources\views\walk-in\index.blade.php
C:\CODING\my_Inventory\resources\views\walk-in\inventory.blade.php
```

---

## 5. CLIENT REQUESTS MANAGEMENT

### Controllers
```
C:\CODING\my_Inventory\app\Http\Controllers\ClientRequestController.php
C:\CODING\my_Inventory\app\Http\Controllers\UserPlantRequestController.php
C:\CODING\my_Inventory\app\Http\Controllers\RequestFormController.php
```

### Models
```
C:\CODING\my_Inventory\app\Models\PlantRequest.php
C:\CODING\my_Inventory\app\Models\Plant.php
C:\CODING\my_Inventory\app\Models\User.php
```

### Views
```
C:\CODING\my_Inventory\resources\views\admin\requests\index.blade.php
C:\CODING\my_Inventory\resources\views\admin\requests\user-request-detail.blade.php
C:\CODING\my_Inventory\resources\views\admin\requests\user-requests.blade.php
C:\CODING\my_Inventory\resources\views\admin\request\view_request_details.blade.php
C:\CODING\my_Inventory\resources\views\client-requests\index.blade.php
C:\CODING\my_Inventory\resources\views\requests\view-request.blade.php
C:\CODING\my_Inventory\resources\views\user\plant-request\create.blade.php
C:\CODING\my_Inventory\resources\views\user\plant-request\select-plants.blade.php
C:\CODING\my_Inventory\resources\views\user\plant-request\success.blade.php
C:\CODING\my_Inventory\resources\views\user\request-confirmation.blade.php
C:\CODING\my_Inventory\resources\views\user\request-form.blade.php
C:\CODING\my_Inventory\resources\views\user\request-success.blade.php
C:\CODING\my_Inventory\resources\views\user\request\view_request_details.blade.php
```

### CSS
```
C:\CODING\my_Inventory\public\css\client-requests.css
C:\CODING\my_Inventory\public\css\plant-request.css
C:\CODING\my_Inventory\public\css\plant-requests.css
C:\CODING\my_Inventory\public\css\request-details.css
```

### JavaScript
```
C:\CODING\my_Inventory\public\js\rfq.js
C:\CODING\my_Inventory\public\js\view_request.js
```

### PDF Templates
```
C:\CODING\my_Inventory\resources\views\pdf\rfq.blade.php
C:\CODING\my_Inventory\resources\views\pdf\user-request.blade.php
```

### Email Templates
```
C:\CODING\my_Inventory\resources\views\emails\plant-request.blade.php
C:\CODING\my_Inventory\app\Mail\PlantRequestMail.php
```

---

## 6. SITE VISITS PAGE

### Controllers
```
C:\CODING\my_Inventory\app\Http\Controllers\SiteVisitController.php
```

### Models
```
C:\CODING\my_Inventory\app\Models\SiteVisit.php
C:\CODING\my_Inventory\app\Models\User.php
```

### Views
```
C:\CODING\my_Inventory\resources\views\site-visits.blade.php
C:\CODING\my_Inventory\resources\views\site-visits\create.blade.php
C:\CODING\my_Inventory\resources\views\site-visits\edit.blade.php
C:\CODING\my_Inventory\resources\views\site-visits\index.blade.php
C:\CODING\my_Inventory\resources\views\site-visits\show.blade.php
```

---

## 7. USER MANAGEMENT PAGE

### Controllers
```
C:\CODING\my_Inventory\app\Http\Controllers\UserController.php
C:\CODING\my_Inventory\app\Http\Controllers\ProfileController.php
```

### Models
```
C:\CODING\my_Inventory\app\Models\User.php
```

### Views
```
C:\CODING\my_Inventory\resources\views\admin\users\edit.blade.php
C:\CODING\my_Inventory\resources\views\admin\users\index.blade.php
C:\CODING\my_Inventory\resources\views\profile\edit.blade.php
C:\CODING\my_Inventory\resources\views\profile\partials\delete-user-form.blade.php
C:\CODING\my_Inventory\resources\views\profile\partials\update-password-form.blade.php
C:\CODING\my_Inventory\resources\views\profile\partials\update-profile-information-form.blade.php
C:\CODING\my_Inventory\resources\views\profile\partials\update-profile-information.blade.php
C:\CODING\my_Inventory\resources\views\profile\partials\update-profile-picture.blade.php
```

### CSS
```
C:\CODING\my_Inventory\public\css\profile.css
```

### HTTP Requests
```
C:\CODING\my_Inventory\app\Http\Requests\ProfileUpdateRequest.php
```

---

## 8. AUTHENTICATION SYSTEM

### Controllers
```
C:\CODING\my_Inventory\app\Http\Controllers\Auth\AuthenticatedSessionController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\ConfirmablePasswordController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\EmailVerificationNotificationController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\EmailVerificationPromptController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\LoginController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\NewPasswordController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\PasswordController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\PasswordResetLinkController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\RegisterController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\RegisteredUserController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\SocialiteController.php
C:\CODING\my_Inventory\app\Http\Controllers\Auth\VerifyEmailController.php
```

### Models
```
C:\CODING\my_Inventory\app\Models\User.php
```

### Views
```
C:\CODING\my_Inventory\resources\views\auth\confirm-password.blade.php
C:\CODING\my_Inventory\resources\views\auth\forgot-password.blade.php
C:\CODING\my_Inventory\resources\views\auth\login.blade.php
C:\CODING\my_Inventory\resources\views\auth\register.blade.php
C:\CODING\my_Inventory\resources\views\auth\reset-password.blade.php
C:\CODING\my_Inventory\resources\views\auth\verify-email.blade.php
```

### CSS
```
C:\CODING\my_Inventory\public\css\auth.css
```

### HTTP Requests
```
C:\CODING\my_Inventory\app\Http\Requests\Auth\LoginRequest.php
```

### Routes
```
C:\CODING\my_Inventory\routes\auth.php
```

---

## SHARED/COMMON SYSTEM FILES

### Core Application Files
```
C:\CODING\my_Inventory\app\Http\Controller.php
C:\CODING\my_Inventory\app\Http\Kernel.php
C:\CODING\my_Inventory\app\Exceptions\Handler.php
```

### Providers
```
C:\CODING\my_Inventory\app\Providers\AppServiceProvider.php
C:\CODING\my_Inventory\app\Providers\AuthServiceProvider.php
C:\CODING\my_Inventory\app\Providers\MiddlewareServiceProvider.php
C:\CODING\my_Inventory\app\Providers\RouteServiceProvider.php
```

### Middleware
```
C:\CODING\my_Inventory\app\Http\Middleware\AdminMiddleware.php
C:\CODING\my_Inventory\app\Http\Middleware\ClientAccessMiddleware.php
C:\CODING\my_Inventory\app\Http\Middleware\ManagerMiddleware.php
C:\CODING\my_Inventory\app\Http\Middleware\PartnerAccessMiddleware.php
C:\CODING\my_Inventory\app\Http\Middleware\UserMiddleware.php
```

### View Components
```
C:\CODING\my_Inventory\app\View\Components\AppLayout.php
C:\CODING\my_Inventory\app\View\Components\GuestLayout.php
```

### Console Commands
```
C:\CODING\my_Inventory\app\Console\Commands\TestEmail.php
C:\CODING\my_Inventory\app\Console\Commands\UpdateAdminUser.php
```

### Layouts & Components
```
C:\CODING\my_Inventory\resources\views\layouts\app.blade.php
C:\CODING\my_Inventory\resources\views\layouts\guest.blade.php
C:\CODING\my_Inventory\resources\views\layouts\navigation.blade.php
C:\CODING\my_Inventory\resources\views\layouts\sidebar.blade.php
C:\CODING\my_Inventory\resources\views\components\application-logo.blade.php
C:\CODING\my_Inventory\resources\views\components\auth-session-status.blade.php
C:\CODING\my_Inventory\resources\views\components\danger-button.blade.php
C:\CODING\my_Inventory\resources\views\components\dropdown-link.blade.php
C:\CODING\my_Inventory\resources\views\components\dropdown.blade.php
C:\CODING\my_Inventory\resources\views\components\input-error.blade.php
C:\CODING\my_Inventory\resources\views\components\input-label.blade.php
C:\CODING\my_Inventory\resources\views\components\modal.blade.php
C:\CODING\my_Inventory\resources\views\components\nav-link.blade.php
C:\CODING\my_Inventory\resources\views\components\primary-button.blade.php
C:\CODING\my_Inventory\resources\views\components\responsive-nav-link.blade.php
C:\CODING\my_Inventory\resources\views\components\secondary-button.blade.php
C:\CODING\my_Inventory\resources\views\components\text-input.blade.php
```

### Shared CSS & JavaScript
```
C:\CODING\my_Inventory\public\css\custom.css
C:\CODING\my_Inventory\public\css\no-hover.css
C:\CODING\my_Inventory\public\css\push-notifications.css
C:\CODING\my_Inventory\public\css\sidebar.css
C:\CODING\my_Inventory\resources\css\app.css
C:\CODING\my_Inventory\public\js\push-notifications.js
C:\CODING\my_Inventory\resources\js\app.js
C:\CODING\my_Inventory\resources\js\bootstrap.js
```

### Routes
```
C:\CODING\my_Inventory\routes\web.php
C:\CODING\my_Inventory\routes\api.php
C:\CODING\my_Inventory\routes\console.php
```

### Config Files
```
C:\CODING\my_Inventory\config\app.php
C:\CODING\my_Inventory\config\auth.php
C:\CODING\my_Inventory\config\cache.php
C:\CODING\my_Inventory\config\database.php
C:\CODING\my_Inventory\config\filesystems.php
C:\CODING\my_Inventory\config\logging.php
C:\CODING\my_Inventory\config\mail.php
C:\CODING\my_Inventory\config\permission.php
C:\CODING\my_Inventory\config\queue.php
C:\CODING\my_Inventory\config\services.php
C:\CODING\my_Inventory\config\session.php
```

### Database Files
```
C:\CODING\my_Inventory\database\migrations\0001_01_01_000000_create_users_table.php
C:\CODING\my_Inventory\database\migrations\0001_01_01_000001_create_cache_table.php
C:\CODING\my_Inventory\database\migrations\0001_01_01_000002_create_jobs_table.php
C:\CODING\my_Inventory\database\migrations\2024_02_10_000000_add_avatar_to_users_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_21_174303_create_plants_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_21_174305_rfq_requests_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_21_174307_add_photo_path_to_plants_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_21_174309_drop_client_request_tables.php
C:\CODING\my_Inventory\database\migrations\2025_04_21_174310_create_plant_requests_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_21_174311_add_pricing_to_plant_requests_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_21_174313_add_partner_role_to_users_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_21_174315_add_request_type_to_plant_requests_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_21_174317_add_fields_to_users_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_21_174319_create_display_plants_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_26_123037_create_sales_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_26_125544_add_physical_attributes_to_sales_table.php
C:\CODING\my_Inventory\database\migrations\2025_04_29_120008_rename_is_partner_to_is_client_in_users_table.php
C:\CODING\my_Inventory\database\migrations\2025_05_30_012934_create_password_reset_tokens_table.php
C:\CODING\my_Inventory\database\migrations\2025_07_20_095844_create_permission_tables.php
C:\CODING\my_Inventory\database\migrations\2025_07_31_000000_create_site_visits_table.php
C:\CODING\my_Inventory\database\migrations\2025_07_31_rename_roles_in_users_table.php
C:\CODING\my_Inventory\database\migrations\2025_08_13_180646_add_terms_and_design_quotation_to_site_visits_table.php
C:\CODING\my_Inventory\database\seeders\AdminUserSeeder.php
C:\CODING\my_Inventory\database\seeders\DatabaseSeeder.php
C:\CODING\my_Inventory\database\seeders\PlantSeeder.php
C:\CODING\my_Inventory\database\seeders\TemporaryAdminSeeder.php
C:\CODING\my_Inventory\database\factories\UserFactory.php
```

### Error & Mail Vendor Files
```
C:\CODING\my_Inventory\resources\views\errors\request-view.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\html\button.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\html\footer.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\html\header.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\html\layout.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\html\message.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\html\panel.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\html\subcopy.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\html\table.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\html\themes\default.css
C:\CODING\my_Inventory\resources\views\vendor\mail\text\button.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\text\footer.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\text\header.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\text\layout.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\text\message.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\text\panel.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\text\subcopy.blade.php
C:\CODING\my_Inventory\resources\views\vendor\mail\text\table.blade.php
```

### Other Assets
```
C:\CODING\my_Inventory\public\favicon.ico
C:\CODING\my_Inventory\public\plant-icon.svg
C:\CODING\my_Inventory\public\tree-leaf.ico
C:\CODING\my_Inventory\public\.htaccess
C:\CODING\my_Inventory\public\index.php
C:\CODING\my_Inventory\public\robots.txt
```

---

## PAGE SUMMARY

| Page/Feature | Controllers | Models | Views | CSS | JS | Total Files |
|-------------|-------------|--------|-------|-----|----|-----------| 
| Home (Public) | 1 | 2 | 2 | 5 | 1 | 26 |
| Dashboard | 1 | 5 | 1 | 1 | 1 | 9 |
| Inventory | 1 | 2 | 1 | 1 | 0 | 5 |
| Walk-in Sales | 2 | 2 | 2 | 0 | 0 | 6 |
| Client Requests | 3 | 3 | 13 | 4 | 2 | 27 |
| Site Visits | 1 | 2 | 5 | 0 | 0 | 8 |
| User Management | 2 | 1 | 7 | 1 | 0 | 11 |
| Authentication | 12 | 1 | 6 | 1 | 0 | 22 |
| **Shared/Common** | 15+ | - | 50+ | 8+ | 4+ | 90+ |

**TOTAL ACTUAL FILES: 204 files organized by page**

---

## NOTES

1. **Client Requests** is your largest feature with 27 files
2. **Walk-in Sales** is your POS system (not generic POS)
3. **Authentication** has comprehensive social login support
4. **Home page** has extensive plant categorization
5. **Site Visits** is a focused feature with 5 views
6. Some files serve multiple pages (models, shared CSS, etc.)

This page-organized view makes it easy to track which files belong to which functionality!
