# Requirements Document

## Introduction

This document specifies the requirements for improving the user experience on the Salenga Farm Inventory Management System home page. The system is a Laravel 11.31 application with a shared home page used by multiple user roles (Super Admin, Admin, User, Client). The improvements focus on simplifying the user plant card interface, improving button visibility, and enhancing the request workflow while preserving existing admin functionality.

## Implementation Status: IN PROGRESS

## Glossary

- **System**: The Salenga Farm Inventory Management System
- **Home_Page**: The shared plant browsing interface at `resources/views/public/plants.blade.php`
- **User_Plant_Card**: Plant card component with CSS class `.user-plant-card` used by non-admin users
- **Admin_Plant_Card**: Plant card component with CSS class `.admin-plant-card` used by admin users
- **Detail_Panel**: The modal/panel that displays when a user clicks on a plant card
- **Floating_Cart**: The persistent UI element showing selected plant count in bottom right
- **Dashboard**: The user dashboard showing request history and status
- **Toast_Notification**: A temporary, non-intrusive notification message
- **Enhanced_Dashboard**: The new dashboard template at `resources/views/dashboard/user-enhanced.blade.php`

## Requirements

### Requirement 1: Plant Detail Panel Visibility

**User Story:** As a user, I want to see the "Add Plant" button without scrolling when I open a plant detail panel, so that I can quickly add plants to my request.

#### Acceptance Criteria

1. WHEN a user clicks on a User_Plant_Card THEN the Detail_Panel SHALL display with the "Add Plant" button visible without scrolling
2. WHEN the Detail_Panel is displayed THEN the System SHALL optimize the layout to fit critical information and actions within the viewport
3. WHEN displaying plant information THEN the Detail_Panel SHALL maintain a clear visual hierarchy with the action button prominently placed
4. THE System SHALL apply layout optimizations ONLY to `.user-plant-card .plant-details-panel` selectors
5. THE System SHALL NOT modify `.admin-plant-card` styling or functionality

### Requirement 2: Floating Cart Prominence

**User Story:** As a user, I want clear visual feedback when I add plants to my cart, so that I know my selections are being tracked.

#### Acceptance Criteria

1. WHEN a user adds a plant to their selection THEN the Floating_Cart SHALL display a pulsing animation to draw attention
2. WHEN the Floating_Cart is displayed THEN the System SHALL ensure it has sufficient z-index (9999) to appear above other elements
3. WHEN the page is scrolled THEN the Floating_Cart SHALL remain visible in a fixed position
4. THE Floating_Cart SHALL maintain sticky positioning in the bottom right corner of the viewport

### Requirement 3: User Action Feedback

**User Story:** As a user, I want immediate visual confirmation when I add or remove plants, so that I understand my actions were successful.

#### Acceptance Criteria

1. WHEN a user adds a plant to their selection THEN the System SHALL display a Toast_Notification confirming the addition
2. WHEN a user removes a plant from their selection THEN the System SHALL display a Toast_Notification confirming the removal
3. WHEN a Toast_Notification is displayed THEN the System SHALL automatically dismiss it after 3-5 seconds
4. WHEN multiple actions occur rapidly THEN the System SHALL queue Toast_Notifications to avoid overlap
5. THE Toast_Notification SHALL be non-intrusive and not block user interaction with other elements

### Requirement 4: Enhanced Dashboard Information Display

**User Story:** As a user, I want to see detailed information about my plant requests on the dashboard, so that I can track what I requested without navigating to separate pages.

#### Acceptance Criteria

1. WHEN a user views the Dashboard THEN the System SHALL display request summary statistics including total requests, pending requests, and approved requests
2. WHEN a user views a request row THEN the System SHALL provide an expandable interface to reveal plant details
3. WHEN a user expands a request row THEN the System SHALL display all plants included in that request with their quantities and categories
4. WHEN displaying request information THEN the System SHALL show request ID, date, status, and plant count in the collapsed view
5. THE Dashboard SHALL maintain the existing request status display functionality

### Requirement 5: Dashboard Integration

**User Story:** As a system administrator, I want to integrate the enhanced dashboard seamlessly, so that users benefit from improved information display without breaking existing functionality.

#### Acceptance Criteria

1. WHEN the Enhanced_Dashboard is integrated THEN the System SHALL route user dashboard requests to the new template
2. WHEN the Enhanced_Dashboard is displayed THEN the System SHALL load and display real user request data
3. WHEN a user interacts with expandable rows THEN the System SHALL toggle row expansion without page reload
4. THE System SHALL preserve all existing dashboard controller functionality during integration
5. THE System SHALL ensure the Enhanced_Dashboard works for all non-admin user roles (User, Client)

### Requirement 6: Admin Functionality Preservation

**User Story:** As an admin user, I want all my existing plant management functionality to remain unchanged, so that I can continue managing the system effectively.

#### Acceptance Criteria

1. WHEN an admin views the Home_Page THEN the System SHALL display Admin_Plant_Card components with unchanged functionality
2. WHEN an admin adds categories THEN the System SHALL process the action using existing functionality
3. WHEN an admin adds or edits plants THEN the System SHALL process the action using existing functionality
4. WHEN an admin manages plant photos THEN the System SHALL process the action using existing functionality
5. THE System SHALL NOT apply User_Plant_Card styling or behavior changes to Admin_Plant_Card components

### Requirement 7: Cross-Role Compatibility

**User Story:** As a system user of any role, I want the home page to function correctly for my role, so that I can perform my role-specific tasks without errors.

#### Acceptance Criteria

1. WHEN a Super Admin accesses the Home_Page THEN the System SHALL display appropriate admin functionality
2. WHEN an Admin accesses the Home_Page THEN the System SHALL display appropriate admin functionality
3. WHEN a User accesses the Home_Page THEN the System SHALL display the enhanced user interface with plant selection features
4. WHEN a Client accesses the Home_Page THEN the System SHALL display the enhanced user interface with plant selection features
5. THE System SHALL maintain role-based access control for all features

### Requirement 8: CSS Selector Specificity

**User Story:** As a developer, I want CSS changes to target only user-facing components, so that admin functionality remains unaffected by styling updates.

#### Acceptance Criteria

1. WHEN applying Detail_Panel optimizations THEN the System SHALL use `.user-plant-card .plant-details-panel` selectors
2. WHEN applying user interface styles THEN the System SHALL NOT use selectors that match Admin_Plant_Card components
3. WHEN modifying shared CSS files THEN the System SHALL use specific class selectors to avoid unintended style inheritance
4. THE System SHALL maintain separation between `.user-plant-card` and `.admin-plant-card` styling rules
5. THE System SHALL test all CSS changes against both user and admin card types

### Requirement 9: JavaScript Non-Breaking Changes

**User Story:** As a developer, I want to add toast notifications without breaking existing JavaScript functionality, so that the system remains stable.

#### Acceptance Criteria

1. WHEN adding Toast_Notification functionality THEN the System SHALL implement it as additive changes to `public/js/home.js`
2. WHEN Toast_Notification code executes THEN the System SHALL NOT interfere with existing event handlers
3. WHEN Toast_Notification code executes THEN the System SHALL NOT modify existing DOM manipulation logic
4. THE System SHALL ensure Toast_Notification functions are self-contained and modular
5. THE System SHALL handle JavaScript errors gracefully without breaking page functionality

### Requirement 10: Responsive Design Maintenance

**User Story:** As a mobile user, I want the improvements to work on my device, so that I can use the system on any screen size.

#### Acceptance Criteria

1. WHEN a user accesses the Home_Page on a mobile device THEN the Detail_Panel SHALL display optimized layout within the mobile viewport
2. WHEN a user accesses the Dashboard on a mobile device THEN the Enhanced_Dashboard SHALL display with responsive layout
3. WHEN the Floating_Cart is displayed on mobile THEN the System SHALL position it appropriately for touch interaction
4. WHEN Toast_Notifications are displayed on mobile THEN the System SHALL position them to avoid blocking critical UI elements
5. THE System SHALL maintain existing responsive design breakpoints and behaviors
