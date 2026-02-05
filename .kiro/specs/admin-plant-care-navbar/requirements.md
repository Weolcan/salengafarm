# Admin Plant Care Management from Navbar

## Overview
Enable admins to manage plant care information directly from the home page navbar, providing quick access to CRUD operations for plant care data.

## User Story
**As an** admin user  
**I want** to access plant care management from the navbar on the home page  
**So that** I can quickly add or edit care information for plants without navigating through multiple pages

## Current Behavior
- Admins access Plant Care from the Menu dropdown
- To edit care info: Plant Care Library → View Care Guide → Edit button
- Too many clicks to manage care information

## Desired Behavior
- Add "Plant Care" link to admin navbar on home page (next to Home)
- Clicking it shows a plant care management page with all plants
- Each plant card shows:
  - Plant photo
  - Plant name
  - Category badge
  - Quick status indicator (has care info / missing care info)
  - "Edit Care Info" button
- Admins can quickly see which plants need care information
- One-click access to edit care info for any plant

## Acceptance Criteria

### 1. Navbar Structure for Admins
- [x] 1.1 Admin navbar on home page shows: Home | Plant Care
- [x] 1.2 Plant Care link is visible only to admin users (not super admin)
- [x] 1.3 Plant Care link highlights when active
- [x] 1.4 Clicking Plant Care navigates to plant care management page

### 2. Plant Care Management Page
- [x] 2.1 Page displays all plants in a grid layout (similar to home page)
- [x] 2.2 Each plant card shows:
  - Plant photo (or placeholder if no photo)
  - Plant name
  - Scientific name (if available)
  - Category badge
  - Care status indicator (green checkmark if has care info, red warning if missing)
- [x] 2.3 Each card has "Edit Care Info" button
- [x] 2.4 Clicking "Edit Care Info" opens the edit form
- [x] 2.5 Page has search functionality to filter plants
- [x] 2.6 Page has category filter dropdown

### 3. Care Status Indicator
- [x] 3.1 Green checkmark icon if plant has at least one care field filled
- [x] 3.2 Red warning icon if plant has no care information
- [x] 3.3 Tooltip shows "Care info complete" or "Care info missing"

### 4. Edit Care Info Flow
- [x] 4.1 Clicking "Edit Care Info" navigates to edit page
- [x] 4.2 Edit page shows all care fields (watering, sunlight, soil, etc.)
- [x] 4.3 After saving, redirects back to plant care management page
- [x] 4.4 Success message shows "Care information updated successfully"

### 5. Access Control
- [x] 5.1 Only admin users can access plant care management page
- [x] 5.2 Super admin users can view but not edit (view-only access)
- [x] 5.3 Regular users and clients cannot access this page
- [x] 5.4 Unauthorized access redirects to home page

### 6. Responsive Design
- [x] 6.1 Grid adapts to screen size (4 cols on XL, 3 on L, 2 on M, 1 on S)
- [x] 6.2 Cards maintain consistent height and spacing
- [x] 6.3 Mobile view shows compact cards with essential info

## Technical Requirements

### Routes
- `GET /admin/plant-care` - Plant care management page (admin only)
- Uses existing edit route: `GET /plant-care/{id}/edit`

### Controller
- Create new method in `PlantCareController`: `adminIndex()`
- Check user role (admin only)
- Fetch all plants with care status
- Return view with plants data

### View
- Create `resources/views/plant-care/admin-index.blade.php`
- Grid layout similar to home page
- Care status indicator logic
- Search and filter functionality

### Database
- No new tables needed
- Use existing `display_plants` table
- Check if care fields are populated

## Design Notes

### Care Status Logic
A plant "has care info" if ANY of these fields are filled:
- care_watering
- care_sunlight
- care_soil
- care_temperature
- care_humidity
- care_fertilizing
- care_pruning
- care_propagation
- care_pests
- care_growth_rate
- care_toxicity
- care_notes

### Card Design
```
┌─────────────────────┐
│   [Plant Photo]     │
│                     │
├─────────────────────┤
│ Plant Name          │
│ Scientific Name     │
│ [Category Badge]    │
│ ✓ Care Info Complete│
│ [Edit Care Info]    │
└─────────────────────┘
```

## Out of Scope
- Bulk edit functionality
- Inline editing
- Care info templates
- Care info import/export

## Success Metrics
- Admins can access plant care management in 1 click from home page
- Admins can identify plants missing care info at a glance
- Admins can edit care info in 2 clicks (Plant Care → Edit)
- Reduced time to manage plant care information by 50%

## Dependencies
- Existing Plant Care CRUD functionality
- Existing authentication and authorization system
- Display plants table with care fields

## Notes
- This is separate from the public Plant Care Library
- Public library remains accessible to all users
- This admin page is for management only
- Consider adding bulk actions in future iterations
