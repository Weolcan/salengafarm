# Testing Guide - User Experience Improvements

## Quick Test Checklist

### ✅ Regular User Tests

1. **Login as Regular User**
   - Navigate to home page
   - Verify "View Request (0)" button shows next to search bar
   - Verify NO "Add New Plant" button shows
   - Verify NO "RFQ" button shows

2. **View Plant Details**
   - Click any plant card
   - Detail panel should slide in from right
   - Verify "Add to Request" button is visible in header (no scrolling needed)
   - Verify measurements show as plain text (not editable)
   - Verify back arrow works

3. **Add Plant to Request**
   - Click "Add to Request" button
   - Toast notification should appear: "✓ [Plant Name] added to your request"
   - Button should change to "Remove"
   - Top bar counter should update: "View Request (1)"

4. **Add Multiple Plants**
   - Add 2-3 more plants
   - Counter should update each time
   - Each plant's button should change to "Remove"

5. **Remove Plant**
   - Click "Remove" button on any plant
   - Toast notification: "✗ [Plant Name] removed from your request"
   - Button should change back to "Add to Request"
   - Counter should decrease

6. **View Request Form**
   - Click "View Request (X)" button in top bar
   - Request form modal should open
   - All selected plants should be listed
   - Measurements should be editable in the form
   - Can adjust quantities

7. **Submit Request**
   - Fill in contact information
   - Submit request
   - Should see success message
   - Counter should reset to 0

---

### ✅ Client User Tests

1. **Login as Client**
   - Navigate to home page
   - Verify "Request for Quotation (RFQ)" button shows (NOT "View Request")
   - Verify NO "Add New Plant" button shows

2. **Add Plants**
   - Click plant cards
   - Click "Add to Request" buttons
   - Plants should be added to selection

3. **Open RFQ Form**
   - Click "Request for Quotation (RFQ)" button
   - RFQ form should open with pricing fields
   - All selected plants should be listed

---

### ✅ Admin User Tests

1. **Login as Admin**
   - Navigate to home page
   - Verify "Add New Plant" button shows
   - Verify NO "View Request" or "RFQ" button shows (unless admin is also a client)

2. **Admin Plant Cards**
   - Click admin plant card
   - Should see "Plant Details" text in header
   - Should see Edit and Delete buttons
   - Should NOT see "Add to Request" button

3. **Edit Plant**
   - Click Edit button
   - Edit modal should open
   - Make changes and save
   - Changes should reflect immediately

4. **Add New Plant**
   - Click "Add New Plant" button
   - Modal should open
   - Search for plant from inventory
   - Add plant to display
   - Should appear in grid

---

### ✅ Guest User Tests

1. **Visit Home Page (Not Logged In)**
   - Navigate to home page
   - Should see Login/Register buttons
   - Should NOT see "View Request" or "RFQ" buttons

2. **View Plant Details**
   - Click plant card
   - Detail panel should open
   - Should see "Want to request? Let's log you in first." message
   - Click link should go to login page

---

### ✅ Mobile Tests

1. **Open on Mobile Device**
   - Home page should be responsive
   - Top bar button should be visible
   - Plant cards should stack in single column

2. **Add Plants on Mobile**
   - Click plant cards
   - Detail panel should cover full card
   - "Add to Request" button should be easily tappable
   - Toast notifications should appear

3. **View Request on Mobile**
   - Click "View Request" button
   - Form should be mobile-friendly
   - Can scroll through selected plants

---

### ✅ Edge Cases

1. **Maximum Plants (20)**
   - Try to add 21st plant
   - Should show alert: "You can only select up to 20 plants"
   - Counter should stay at 20

2. **Empty Request**
   - Click "View Request (0)" with no plants
   - Should show alert: "You have not selected any plants yet."

3. **Session Persistence**
   - Add plants to selection
   - Refresh page
   - Plants should still be selected
   - Counter should show correct number

4. **Logout**
   - Add plants to selection
   - Logout
   - Selection should be cleared

---

### ✅ Browser Compatibility

Test on:
- ✅ Chrome/Edge (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Mobile Safari (iOS)
- ✅ Chrome Mobile (Android)

---

### ✅ Performance Tests

1. **Page Load**
   - Home page should load quickly
   - No layout shifts
   - Preloader should show then fade

2. **Plant Selection**
   - Adding plants should be instant
   - Counter should update immediately
   - No lag or delays

3. **Detail Panel**
   - Should slide smoothly (0.3s transition)
   - No jank or stuttering

---

## Common Issues & Solutions

### Issue: Counter not updating
**Solution:** Check browser console for JavaScript errors, ensure `selectedPlants` array is being updated

### Issue: Button not changing text
**Solution:** Verify `updatePlantActionButtons()` function is being called

### Issue: Toast not showing
**Solution:** Check if `showToast()` function exists and CSS is loaded

### Issue: Detail panel requires scrolling
**Solution:** Check padding values in CSS, ensure compact layout is applied

### Issue: Top bar button not showing
**Solution:** Verify user role checks in Blade template

---

## Reporting Issues

When reporting issues, include:
1. User role (Regular User, Client, Admin, Guest)
2. Browser and version
3. Device (Desktop/Mobile)
4. Steps to reproduce
5. Expected vs actual behavior
6. Screenshots if possible

---

## Success Criteria

✅ All user roles see correct buttons
✅ Plant detail panel fits without scrolling
✅ Counter updates correctly
✅ Toast notifications appear
✅ Request form opens with selected plants
✅ Admin functionality unchanged
✅ Mobile responsive
✅ No JavaScript errors in console

---

**Test Date:** _____________
**Tester:** _____________
**Status:** _____________
