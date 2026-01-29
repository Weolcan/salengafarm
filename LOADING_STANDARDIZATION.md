# Loading Screen Standardization Guide

## Overview
This document outlines all loading screens found in the system and provides a standardized approach.

## New Standardized Loading System

### Files Created:
1. **`public/css/loading.css`** - Consistent loading styles
2. **`public/js/loading.js`** - Loading utility functions

### Usage:

#### 1. Include in Layout
```html
<link href="{{ asset('css/loading.css') }}" rel="stylesheet">
<script src="{{ asset('js/loading.js') }}"></script>
```

#### 2. Full Page Loading
```javascript
// Show loading
LoadingManager.show('Processing...', 'Please wait');

// Hide loading
LoadingManager.hide();
```

#### 3. Button Loading
```javascript
const btn = document.getElementById('myButton');

// Start loading
LoadingManager.buttonStart(btn, 'Saving...');

// Stop loading
LoadingManager.buttonStop(btn);
```

#### 4. Form Submission Loading
```javascript
const form = document.getElementById('myForm');
LoadingManager.formSubmit(form, {
    message: 'Submitting Request...',
    submessage: 'Please wait while we process your request.',
    buttonText: 'Submitting...'
});
```

## Current Loading Implementations Found

### 1. **Registration Page** (`resources/views/auth/register.blade.php`)
- Custom spinner with overlay
- **Status**: Needs standardization
- **Action**: Replace with LoadingManager

### 2. **Login Page** (`resources/views/auth/login.blade.php`)
- **Status**: No loading screen
- **Action**: Add LoadingManager

### 3. **Plant Inventory** (`resources/views/plants/index.blade.php`)
- Custom `#loading-overlay` with `.loader` class
- Button spinners: `<i class="fas fa-spinner fa-spin"></i>`
- **Status**: Needs standardization
- **Action**: Replace with LoadingManager

### 4. **Dashboard** (`resources/views/dashboard.blade.php`)
- Custom `#loading-overlay` with `.loader` class
- Button spinners: `<i class="fas fa-spinner fa-spin"></i>`
- **Status**: Needs standardization
- **Action**: Replace with LoadingManager

### 5. **Walk-in POS** (`resources/views/walk-in/index.blade.php`)
- Bootstrap spinners: `<div class="spinner-border">`
- Button spinners: `<i class="fas fa-spinner fa-spin"></i>`
- **Status**: Needs standardization
- **Action**: Replace with LoadingManager

### 6. **Walk-in Inventory** (`resources/views/walk-in/inventory.blade.php`)
- Bootstrap spinners: `<div class="spinner-border">`
- Button spinners: `<i class="fas fa-spinner fa-spin"></i>`
- **Status**: Needs standardization
- **Action**: Replace with LoadingManager

### 7. **Public Plants Page** (`resources/views/public/plants.blade.php`)
- Page preloader with logo animation
- Loading overlay: `#loadingOverlay`
- Button spinners: `<span class="spinner-border">`
- **Status**: ✅ COMPLETED - Domino loader
- **Action**: ✅ Replaced with LoadingManager

### 8. **Request Form** (`resources/views/user/request-form.blade.php`)
- Button spinner: `<i class="fas fa-spinner fa-spin"></i>`
- **Status**: Needs standardization
- **Action**: Replace with LoadingManager

### 9. **Site Visits** (`resources/views/site-visits/create.blade.php`, `edit.blade.php`)
- Button spinners: `<i class="fas fa-spinner fa-spin"></i>`
- **Status**: Needs standardization
- **Action**: Replace with LoadingManager

### 10. **Request View** (`resources/views/requests/view-request.blade.php`)
- Email sending modal with spinner
- Button spinners: `<i class="fas fa-spinner fa-spin"></i>`
- **Status**: Needs standardization
- **Action**: Replace with LoadingManager

### 11. **User Dashboard** (`resources/views/dashboard/user.blade.php`)
- Custom loading overlay for client request
- **Status**: Recently added, needs standardization
- **Action**: Replace with LoadingManager

## Standardization Priority

### High Priority (User-Facing):
1. ✅ Registration page - DONE (domino loader)
2. ✅ Login page - DONE (domino loader)
3. ✅ Public plants page (home) - DONE (domino loader)
4. ✅ Request forms - DONE (domino loader)
5. ✅ User dashboard (client request) - DONE (domino loader)

### Medium Priority (Admin):
6. ✅ Plant inventory - DONE (domino loader)
7. ✅ Dashboard - DONE (domino loader)
8. Walk-in POS
9. Walk-in inventory

### Low Priority:
10. Site visits
11. Request view modals

## Implementation Steps

### Step 1: Add to Main Layouts
Add to `resources/views/layouts/public.blade.php`:
```html
<link href="{{ asset('css/loading.css') }}" rel="stylesheet">
<script src="{{ asset('js/loading.js') }}"></script>
```

Add to `resources/views/layouts/app.blade.php` (if exists):
```html
<link href="{{ asset('css/loading.css') }}" rel="stylesheet">
<script src="{{ asset('js/loading.js') }}"></script>
```

### Step 2: Replace Custom Loading Screens
For each page, replace custom loading with:

**Before:**
```html
<div id="loading-overlay" style="...">
    <div class="spinner">...</div>
</div>
```

**After:**
```javascript
LoadingManager.show('Loading...', 'Please wait');
```

### Step 3: Standardize Button Loading
**Before:**
```javascript
btn.html('<i class="fas fa-spinner fa-spin"></i> Saving...');
```

**After:**
```javascript
LoadingManager.buttonStart(btn, 'Saving...');
```

## Benefits of Standardization

1. **Consistency**: Same look and feel across all pages
2. **Maintainability**: Single source of truth for loading styles
3. **Performance**: Optimized animations and transitions
4. **Accessibility**: Proper ARIA labels and screen reader support
5. **Flexibility**: Easy to customize theme (light/dark)
6. **Reusability**: Simple API for developers

## Next Steps

1. Review this document
2. Approve standardization approach
3. Implement changes page by page
4. Test across all browsers
5. Update documentation
