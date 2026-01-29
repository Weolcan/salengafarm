# Design Document

## Overview

The Site Visit Autofill feature enhances the existing site visit creation workflow by intelligently populating checklist fields based on geographic location. The system integrates three external APIs (Nominatim, Open-Meteo, SoilGrids) with a local database of Philippine-specific presets to provide comprehensive, accurate data while maintaining fast response times and graceful degradation when services are unavailable.

The design follows a service-oriented architecture with clear separation of concerns: API integration logic is isolated in dedicated service classes, caching is handled at the database layer, and the frontend provides an intuitive user experience with visual feedback and undo capabilities.

## Architecture

### High-Level Architecture

```
┌─────────────────────────────────────────────────────────────┐
│                     Frontend (Blade + JS)                    │
│  - Map interaction (Leaflet)                                 │
│  - "Load Regional Defaults" button                           │
│  - Autofill state management                                 │
│  - Undo functionality                                        │
└────────────────────┬────────────────────────────────────────┘
                     │ AJAX Request
                     ↓
┌─────────────────────────────────────────────────────────────┐
│              SiteVisitController (Laravel)                   │
│  - autofillData() endpoint                                   │
│  - Coordinate validation                                     │
│  - Response formatting                                       │
└────────────────────┬────────────────────────────────────────┘
                     │
                     ↓
┌─────────────────────────────────────────────────────────────┐
│           AutofillService (Business Logic)                   │
│  - Orchestrates data retrieval                               │
│  - Parallel API calls                                        │
│  - Data merging and prioritization                           │
│  - Cache management                                          │
└────┬───────┬───────┬───────┬──────────────────────────────┘
     │       │       │       │
     ↓       ↓       ↓       ↓
┌─────────┐ ┌─────────┐ ┌─────────┐ ┌──────────────────┐
│Nominatim│ │Open-Meteo│ │SoilGrids│ │ Regional Presets │
│ Service │ │ Service  │ │ Service │ │   (Database)     │
└─────────┘ └─────────┘ └─────────┘ └──────────────────┘
```

### Component Interaction Flow

```
1. User clicks map location
   ↓
2. Frontend captures lat/lng
   ↓
3. Frontend calls Nominatim for location name (immediate)
   ↓
4. User clicks "Load Regional Defaults"
   ↓
5. Frontend sends AJAX to /site-visits/autofill
   ↓
6. AutofillService checks cache
   ↓
7. If cache miss → Call APIs in parallel:
   - NominatimService (location details)
   - OpenMeteoService (climate data)
   - SoilGridsService (soil data)
   - RegionalPresetRepository (local data)
   ↓
8. Merge results (presets override APIs)
   ↓
9. Cache results
   ↓
10. Return JSON to frontend
   ↓
11. Frontend populates empty fields
   ↓
12. User can edit or undo
```

## Components and Interfaces

### 1. AutofillService

**Responsibility:** Orchestrate data retrieval from multiple sources and merge results.

**Methods:**

```php
class AutofillService
{
    public function getAutofillData(float $lat, float $lon): array
    {
        // Check cache first
        // Call APIs in parallel
        // Merge results with priority: presets > cache > APIs
        // Store in cache
        // Return formatted data
    }
    
    private function callApisInParallel(float $lat, float $lon): array
    {
        // Use Guzzle promises for parallel requests
    }
    
    private function mergeData(array $preset, array $climate, array $soil): array
    {
        // Merge with priority logic
    }
}
```

### 2. NominatimService

**Responsibility:** Reverse geocoding to get location names.

**Methods:**

```php
class NominatimService
{
    private string $baseUrl = 'https://nominatim.openstreetmap.org';
    
    public function reverseGeocode(float $lat, float $lon): ?array
    {
        // Returns: ['city' => '...', 'province' => '...', 'region' => '...']
    }
}
```

**API Endpoint:** `GET https://nominatim.openstreetmap.org/reverse`

**Parameters:**
- `lat`: Latitude
- `lon`: Longitude
- `format`: json
- `addressdetails`: 1

**Response Structure:**
```json
{
  "address": {
    "city": "Davao City",
    "state": "Davao del Sur",
    "region": "Davao Region",
    "country": "Philippines"
  }
}
```

### 3. OpenMeteoService

**Responsibility:** Fetch climate data (wind, humidity, precipitation).

**Methods:**

```php
class OpenMeteoService
{
    private string $baseUrl = 'https://api.open-meteo.com/v1';
    
    public function getClimateData(float $lat, float $lon): ?array
    {
        // Returns: ['wind' => [...], 'humidity' => [...], 'precipitation' => [...]]
    }
    
    private function formatWindDirection(int $degrees): string
    {
        // Convert degrees to cardinal direction
    }
}
```

**API Endpoint:** `GET https://api.open-meteo.com/v1/forecast`

**Parameters:**
- `latitude`: Latitude
- `longitude`: Longitude
- `current_weather`: true
- `daily`: temperature_2m_max,precipitation_sum,windspeed_10m_max
- `timezone`: Asia/Manila

**Response Structure:**
```json
{
  "current_weather": {
    "temperature": 28.5,
    "windspeed": 12.5,
    "winddirection": 45
  },
  "daily": {
    "relative_humidity_2m": [75, 78, 80]
  }
}
```

### 4. SoilGridsService

**Responsibility:** Fetch soil type and properties.

**Methods:**

```php
class SoilGridsService
{
    private string $baseUrl = 'https://rest.isric.org/soilgrids/v2.0';
    
    public function getSoilData(float $lat, float $lon): ?array
    {
        // Returns: ['type' => '...', 'composition' => [...], 'ph' => ...]
    }
    
    private function formatSoilType(array $properties): string
    {
        // Convert percentages to readable format
    }
}
```

**API Endpoint:** `GET https://rest.isric.org/soilgrids/v2.0/properties/query`

**Parameters:**
- `lat`: Latitude
- `lon`: Longitude
- `property`: clay,sand,silt,phh2o
- `depth`: 0-5cm

**Response Structure:**
```json
{
  "properties": {
    "layers": [
      {
        "name": "clay",
        "depths": [{"values": {"mean": 30}}]
      }
    ]
  }
}
```

### 5. RegionalPresetRepository

**Responsibility:** Manage regional presets in the database.

**Methods:**

```php
class RegionalPresetRepository
{
    public function findByLocation(string $city, ?string $province = null): ?RegionalPreset
    {
        // Find preset by city or province
    }
    
    public function findByCoordinates(float $lat, float $lon, float $radius = 0.1): ?RegionalPreset
    {
        // Find preset within radius
    }
}
```

### 6. AutofillCacheRepository

**Responsibility:** Cache autofill results to reduce API calls.

**Methods:**

```php
class AutofillCacheRepository
{
    public function get(float $lat, float $lon): ?array
    {
        // Get cached data for coordinates (rounded to 3 decimals)
    }
    
    public function store(float $lat, float $lon, array $data, int $ttl = 2592000): void
    {
        // Store with 30-day TTL
    }
    
    public function invalidateByRegion(string $city, string $province): void
    {
        // Clear cache when presets are updated
    }
}
```

## Data Models

### RegionalPreset Model

```php
class RegionalPreset extends Model
{
    protected $fillable = [
        'name',
        'city',
        'province',
        'region',
        'latitude',
        'longitude',
        'radius',
        'preset_data',
        'is_active'
    ];
    
    protected $casts = [
        'preset_data' => 'array',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'radius' => 'decimal:2',
        'is_active' => 'boolean'
    ];
}
```

**Database Schema:**

```sql
CREATE TABLE regional_presets (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    city VARCHAR(255),
    province VARCHAR(255),
    region VARCHAR(255),
    latitude DECIMAL(10,8),
    longitude DECIMAL(11,8),
    radius DECIMAL(5,2) DEFAULT 10.00,
    preset_data JSON,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    INDEX idx_city (city),
    INDEX idx_province (province),
    INDEX idx_coordinates (latitude, longitude)
);
```

**preset_data JSON Structure:**

```json
{
  "physical_factors": {
    "prevailing_winds": {
      "value": "yes",
      "remarks": "Northeast monsoon (Amihan) from November to April"
    },
    "humidity": {
      "value": "yes",
      "remarks": "75-85% average humidity year-round"
    }
  },
  "topography": {
    "vegetation": {
      "value": "yes",
      "remarks": "Tropical rainforest species common"
    }
  },
  "geotechnical_soils": {
    "basic_soil_type": {
      "value": "yes",
      "remarks": "Clay loam with volcanic origin"
    }
  },
  "utilities": {
    "potable_water": {
      "value": "yes",
      "remarks": "Municipal water supply available"
    },
    "electricity": {
      "value": "yes",
      "remarks": "Grid connected"
    }
  }
}
```

### AutofillCache Model

```php
class AutofillCache extends Model
{
    protected $fillable = [
        'lat_rounded',
        'lon_rounded',
        'city',
        'province',
        'cached_data',
        'data_sources',
        'expires_at'
    ];
    
    protected $casts = [
        'cached_data' => 'array',
        'data_sources' => 'array',
        'expires_at' => 'datetime'
    ];
}
```

**Database Schema:**

```sql
CREATE TABLE autofill_caches (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    lat_rounded DECIMAL(6,3) NOT NULL,
    lon_rounded DECIMAL(6,3) NOT NULL,
    city VARCHAR(255),
    province VARCHAR(255),
    cached_data JSON NOT NULL,
    data_sources JSON,
    expires_at TIMESTAMP,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    UNIQUE KEY unique_coordinates (lat_rounded, lon_rounded),
    INDEX idx_expires (expires_at)
);
```

## Error Handling

### API Failure Strategy

**Timeout Handling:**
- Each API call has a 5-second timeout
- Use Guzzle's `timeout` and `connect_timeout` options

**Graceful Degradation:**
```php
try {
    $climate = $this->openMeteoService->getClimateData($lat, $lon);
} catch (RequestException $e) {
    Log::warning('Open-Meteo API failed', [
        'lat' => $lat,
        'lon' => $lon,
        'error' => $e->getMessage()
    ]);
    $climate = null; // Continue with other sources
}
```

**Partial Success:**
- If 1 out of 3 APIs fails, still return data from successful sources
- Include `data_sources` in response to show what was available

**Complete Failure:**
- Return empty array with error flag
- Frontend shows: "Unable to load regional defaults. Please enter data manually."

### Rate Limiting

**Nominatim:**
- 1 request per second limit
- Implement queue or delay between requests
- Cache aggressively

**Open-Meteo & SoilGrids:**
- No rate limits (free tier)
- Still implement caching for performance

## Testing Strategy

### Unit Tests

**AutofillService Tests:**
- Test data merging logic (presets override APIs)
- Test cache hit/miss scenarios
- Test parallel API execution
- Mock all external services

**API Service Tests:**
- Mock HTTP responses
- Test response parsing
- Test error handling
- Test timeout scenarios

**Repository Tests:**
- Test coordinate rounding
- Test cache expiration
- Test preset matching by city/province
- Test radius-based searches

### Integration Tests

**End-to-End Autofill:**
- Test complete flow from controller to response
- Use real database (SQLite in-memory for tests)
- Mock external APIs

**API Integration Tests:**
- Test against real APIs (optional, in CI only)
- Verify response structure hasn't changed
- Test with known coordinates

### Manual Testing Checklist

- [ ] Click map location → verify city/province displayed
- [ ] Click "Load Regional Defaults" → verify fields populated
- [ ] Click "Undo Autofill" → verify fields cleared
- [ ] Edit autofilled field → verify preserved on re-autofill
- [ ] Test with location that has preset → verify preset used
- [ ] Test with location without preset → verify APIs used
- [ ] Test with offline APIs → verify graceful degradation
- [ ] Test cache → verify second request is faster
- [ ] Test admin preset management → verify CRUD operations
- [ ] Test on slow network → verify loading indicator

## Performance Considerations

### Caching Strategy

**Three-Level Cache:**

1. **Browser Cache:** Store last autofill result in sessionStorage
2. **Database Cache:** 30-day TTL for API results
3. **Regional Presets:** Permanent until manually updated

### Optimization Techniques

**Parallel API Calls:**
```php
use GuzzleHttp\Promise;

$promises = [
    'climate' => $this->httpClient->getAsync($climateUrl),
    'soil' => $this->httpClient->getAsync($soilUrl),
];

$results = Promise\Utils::settle($promises)->wait();
```

**Coordinate Rounding:**
- Round to 3 decimal places (~100m accuracy)
- Reduces cache entries while maintaining usefulness

**Lazy Loading:**
- Only call APIs when user clicks "Load Regional Defaults"
- Don't autofill on every map click

**Database Indexing:**
- Index on `city`, `province` for preset lookups
- Index on `lat_rounded`, `lon_rounded` for cache lookups
- Composite index on `(expires_at, lat_rounded, lon_rounded)`

### Expected Performance

- **Cache Hit:** < 100ms
- **Preset Match:** < 200ms
- **API Calls (parallel):** < 2 seconds
- **Total (worst case):** < 3 seconds

## Security Considerations

### API Key Management

**Open-Meteo & SoilGrids:**
- No API keys required
- No sensitive data

**Nominatim:**
- No API key required
- Must respect User-Agent requirement
- Set custom User-Agent: `PlantInventory/1.0 (contact@example.com)`

### Input Validation

**Coordinate Validation:**
```php
$validated = $request->validate([
    'latitude' => 'required|numeric|between:-90,90',
    'longitude' => 'required|numeric|between:-180,180'
]);
```

### Rate Limiting

**Controller Rate Limiting:**
```php
Route::post('/site-visits/autofill', [SiteVisitController::class, 'autofillData'])
    ->middleware('throttle:60,1'); // 60 requests per minute
```

### Data Sanitization

- Sanitize all API responses before storing
- Validate JSON structure
- Escape HTML in remarks fields

## Frontend Implementation

### JavaScript Architecture

**AutofillManager Class:**
```javascript
class AutofillManager {
    constructor(mapInstance, formElement) {
        this.map = mapInstance;
        this.form = formElement;
        this.originalValues = {};
        this.autofilledFields = new Set();
    }
    
    async loadDefaults(lat, lon) {
        // Show loading indicator
        // Call API
        // Populate fields
        // Store original values
        // Track autofilled fields
    }
    
    undoAutofill() {
        // Restore original values
        // Clear autofilled indicators
    }
    
    markFieldAsAutofilled(fieldName, source) {
        // Add visual indicator
        // Store metadata
    }
}
```

### UI Components

**Load Defaults Button:**
```html
<button type="button" id="loadDefaultsBtn" class="btn btn-success" disabled>
    <i class="fas fa-magic me-2"></i>Load Regional Defaults
</button>
```

**Undo Button:**
```html
<button type="button" id="undoAutofillBtn" class="btn btn-outline-secondary" style="display:none;">
    <i class="fas fa-undo me-2"></i>Undo Autofill
</button>
```

**Loading Indicator:**
```html
<div id="autofillLoading" class="alert alert-info" style="display:none;">
    <i class="fas fa-spinner fa-spin me-2"></i>Loading regional defaults...
</div>
```

**Autofilled Field Indicator:**
```css
.autofilled-field {
    background-color: #e7f5ff;
    border-left: 3px solid #1971c2;
}

.autofilled-field::after {
    content: "🤖";
    margin-left: 5px;
    font-size: 0.8em;
}
```

### AJAX Implementation

```javascript
async function loadRegionalDefaults(lat, lon) {
    try {
        const response = await fetch('/site-visits/autofill', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ latitude: lat, longitude: lon })
        });
        
        const data = await response.json();
        
        if (data.success) {
            populateFields(data.autofill_data, data.data_sources);
            showNotification('Regional defaults loaded successfully');
        } else {
            showError(data.message);
        }
    } catch (error) {
        showError('Failed to load regional defaults');
    }
}
```

## Admin Interface Design

### Regional Preset Management

**List View:**
- Table showing all presets
- Columns: Name, City, Province, Region, Status, Actions
- Search and filter by location
- Pagination

**Create/Edit Form:**
- Location fields (city, province, region)
- Optional coordinates + radius
- Checklist data editor (JSON or form-based)
- Preview functionality
- Active/Inactive toggle

**Form Structure:**
```html
<form action="/admin/regional-presets" method="POST">
    <input type="text" name="name" placeholder="Preset Name">
    <input type="text" name="city" placeholder="City">
    <input type="text" name="province" placeholder="Province">
    
    <!-- Checklist Data -->
    <div class="preset-editor">
        <h5>Physical Factors</h5>
        <label>Prevailing Winds</label>
        <select name="preset_data[physical_factors][prevailing_winds][value]">
            <option value="">Not Set</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        <input type="text" name="preset_data[physical_factors][prevailing_winds][remarks]">
        
        <!-- Repeat for other fields -->
    </div>
    
    <button type="submit">Save Preset</button>
</form>
```

## Migration Plan

### Database Migrations

**Migration 1: Create regional_presets table**
**Migration 2: Create autofill_caches table**
**Migration 3: Add indexes for performance**

### Deployment Steps

1. Run migrations
2. Deploy backend code (services, controllers)
3. Deploy frontend code (JS, CSS)
4. Seed initial regional presets (major PH cities)
5. Test with real users
6. Monitor API usage and cache hit rates
7. Optimize based on metrics

## Future Enhancements

### Phase 2 Features

- **Machine Learning:** Learn from inspector edits to improve presets
- **Crowdsourcing:** Allow inspectors to suggest preset improvements
- **Historical Data:** Track changes over time for climate trends
- **Offline Mode:** Cache more data for offline autofill
- **Mobile App:** Native mobile support with GPS
- **Batch Import:** Import presets from CSV/Excel
- **API Fallbacks:** Add alternative APIs for redundancy
- **Real-time Weather:** Option to use current weather vs climate averages
