# Admin Plant Care Management - Visual Guide

## Page Layout

### Navbar (Top of Page)
```
┌─────────────────────────────────────────────────────────────────┐
│ 🌿 Salenga Farm    [Home] [Plant Care]    🔔 👤 Profile ▼      │
└─────────────────────────────────────────────────────────────────┘
```

**Key Points:**
- Green background navbar
- "Home | Plant Care" links centered
- "Plant Care" is highlighted/active
- Notification bell and profile dropdown on right
- NO SIDEBAR visible

### Page Header
```
🌿 Plant Care Management
Manage care information for all plants
```

### Search and Filters
```
┌─────────────────────────────────────────────────────────────────┐
│ 🔍 [Search plants...]  [All Categories ▼]  [All Status ▼]      │
└─────────────────────────────────────────────────────────────────┘
```

### Plant Cards Grid

#### Card with Complete Care Info
```
┌─────────────────────┐
│   [Plant Photo]     │ ← Photo with gray background
│                     │   (object-fit: contain)
│  ✅ Complete        │ ← Green badge (top-right)
├─────────────────────┤
│ Monstera Deliciosa  │ ← Plant name (bold)
│ Monstera deliciosa  │ ← Scientific name (italic, gray)
│ [Shrub] [MON-001]   │ ← Category and code badges
│                     │
│ ✓ Care information  │ ← Status text (green)
│   available         │
│                     │
│ [✏️ Edit Care Info] │ ← Blue button (full width)
└─────────────────────┘
```

#### Card with Missing Care Info
```
┌─────────────────────┐
│   [Plant Photo]     │
│                     │
│  ⚠️ Missing         │ ← Red badge (top-right)
├─────────────────────┤
│ Snake Plant         │
│ Sansevieria         │
│ [Herbs] [SNK-002]   │
│                     │
│ ⚠️ No care          │ ← Status text (red)
│   information yet   │
│                     │
│ [✏️ Add Care Info]  │ ← Blue button (full width)
└─────────────────────┘
```

### Grid Layout (Responsive)

**Extra Large Screens (XL):**
```
[Card] [Card] [Card] [Card]
[Card] [Card] [Card] [Card]
```

**Large Screens (L):**
```
[Card] [Card] [Card]
[Card] [Card] [Card]
```

**Medium Screens (M):**
```
[Card] [Card]
[Card] [Card]
```

**Small Screens (S):**
```
[Card]
[Card]
[Card]
```

## Color Scheme

### Status Badges
- **Complete**: Green background (#28a745), white text, checkmark icon
- **Missing**: Red background (#dc3545), white text, warning icon

### Buttons
- **Edit/Add Care Info**: Blue (#007bff), white text, edit icon
- **Hover**: Darker blue (#0056b3)

### Cards
- **Background**: White
- **Border**: Light gray
- **Shadow**: Subtle shadow that increases on hover
- **Hover Effect**: Card lifts up 5px with stronger shadow

### Category Badges
- **Background**: Green (#28a745)
- **Text**: White

### Code Badges
- **Background**: Gray (#6c757d)
- **Text**: White

## Interactions

### Hover Effects
1. **Card Hover**: Card lifts up 5px, shadow increases
2. **Button Hover**: Background darkens slightly
3. **Badge Hover**: Shows tooltip with full status text

### Click Actions
1. **Home Link**: Navigate to home page
2. **Plant Care Link**: Stay on current page (already active)
3. **Edit/Add Care Info Button**: Navigate to edit page with `from=admin` parameter
4. **Search Input**: Filter plants in real-time
5. **Category Filter**: Filter by selected category
6. **Status Filter**: Filter by care info status

### Filter Behavior
- All filters work together (AND logic)
- Filtering is instant (no page reload)
- Hidden cards use `display: none`
- No results message if all cards are hidden

## Navigation Flow

### From Home Page
```
Home Page (with sidebar)
    ↓ Click "Plant Care" in navbar
Admin Plant Care Page (NO sidebar, navbar visible)
    ↓ Click "Edit Care Info"
Edit Care Info Page (with sidebar)
    ↓ Click "Save Changes"
Admin Plant Care Page (NO sidebar, navbar visible)
    ↓ Success message displayed
```

### From Admin Plant Care Page
```
Admin Plant Care Page
    ↓ Click "Home" in navbar
Home Page (with sidebar)
```

## Responsive Breakpoints

- **XL**: ≥1200px → 4 columns
- **L**: ≥992px → 3 columns
- **M**: ≥768px → 2 columns
- **S**: <768px → 1 column

## Accessibility

- All buttons have descriptive text
- Icons have title attributes for tooltips
- Color contrast meets WCAG AA standards
- Keyboard navigation supported
- Screen reader friendly

## Performance

- All plants load on page load
- Filtering is client-side (JavaScript)
- No AJAX calls for filtering
- Images lazy load (browser native)
- Smooth animations (CSS transitions)

## Browser Compatibility

- Chrome/Edge: ✅ Full support
- Firefox: ✅ Full support
- Safari: ✅ Full support
- Mobile browsers: ✅ Full support
