# 🎭 SALENGA FARM SYSTEM - COMPREHENSIVE FUNCTIONS BY USER ROLE

## 📋 Table of Contents
1. [Role Overview](#role-overview)
2. [Super Admin Functions](#super-admin-functions)
3. [Admin Functions](#admin-functions)
4. [Client Functions](#client-functions)
5. [Regular User Functions](#regular-user-functions)
6. [Public (Unauthenticated) Functions](#public-unauthenticated-functions)
7. [Role Comparison Matrix](#role-comparison-matrix)

---

## 🎯 Role Overview

### Role Hierarchy
```
Super Admin (super_admin)
    ↓
Admin (admin)
    ↓
Client (user with is_client = true)
    ↓
Regular User (user)
    ↓
Public (unauthenticated)
```

### Role Definitions

| Role | Database Value | Access Level | Primary Purpose |
|------|---------------|--------------|-----------------|
| **Super Admin** | `role = 'super_admin'` | Full System Access | System administration, user management, logs |
| **Admin** | `role = 'admin'` | Administrative Access | Business operations, inventory, sales, requests |
| **Client** | `role = 'user'` + `is_client = true` | Enhanced User Access | RFQ submissions, site visit collaboration |
| **Regular User** | `role = 'user'` + `is_client = false` | Basic User Access | Plant requests, profile management |
| **Public** | Not authenticated | Public Access | View plant catalog, submit public RFQ |

---

## 🔐 Super Admin Functions

**Middleware:** `AdminMiddleware` (checks `role === 'super_admin'`)

### Exclusive Super Admin Features

#### 1. System Logs Management
**Route:** `/admin/logs/*`
**Controller:** `SystemLogController`

- **View System Logs** - `GET /admin/logs/fetch`
  - Access Laravel application logs
  - Filter by date, level, message
  - Real-time log monitoring
  
- **Clear Logs** - `POST /admin/logs/clear`
  - Delete all log entries
  - System maintenance function
  
- **Download Logs** - `GET /admin/logs/download`
  - Export logs as file
  - For backup and analysis

#### 2. All Admin Functions
Super Admin inherits all Admin and Manager capabilities (see below)

---

## 👨‍💼 Admin Functions

**Middleware:** `can:access-admin` (checks `role === 'admin'` OR `role === 'super_admin'`)

### 1. Dashboard & Analytics
**Route:** `/dashboard`
**Controller:** `DashboardController`

- **View Dashboard** - `GET /dashboard`
  - Total stock overview
  - Sales analytics with charts (Chart.js)
  - Recent requests summary
  - Quick statistics
  
- **Update Stock** - `POST /update-stock`
  - Quick stock adjustments
  - Bulk stock updates
  - Real-time inventory sync

### 2. Plant Inventory Management
**Route:** `/plants`
**Controller:** `PlantController`

- **View All Plants** - `GET /plants`
  - Complete inventory list
  - Search and filter functionality
  - Stock levels and pricing
  
- **Add New Plant** - `POST /plants`
  - Create new plant entries
  - Set initial stock and pricing
  - Upload plant photos
  
- **Update Plant** - `PUT /plants/{id}`
  - Edit plant details
  - Update stock quantities
  - Modify pricing
  - Change categories
  
- **Delete Plant** - `DELETE /plants/{id}`
  - Remove plant from inventory
  - Soft delete with photo cleanup
  
- **Bulk Update Plants** - `POST /plants/bulk-update`
  - Update multiple plants at once
  - Bulk stock adjustments
  - Bulk price changes
  - Bulk category assignments
  
- **Search Plants** - `GET /plants/search`
  - Real-time search API
  - Filter by name, category, stock
  
- **Upload Plant Photo** - `POST /plants/photo/upload`
  - Add/update plant images
  - Image validation and storage
  
- **Remove Plant Photo** - `DELETE /plants/photo/remove/{id}`
  - Delete plant images
  - Storage cleanup

### 3. Category Management
**Route:** `/categories`
**Controller:** `CategoryController`

- **View Categories** - `GET /categories`
  - List all plant categories
  - Category organization
  
- **Create Category** - `POST /categories`
  - Add new categories
  - Set category icons/images
  
- **Delete Category** - `DELETE /categories/{id}`
  - Remove categories
  - Reassign plants if needed

### 4. Walk-In Sales (Point of Sale)
**Route:** `/walk-in`
**Controller:** `WalkInSalesController`

- **POS Interface** - `GET /walk-in`
  - Shopping cart system
  - Real-time price calculation
  - Customer checkout
  
- **Process Sale** - `POST /walk-in/process-sale`
  - Complete transactions
  - Automatic stock deduction
  - Generate sale records
  - Database transactions for consistency
  
- **View Sales Records** - `GET /walk-in/records`
  - Sales history
  - Date filtering
  - Customer information
  
- **Sales Analytics** - `GET /walk-in/percentages`
  - Sales percentages by category
  - Revenue analytics
  - Performance metrics
  
- **Bulk Delete Sales** - `DELETE /walk-in/bulk-delete`
  - Remove multiple sale records
  - Cleanup old transactions

### 5. Walk-In Inventory Management
**Route:** `/walk-in/inventory`
**Controller:** `WalkInInventoryController`

- **View Inventory** - `GET /walk-in/inventory`
  - Dedicated inventory view for POS
  - Stock availability
  
- **Update Inventory** - `POST /walk-in/inventory/update`
  - Quick stock adjustments
  - Inventory corrections
  
- **Inventory Stats** - `GET /walk-in/inventory/stats`
  - Stock statistics
  - Low stock alerts
  
- **Inventory Summary** - `GET /walk-in/inventory/summary`
  - Overall inventory health
  - Category-wise breakdown

### 6. Request Management (RFQ & Plant Requests)
**Route:** `/requests`
**Controller:** `ClientRequestController`

- **View All Requests** - `GET /requests`
  - Client RFQ requests
  - User plant requests
  - Tabbed interface (Client vs User)
  - Status tracking
  
- **View Request Details** - `GET /requests/view/{id}`
  - Full request information
  - Client details
  - Requested plants and quantities
  
- **Update Request** - `POST /requests/update/{id}`
  - Modify request details
  - Change status
  
- **Update Pricing** - `POST /requests/update-pricing/{id}`
  - Set quotation prices (for RFQs)
  - Calculate totals
  - Add pricing notes
  
- **Update Availability** - For user inquiries
  - Set availability status per plant
  - Add remarks per plant
  - Stored in items_json field
  
- **Update Client Info** - `POST /requests/update-client/{id}`
  - Edit client details
  - Update contact information
  
- **Update Items** - `POST /requests/update-items/{id}`
  - Modify requested plants
  - Adjust quantities
  - Add/remove items
  
- **Send Email** - `POST /requests/send-email/{id}`
  - Email quotation to client (for RFQs)
  - Attach PDF
  - Brevo email integration
  
- **Send Response to User** - `POST /requests/{id}/send-response`
  - Send inquiry response notification (for user inquiries)
  - Update status to "responded"
  - Create in-app notification
  - Email user with link to view response
  - No PDF attachment
  
- **Generate PDF** - `GET /requests/download-pdf/{id}`
  - Create quotation PDF
  - DomPDF generation
  - Professional formatting
  
- **View PDF** - `GET /requests/view-pdf/{id}`
  - Preview PDF in browser
  
- **Delete Request** - `DELETE /requests/{id}`
  - Remove request records

### 7. Site Visit Management
**Route:** `/site-visits`
**Controller:** `SiteVisitController`

- **View All Site Visits** - `GET /site-visits`
  - List all scheduled visits
  - Status tracking
  - Client assignments
  
- **Create Site Visit** - `GET /site-visits/create` + `POST /site-visits`
  - Schedule new visits
  - Assign to clients
  - Set visit details
  - GPS coordinates (Leaflet map)
  
- **View Site Visit** - `GET /site-visits/{id}`
  - Complete visit details
  - Checklist sections:
    - Client Data
    - Site Assessment
    - Physical Factors
    - Proposal
  - File attachments
  - Status tracking
  
- **Edit Site Visit** - `GET /site-visits/{id}/edit` + `PUT /site-visits/{id}`
  - Update visit information
  - Modify checklists
  - Change status
  
- **Delete Site Visit** - `DELETE /site-visits/{id}`
  - Remove visit records
  - Cleanup associated files
  
- **Update Status** - `POST /site-visits/{id}/status`
  - Quick status changes
  - Workflow management
  
- **Get Visits JSON** - `GET /site-visits-data`
  - API endpoint for visit data
  - Map integration
  
- **Get Visit Data** - `GET /site-visits/{id}/data`
  - Single visit API data
  
- **Delete Media File** - `DELETE /site-visits/{id}/media/{file_index}`
  - Remove uploaded files
  - Storage cleanup
  
- **Upload Proposal Item** - `POST /site-visits/{id}/proposal/{itemKey}/upload`
  - Upload proposal documents
  - Design quotations
  - Terms and conditions

### 8. User Management
**Route:** `/users`
**Controller:** `UserController`

- **View All Users** - `GET /users`
  - Complete user list
  - Role information
  - Account status
  
- **Create User** - `GET /users/create` + `POST /users`
  - Add new users
  - Assign roles
  - Set permissions
  
- **Edit User** - `GET /users/{id}/edit` + `PUT /users/{id}`
  - Update user information
  - Change roles
  - Modify permissions
  
- **Update Role** - `PUT /users/{id}/role`
  - Quick role changes
  - Permission updates
  
- **Delete User** - `DELETE /users/{id}`
  - Remove user accounts
  
- **Role Request Management**
  - **View Role Requests** - `GET /users/role-requests/{id}/edit`
  - **Update Role Request** - `PUT /users/role-requests/{id}`
  - **Approve Role Request** - `POST /users/role-requests/{id}/approve`
  - **Reject Role Request** - `POST /users/role-requests/{id}/reject`
  - **Delete Role Request** - `DELETE /users/role-requests/{id}`

### 9. Plant Care Library Management
**Route:** `/admin/plant-care`
**Controller:** `PlantCareController`

- **Admin Plant Care Page** - `GET /admin/plant-care`
  - Manage care information
  - Edit care guides
  
- **Edit Care Info** - `GET /plant-care/{id}/edit`
  - Update care instructions
  - Modify care details
  
- **Update Care Info** - `PUT /plant-care/{id}`
  - Save care changes
  - Update database

### 10. Display Plants Management (Public Catalog)
**Route:** `/display-plants`
**Controller:** `PublicController`

- **Add Display Plant** - `POST /display-plants`
  - Add plants to public catalog
  - Set display information
  
- **Update Display Plant** - `PUT /display-plants/{id}`
  - Edit public plant info
  - Update descriptions
  
- **Delete Display Plant** - `DELETE /display-plants/{id}`
  - Remove from public catalog
  
- **Upload Display Photo** - `POST /display-plants/photo/upload`
  - Add plant images
  - Public-facing photos
  
- **Remove Display Photo** - `DELETE /display-plants/photo/remove/{id}`
  - Delete plant images

---

## 🤝 Client Functions

**Middleware:** `ClientAccessMiddleware` (checks `is_client = true` OR admin roles)

Clients are regular users with enhanced access to business features.

### 1. Enhanced Request Capabilities

#### RFQ (Request for Quotation) System
**Route:** `/user/plant-request`
**Controller:** `UserPlantRequestController`

- **Create RFQ** - `GET /user/plant-request`
  - Access RFQ form
  - Business-focused requests
  - Bulk plant selection
  
- **Select Plants** - `GET /user/plant-request/select-plants`
  - Browse plant catalog
  - Multi-select interface
  - Quantity specification
  
- **Submit RFQ** - `POST /user/plant-request/store`
  - Submit request
  - Email notification
  - PDF generation
  
- **View Success** - `GET /user/plant-request/success/{id}`
  - Confirmation page
  - Request summary
  
- **Download PDF** - `GET /user/plant-request/download-pdf/{id}`
  - Get quotation PDF
  - Save for records

#### Authenticated RFQ Submission
**Route:** `/client-request`
**Controller:** `ClientRequestController`

- **Submit RFQ (Authenticated)** - `POST /client-request`
  - Submit RFQ while logged in as client
  - Auto-fills user information
  - Full RFQ features
  
- **View Success** - `GET /request-success/{id}`
  - Confirmation page
  - Request summary

### 2. Site Visit Collaboration
**Route:** `/site-visits`, `/client-data`, `/my-site-visits`
**Controller:** `SiteVisitController`

- **My Site Visits** - `GET /my-site-visits`
  - View assigned site visits
  - Personal visit history
  
- **View Site Visit (Client)** - `GET /site-visits/{id}/view`
  - Read-only visit details
  - Checklist viewing
  - File access
  
- **Client Data Index** - `GET /client-data`
  - Dedicated client data page
  - Upload interface
  
- **Client Data Details** - `GET /client-data/{id}`
  - Specific visit data
  - Upload/manage files
  
- **Upload Client Data** - `POST /site-visits/{id}/client-data/{itemKey}/upload`
  - Upload required documents
  - Property information
  - Site photos
  
- **Delete Client Data** - `DELETE /site-visits/{id}/client-data/{itemKey}/{fileIndex}`
  - Remove uploaded files
  
- **Bulk Delete Client Data** - `DELETE /site-visits/{id}/client-data-bulk-delete`
  - Remove multiple files
  
- **Set Client Data Status** - `POST /site-visits/{id}/client-data/{itemKey}/status`
  - Mark items as complete
  - Update checklist status
  
- **Proposal Approval** - `POST /site-visits/{id}/proposal/approval`
  - Approve/reject proposals
  - Provide feedback

### 3. User Dashboard (Request Center)
**Route:** `/dashboard/user`
**Controller:** `UserDashboardController`

- **View Dashboard** - `GET /dashboard/user`
  - Personal request center
  - Request history
  - Status tracking
  
- **Submit Client Request** - `POST /client-request/submit`
  - Quick request submission
  - From dashboard

### 4. All Regular User Functions
Clients also have access to all regular user features (see below).

---

## 👤 Regular User Functions

**Middleware:** `auth` (authenticated users)

### 1. Plant Inquiry System (Simple Availability Inquiries)
**Route:** Public plants page with modal
**Controller:** `ClientRequestController` (stores as 'user' type in plant_requests table)

- **Select Plants from Catalog** - On `/` (public plants page)
  - Click "Add to Inquiry" on plant cards
  - View selected plants counter in "View Inquiry" button
  - Opens inquiry modal
  
- **Submit Plant Inquiry** - "Plant Inquiry Form" modal on public page
  - Fill in name, email, contact number
  - Selected plants with quantities
  - Editable measurements (height, spread, spacing)
  - Submit as 'user' type inquiry
  - Email notification sent to admin
  
- **View Inquiry Modal** - `viewSelectedPlants()` function
  - Shows selected plants in table
  - Edit quantities and measurements
  - Remove plants from selection
  - "Submit Inquiry" button to send

**Note:** Regular users submit INQUIRIES (not requests). This is a simple availability check system, different from the full RFQ workflow that clients use.

### 2. User Dashboard (Inquiry Center)
**Route:** `/dashboard/user`
**Controller:** `UserDashboardController`

- **View Dashboard** - `GET /dashboard/user`
  - Personal inquiry center
  - "Recent Inquiries" table showing:
    - Inquiry ID
    - Inquiry Date
    - Status (Pending/Responded)
    - Actions column
  - "Return to Home to Inquire" button
  - "Request to be a Client" button (if not already a client)
  - Tips section with guidance
  
- **View Inquiry Response** - `GET /user/inquiries/{id}/response`
  - View admin response to inquiry
  - See plant availability status:
    - Available (green badge)
    - Limited Stock (yellow badge)
    - Out of Stock (red badge)
    - Pre-order (purple badge)
  - Read admin remarks for each plant
  - Inquiry information (date, responded by, response date)

### 3. Plant Care Library (Read-Only)
**Route:** `/plant-care`
**Controller:** `PlantCareController`

- **Browse Plant Care** - `GET /plant-care`
  - View care guides
  - Search plants
  - Care instructions
  
- **View Care Details** - `GET /plant-care/{id}`
  - Detailed care information
  - Growing tips
  - Maintenance guides

### 4. Profile Management
**Route:** `/profile`
**Controller:** `ProfileController`

- **View Profile** - `GET /profile/edit`
  - Personal information
  - Account settings
  
- **Update Profile** - `PUT /profile`
  - Edit personal details
  - Update contact info
  - Change company information (if client)
  
- **Update Avatar** - `PATCH /profile/avatar`
  - Upload profile picture
  - Change avatar
  
- **Delete Account** - `DELETE /profile`
  - Account deletion
  - Data removal

### 5. Notifications
**Route:** `/notifications`
**Controller:** `NotificationController`

- **View Notifications** - `GET /notifications`
  - All notifications
  - Unread/read status
  - Inquiry response notifications
  
- **Unread Count** - `GET /notifications/unread-count`
  - Badge counter
  - Real-time updates
  
- **Mark as Read** - `POST /notifications/{id}/read`
  - Mark single notification
  
- **Mark All Read** - `POST /notifications/mark-all-read`
  - Clear all unread
  
- **Delete All** - `POST /notifications/delete-all`
  - Clear notification history
  
- **Delete Notification** - `DELETE /notifications/{id}`
  - Remove single notification

### 6. Request to Become a Client
**Route:** `/dashboard/user` (modal)
**Controller:** `UserDashboardController`

- **Submit Client Request** - Modal on user dashboard
  - Choose account type (Individual/Company)
  - Fill in contact details
  - Provide additional message
  - Submit request for admin review
  - Receive confirmation email
  - Admin reviews and approves/rejects

### 7. Home/Public Access
- **View Home** - `GET /`
  - Public plant catalog
  - Plant browsing and inquiry submission

---

## 🌐 Public (Unauthenticated) Functions

**Middleware:** None (public access)

### 1. Public Plant Catalog (View Only)
**Route:** `/`
**Controller:** `PublicController`

- **View Plants** - `GET /`
  - Browse plant catalog (display_plants table)
  - Category filtering (7 categories)
  - Plant details with care information
  - Photo gallery
  - **NO submission capability** - must create account to submit inquiries
  - "Login to Inquire" message for unauthenticated users

### 2. Authentication
**Routes:** `/login`, `/register`, `/forgot-password`, etc.

- **Login** - `GET /login` + `POST /login`
- **Register** - `GET /register` + `POST /register`
- **Forgot Password** - `GET /forgot-password` + `POST /forgot-password`
- **Reset Password** - `GET /reset-password/{token}` + `POST /reset-password`
- **Email Verification** - `GET /verify-email`
- **Social Login** - `GET /auth/{provider}/redirect` + `GET /auth/{provider}/callback`
  - Google OAuth
  - Facebook OAuth
  - Other providers

---

## 📊 Role Comparison Matrix

### Feature Access Matrix

| Feature | Public | User | Client | Admin | Super Admin |
|---------|--------|------|--------|-------|-------------|
| **View Public Catalog** | ✅ | ✅ | ✅ | ✅ | ✅ |
| **Create Account** | ✅ | ✅ | ✅ | ✅ | ✅ |
| **View Plant Care Library** | ❌ | ✅ | ✅ | ✅ | ✅ |
| **Submit Plant Inquiry** | ❌ | ✅ | ✅ | ✅ | ✅ |
| **View Inquiry Response** | ❌ | ✅ | ✅ | ✅ | ✅ |
| **Request to be Client** | ❌ | ✅ | ❌ | ❌ | ❌ |
| **Profile Management** | ❌ | ✅ | ✅ | ✅ | ✅ |
| **Notifications** | ❌ | ✅ | ✅ | ✅ | ✅ |
| **User Dashboard** | ❌ | ✅ | ✅ | ✅ | ✅ |
| **Submit RFQ (Enhanced)** | ❌ | ❌ | ✅ | ✅ | ✅ |
| **My Site Visits** | ❌ | ❌ | ✅ | ✅ | ✅ |
| **Upload Client Data** | ❌ | ❌ | ✅ | ✅ | ✅ |
| **Approve Proposals** | ❌ | ❌ | ✅ | ✅ | ✅ |
| **Admin Dashboard** | ❌ | ❌ | ❌ | ✅ | ✅ |
| **Manage Inventory** | ❌ | ❌ | ❌ | ✅ | ✅ |
| **Point of Sale** | ❌ | ❌ | ❌ | ✅ | ✅ |
| **Manage Inquiries/RFQs** | ❌ | ❌ | ❌ | ✅ | ✅ |
| **Send Inquiry Responses** | ❌ | ❌ | ❌ | ✅ | ✅ |
| **Manage Site Visits** | ❌ | ❌ | ❌ | ✅ | ✅ |
| **Manage Categories** | ❌ | ❌ | ❌ | ✅ | ✅ |
| **Edit Plant Care** | ❌ | ❌ | ❌ | ✅ | ✅ |
| **Manage Users** | ❌ | ❌ | ❌ | ✅ | ✅ |
| **Role Requests** | ❌ | ❌ | ❌ | ✅ | ✅ |
| **System Logs** | ❌ | ❌ | ❌ | ❌ | ✅ |

### Permission Methods (User Model)

```php
// Role checks
$user->isUser()         // role === 'user'
$user->isAdmin()        // role === 'admin'
$user->isSuperAdmin()   // role === 'super_admin'

// Access checks
$user->hasAdminAccess()   // super_admin OR admin
$user->isClient()         // is_client === true
$user->hasClientAccess()  // is_client === true OR admin roles
```

### Middleware Summary

| Middleware | Check | Applies To |
|------------|-------|------------|
| `auth` | User is authenticated | All authenticated routes |
| `AdminMiddleware` | `role === 'super_admin'` | System logs only |
| `admin` | `role === 'admin'` OR `role === 'super_admin'` | User edit pages |
| `can:access-admin` | `hasAdminAccess()` | All admin features |
| `ClientAccessMiddleware` | `hasClientAccess()` | RFQ and site visits |
| `UserMiddleware` | `isUser()` | User-specific routes |

---

## 🔑 Key Insights

### 1. Role Inheritance
- Super Admin inherits all Admin capabilities plus system logs access
- Clients are enhanced Users with business features (RFQ, site visits)
- All authenticated users can access basic features (profile, notifications, plant care)

### 2. Client vs User Distinction
- **Client** (`is_client = true`): Business accounts with RFQ (Request for Quotation) access, site visit collaboration, enhanced features
- **User** (`is_client = false`): Individual accounts with simple plant inquiry system (select plants from catalog, submit via modal)
- **Key Difference**: 
  - Clients submit **RFQs** → Get pricing, PDF quotations, site visits, full business workflow
  - Users submit **Inquiries** → Get availability status (Available/Limited/Out of Stock/Pre-order) with admin remarks
  - Both stored in same `plant_requests` table, differentiated by `request_type` field ('client' vs 'user')

### 3. Admin Capabilities
- Full CRUD on all resources
- Business operations (POS, inventory, requests)
- User and role management
- Site visit management
- Analytics and reporting

### 4. Public Access
- View-only plant catalog (browse plants, categories, photos, care info)
- NO submission capability - must create account to submit inquiries
- Authentication pages (login, register, password reset, social login)

### 5. Security Model
- Route-level middleware protection
- Controller-level authorization checks
- Model-level permission methods
- CSRF protection on all forms
- File upload validation

---

## 📝 Notes

### Account Type Field
The system has an `account_type` field in the users table that may be used for additional categorization:
- `personal` - Individual accounts
- `business` - Business accounts
- This field is separate from `is_client` and may be used for UI/UX customization

### Email System
- Brevo (formerly Sendinblue) integration for transactional emails
- Email notifications for inquiries, RFQs, quotations, and role changes
- PDF attachments for quotations (RFQ only)
- Inquiry response emails with link to view response

### Inquiry vs RFQ System
The system has two types of submissions stored in `plant_requests` table:
- **'user' type → INQUIRIES**: Simple availability checks from regular users
  - Submit via "Plant Inquiry Form" modal
  - Admin responds with availability status (Available/Limited Stock/Out of Stock/Pre-order)
  - Admin adds remarks per plant
  - User views response in dashboard
  - No pricing, no PDF generation
  
- **'client' type → RFQs**: Full business requests from clients
  - Submit via RFQ form with detailed requirements
  - Admin provides pricing and generates PDF quotation
  - Email with PDF attachment
  - Full business workflow
  
- Both stored in same `plant_requests` table, differentiated by `request_type` field

### File Storage
- Plant photos stored in `storage/app/public/plant-photos`
- Display plant photos in `storage/app/public/display-plant-photos`
- Site visit files in `storage/app/public/site-visits`
- User avatars in `storage/app/public/avatars`
- PDFs in `storage/app/pdfs`

---

**Document Version:** 1.0  
**Last Updated:** February 17, 2026  
**System:** Salenga Farm Inventory System  
**Framework:** Laravel 11.x
