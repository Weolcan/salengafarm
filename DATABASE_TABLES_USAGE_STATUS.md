# Database Tables Usage Status
## Salenga Farm Inventory System

---

## ✅ USED TABLES (9 tables with data)

| Table Name | Records | Purpose | Has Storage Functions |
|------------|---------|---------|----------------------|
| **users** | 10 | User accounts and authentication | ✅ Yes - UserController, ProfileController, RegisteredUserController |
| **plants** | 96 | Inventory plants with pricing and stock | ✅ Yes - PlantController, WalkInSalesController, DashboardController |
| **display_plants** | 19 | Public plant catalog with care info | ✅ Yes - PublicController, PlantCareController |
| **plant_requests** | 29 | Customer RFQ and availability requests | ✅ Yes - ClientRequestController, UserPlantRequestController, RequestFormController |
| **site_visits** | 8 | Site evaluation forms with GPS and files | ✅ Yes - SiteVisitController |
| **sales** | 51 | Walk-in sales transactions | ✅ Yes - WalkInSalesController |
| **categories** | 7 | Plant categories | ✅ Yes - CategoryController (but was empty earlier, now has 7) |
| **cache** | 2 | Laravel cache system | ⚙️ System (Laravel framework) |
| **migrations** | 38 | Database migration tracking | ⚙️ System (Laravel framework) |

---

## ❌ EMPTY/UNUSED TABLES (13 tables)

### 📦 Feature Tables (Have Models/Functions but No Data)

| Table Name | Purpose | Has Storage Functions | Why Empty |
|------------|---------|----------------------|-----------|
| **autofill_caches** | Form autofill cache for site visits | ❌ No functions found | Feature not implemented yet |
| **regional_presets** | Regional defaults for site visits | ❌ No functions found | Feature not implemented yet |

### 🔧 System Tables (Framework/Package Related)

| Table Name | Purpose | Package/System |
|------------|---------|----------------|
| **cache_locks** | Laravel cache locking mechanism | Laravel Cache |
| **failed_jobs** | Failed queue jobs tracking | Laravel Queue |
| **job_batches** | Batch job tracking | Laravel Queue |
| **jobs** | Pending queue jobs | Laravel Queue |
| **password_reset_tokens** | Password reset tokens | Laravel Auth |

### 🔐 Permission System Tables (Spatie Package - Not Used)

| Table Name | Purpose | Package |
|------------|---------|---------|
| **permissions** | Permission definitions | Spatie Laravel-Permission |
| **roles** | Role definitions | Spatie Laravel-Permission |
| **model_has_permissions** | User-permission assignments | Spatie Laravel-Permission |
| **model_has_roles** | User-role assignments | Spatie Laravel-Permission |
| **role_has_permissions** | Role-permission assignments | Spatie Laravel-Permission |

**Note:** The system uses simple role-based access (role field in users table) instead of Spatie's permission system.

### 🗑️ Legacy Tables (Replaced)

| Table Name | Purpose | Status |
|------------|---------|--------|
| **rfq_requests** | Old RFQ request table | ⚠️ Replaced by `plant_requests` table |

---

## 📊 USAGE STATISTICS

- **Total Tables:** 22
- **Used Tables:** 9 (41%)
- **Empty/Unused Tables:** 13 (59%)

### Breakdown:
- **Active Application Tables:** 7 (users, plants, display_plants, plant_requests, site_visits, sales, categories)
- **System Tables (Used):** 2 (cache, migrations)
- **Feature Tables (Empty):** 2 (autofill_caches, regional_presets)
- **System Tables (Empty):** 5 (cache_locks, failed_jobs, job_batches, jobs, password_reset_tokens)
- **Permission System (Unused):** 5 (permissions, roles, model_has_permissions, model_has_roles, role_has_permissions)
- **Legacy Tables:** 1 (rfq_requests)

---

## 🎯 TABLES WITH ACTIVE STORAGE FUNCTIONS

These tables have controllers/functions that actively store data:

1. ✅ **users** - UserController, ProfileController, RegisteredUserController
2. ✅ **plants** - PlantController, WalkInSalesController, DashboardController, WalkInInventoryController
3. ✅ **display_plants** - PublicController, PlantCareController
4. ✅ **plant_requests** - ClientRequestController, UserPlantRequestController, RequestFormController
5. ✅ **site_visits** - SiteVisitController
6. ✅ **sales** - WalkInSalesController
7. ✅ **categories** - CategoryController
8. ✅ **notifications** - NotificationController (missing from original list but exists in code)

**Note:** `notifications` table exists in the code but was not in your original table list. It has 33 records and active storage functions.

---

## 🔍 MISSING FROM YOUR LIST

The following table exists in the code but was not in your list:

- **notifications** (33 records) - Used by NotificationController and auto-created by various controllers

---

## 🚨 TABLES THAT COULD BE REMOVED

If you want to clean up your database, these tables can potentially be removed:

### Safe to Remove:
1. **rfq_requests** - Legacy table, replaced by plant_requests
2. **permissions** - Not using Spatie permission system
3. **roles** - Not using Spatie permission system
4. **model_has_permissions** - Not using Spatie permission system
5. **model_has_roles** - Not using Spatie permission system
6. **role_has_permissions** - Not using Spatie permission system

### Keep for Future Use:
1. **autofill_caches** - Feature planned but not implemented
2. **regional_presets** - Feature planned but not implemented

### Keep for System:
1. **cache**, **cache_locks** - Laravel caching
2. **failed_jobs**, **job_batches**, **jobs** - Laravel queue (may be used in future)
3. **password_reset_tokens** - Password reset functionality

---

## 📝 RECOMMENDATIONS

1. **Add Missing Table:** The `notifications` table is actively used but missing from your list
2. **Remove Legacy:** Drop `rfq_requests` table if no longer needed
3. **Remove Unused Permission System:** Drop the 5 Spatie permission tables if not planning to use them
4. **Implement Planned Features:** Add functions for `autofill_caches` and `regional_presets` or remove them
5. **Add Missing Table:** The `role_requests` table exists in code (4 records) but missing from your list

---

*Analysis Date: 2026-02-07*
*Database: MySQL (inventory)*
