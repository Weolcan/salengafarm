# Inquiry Response System - Requirements

## Feature Overview
Enable admins to send responses to user inquiries with availability status and remarks, and allow users to view these responses in their dashboard.

---

## User Stories

### Admin User Stories

**US-1: Send Response to User**
- **As an** admin
- **I want to** send a response to a user inquiry with availability and remarks
- **So that** users can see the status of their plant inquiries in their dashboard

**US-2: Mark Inquiry as Responded**
- **As an** admin
- **When I** send a response to a user
- **The system should** automatically mark the inquiry status as "Responded"
- **So that** users know their inquiry has been addressed

### User Stories

**US-3: View Response in Dashboard**
- **As a** regular user
- **I want to** see a "View Response" button for inquiries that have been responded to
- **So that** I can check the availability and admin remarks for my plant inquiry

**US-4: View Response Details**
- **As a** regular user
- **When I** click "View Response"
- **I should see** each plant's availability status and admin remarks
- **So that** I know which plants are available and any special notes from admin

**US-5: Receive Notification**
- **As a** regular user
- **When** admin responds to my inquiry
- **I should receive** an email notification and in-app notification
- **So that** I'm immediately aware of the response

---

## Acceptance Criteria

### AC-1: Admin Send Response Button
- **Given** admin is viewing an inquiry details page
- **When** admin clicks "Send Response to User" button (new button beside "Send Email to User")
- **Then** the system should:
  - Update inquiry status to "Responded"
  - Send email notification to user with link to view response
  - Create in-app notification for user
  - Show success message to admin
  - Keep admin on the same page

### AC-1.1: Two Separate Buttons
- **Given** admin is viewing an inquiry details page
- **Then** two buttons should be displayed side by side:
  - "Send Email to User" (existing functionality - sends custom email)
  - "Send Response to User" (new functionality - marks as responded + notifies user)
- **And** both buttons should be clearly labeled and distinguishable

### AC-2: Inquiry Status Update
- **Given** admin sends a response
- **When** the response is successfully sent
- **Then** the inquiry status badge should change from "Pending" to "Responded"

### AC-3: User Dashboard - View Response Button
- **Given** user is viewing their dashboard
- **When** an inquiry has status "Responded"
- **Then** show "View Response" button in the Actions column
- **And** the status badge should show "Responded" in green

### AC-4: User Dashboard - Pending Inquiries
- **Given** user is viewing their dashboard
- **When** an inquiry has status "Pending"
- **Then** show "Pending" badge in yellow
- **And** no action button should be shown

### AC-5: View Response Modal/Page
- **Given** user clicks "View Response" button
- **When** the response page/modal opens
- **Then** it should display:
  - Inquiry ID and date
  - User information (name, email)
  - Table of requested plants with columns:
    - Plant Name
    - Quantity
    - Height, Spread, Spacing
    - Availability (badge with color: Available=green, Limited Stock=yellow, Out of Stock=red, Pre-order=purple)
    - Remarks (admin notes)
  - Close/Back button

### AC-6: Email Notification Content
- **Given** admin sends response
- **When** email is sent to user
- **Then** email should contain:
  - Subject: "Response to Your Plant Inquiry #[ID]"
  - Greeting with user name
  - Message: "Your plant inquiry has been reviewed. Please log in to view the response."
  - Link/button to user dashboard
  - Salenga Farm signature

### AC-7: In-App Notification
- **Given** admin sends response
- **When** notification is created
- **Then** user should see:
  - Notification bell badge increment
  - Notification message: "Your inquiry #[ID] has been responded to"
  - Clicking notification takes user to dashboard

---

## Business Rules

### BR-1: Response Requirement
- Admin must set availability status for at least one plant before sending response
- Remarks are optional per plant

### BR-2: Status Flow
- Inquiry status flow: Pending → Responded
- Once marked as "Responded", status cannot be changed back to "Pending"
- Admin can update availability/remarks even after responding

### BR-3: User Access
- Users can only view responses for their own inquiries (matched by email)
- Users cannot edit availability or remarks
- Users can view response multiple times

### BR-4: Email Sending
- Email should be sent using Brevo API (existing email service)
- If email fails, still mark inquiry as "Responded" and show in-app notification
- Log email failures for admin review

---

## Technical Requirements

### Database Changes

**plant_requests table - Add columns:**
- `response_sent_at` (timestamp, nullable) - when admin sent response
- `responded_by` (integer, nullable, foreign key to users.id) - which admin responded

**Note:** Availability and remarks are already stored in `items_json` field

### Routes Needed

**Admin Routes:**
- `POST /requests/{id}/send-response` - Send response to user

**User Routes:**
- `GET /user/inquiries/{id}/response` - View response details

### Controllers

**ClientRequestController (Admin):**
- `sendResponse($id)` - Handle sending response

**UserDashboardController (User):**
- `viewResponse($id)` - Show response details

---

## UI/UX Requirements

### Admin Side
- Two buttons displayed side by side in User Information section:
  - "Send Email to User" (existing - green button, envelope icon)
  - "Send Response to User" (new - blue button, paper plane icon)
- "Send Response to User" button should show loading state when clicked
- Success message: "Response sent successfully to user"
- Error message if email fails: "Response saved but email failed to send"
- "Send Email to User" keeps existing functionality (custom email sending)

### User Side
- Dashboard table should have "Actions" column
- "View Response" button styled as primary button (green)
- Response modal/page should be clean and easy to read
- Availability badges should use consistent colors:
  - Available: Green (#28a745)
  - Limited Stock: Yellow (#ffc107)
  - Out of Stock: Red (#dc3545)
  - Pre-order: Purple (#6f42c1)

---

## Out of Scope (Future Enhancements)

- User reply to admin response (conversation thread)
- Admin can update response after sending
- Response history/audit log
- PDF generation of response
- SMS notifications
- Push notifications

---

## Dependencies

- Existing Brevo email service
- Existing notification system
- Existing plant_requests table structure
- Existing user authentication system

---

## Success Metrics

- Users can view responses within 1 click from dashboard
- Email delivery rate > 95%
- Response time for admin to send response < 2 seconds
- User satisfaction with response visibility

---

**Document Version:** 1.0  
**Created:** February 17, 2026  
**Feature:** Inquiry Response System
