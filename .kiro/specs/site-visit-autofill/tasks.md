# Implementation Plan

- [ ] 1. Set up database structure and models



  - Create migration for `regional_presets` table with columns: name, city, province, region, latitude, longitude, radius, preset_data (JSON), is_active
  - Create migration for `autofill_caches` table with columns: lat_rounded, lon_rounded, city, province, cached_data (JSON), data_sources (JSON), expires_at
  - Add indexes on city, province for regional_presets and lat_rounded, lon_rounded for autofill_caches
  - Create RegionalPreset model with fillable fields and JSON casting for preset_data
  - Create AutofillCache model with fillable fields and JSON casting for cached_data and data_sources
  - _Requirements: 5.1, 5.2, 9.2, 9.4_

- [ ] 2. Implement API service classes
  - [ ] 2.1 Create NominatimService class for reverse geocoding
    - Implement reverseGeocode() method that calls Nominatim API with lat/lon
    - Parse response to extract city, province, region from address object
    - Set custom User-Agent header for API compliance
    - Handle API errors and return null on failure
    - _Requirements: 1.2, 1.3, 1.4_
  
  - [ ] 2.2 Create OpenMeteoService class for climate data
    - Implement getClimateData() method that calls Open-Meteo API
    - Request current_weather and daily parameters (humidity, precipitation, wind)
    - Implement formatWindDirection() helper to convert degrees to cardinal directions (N, NE, E, SE, S, SW, W, NW)
    - Format response into structured array with wind speed, direction, humidity
    - Handle API timeouts and errors gracefully
    - _Requirements: 3.1, 3.2, 3.3, 3.4, 3.5_
  
  - [ ] 2.3 Create SoilGridsService class for soil data
    - Implement getSoilData() method that calls SoilGrids API
    - Request clay, sand, silt, and pH properties for 0-5cm depth
    - Implement formatSoilType() helper to convert percentages to human-readable format (e.g., "Clay loam (30% clay, 40% silt, 30% sand)")
    - Include pH information in formatted output
    - Handle API failures and return null
    - _Requirements: 4.1, 4.2, 4.3, 4.4, 4.5_

- [ ] 3. Implement repository classes
  - [ ] 3.1 Create RegionalPresetRepository
    - Implement findByLocation() method to search by city or province
    - Implement findByCoordinates() method with radius-based search using Haversine formula
    - Add method to get all active presets
    - _Requirements: 5.4, 9.2_
  
  - [ ] 3.2 Create AutofillCacheRepository
    - Implement get() method that rounds coordinates to 3 decimals and queries cache
    - Implement store() method with 30-day TTL (2592000 seconds)
    - Implement invalidateByRegion() method to clear cache when presets are updated
    - Add automatic cleanup of expired cache entries
    - _Requirements: 9.1, 9.2, 9.3, 9.4, 9.5_

- [ ] 4. Implement core AutofillService
  - Create AutofillService class with dependency injection for all API services and repositories
  - Implement getAutofillData() main method that orchestrates the entire autofill process
  - Implement cache checking logic at the start of getAutofillData()
  - Implement callApisInParallel() using Guzzle promises to call all three APIs simultaneously
  - Implement mergeData() method with priority logic: regional presets > cached data > API data
  - Store successful API results in cache with data source tracking
  - Return formatted array matching site visit checklist structure
  - Add comprehensive error logging for all API failures
  - _Requirements: 3.5, 4.5, 6.1, 6.2, 8.1, 8.2, 8.4, 9.1_

- [ ] 5. Add controller endpoint for autofill
  - Add autofillData() method to SiteVisitController
  - Validate latitude and longitude parameters (between -90/90 and -180/180)
  - Call AutofillService->getAutofillData() with validated coordinates
  - Return JSON response with success flag, autofill_data, and data_sources
  - Handle exceptions and return appropriate error messages
  - Add rate limiting middleware (60 requests per minute)
  - Add route: POST /site-visits/autofill
  - _Requirements: 6.3, 8.3, 8.5_

- [ ] 6. Implement frontend autofill functionality
  - [ ] 6.1 Create AutofillManager JavaScript class
    - Add constructor that accepts map instance and form element
    - Implement loadDefaults() method that calls the autofill API endpoint
    - Implement undoAutofill() method to restore original field values
    - Implement markFieldAsAutofilled() to add visual indicators
    - Store original form values before autofill in this.originalValues object
    - Track which fields were autofilled in this.autofilledFields Set
    - _Requirements: 2.1, 2.2, 2.3, 2.4, 2.5, 7.4_
  
  - [ ] 6.2 Add UI components to site visit create/edit forms
    - Add "Load Regional Defaults" button (initially disabled until location selected)
    - Add "Undo Autofill" button (hidden until autofill is triggered)
    - Add loading indicator div for showing progress during API calls
    - Add CSS styles for autofilled field indicators (light blue background, left border)
    - Enable "Load Regional Defaults" button when map location is clicked
    - _Requirements: 2.1, 6.3_
  
  - [ ] 6.3 Implement field population logic
    - Create populateFields() function that iterates through autofill_data
    - Only populate fields that are currently empty (preserve user input)
    - Apply autofilled-field CSS class to populated fields
    - Add data attributes to track data source for each field
    - Show success notification when autofill completes
    - Show "Undo Autofill" button after successful autofill
    - _Requirements: 2.3, 6.5, 7.1, 7.2, 7.3, 10.3, 10.4_
  
  - [ ] 6.4 Implement undo functionality
    - Wire "Undo Autofill" button to AutofillManager.undoAutofill()
    - Clear only autofilled values, preserve manually entered data
    - Remove autofilled-field CSS classes
    - Hide "Undo Autofill" button after undo
    - Show notification confirming undo action
    - _Requirements: 2.5, 7.4_
  
  - [ ] 6.5 Add error handling and user feedback
    - Display error message if all APIs fail
    - Show partial success message if some APIs fail
    - Implement 3-second timeout for loading indicator
    - Add retry button on failure
    - Allow form editing during autofill process
    - _Requirements: 6.4, 8.3, 8.5_

- [ ] 7. Create admin interface for regional presets
  - [ ] 7.1 Create RegionalPresetController with CRUD methods
    - Implement index() to list all presets with pagination
    - Implement create() to show preset creation form
    - Implement store() to save new preset with validation
    - Implement edit() to show preset edit form
    - Implement update() to save preset changes
    - Implement destroy() to delete preset
    - Add middleware to restrict access to admin users only
    - _Requirements: 5.1, 5.2, 5.3, 5.5_
  
  - [ ] 7.2 Create Blade views for preset management
    - Create index.blade.php with table showing name, city, province, region, status, actions
    - Add search and filter functionality by city/province
    - Create create.blade.php with form for all preset fields
    - Create edit.blade.php reusing create form structure
    - Add form sections for each checklist category (Physical Factors, Topography, etc.)
    - Include active/inactive toggle switch
    - Add delete confirmation modal
    - _Requirements: 5.1, 5.2, 5.3, 5.5_
  
  - [ ] 7.3 Add routes for admin preset management
    - Add resource routes: /admin/regional-presets
    - Protect routes with auth and admin middleware
    - Add route names: admin.regional-presets.index, create, store, edit, update, destroy
    - _Requirements: 5.1_

- [ ] 8. Implement data source tracking and display
  - Modify AutofillService to track which source provided each field (preset/cache/api)
  - Include data_sources object in API response with field-to-source mapping
  - Add tooltip or info icon to autofilled fields showing data source
  - Display autofill summary after completion showing which sources were used
  - Store data source information in site visit record metadata for audit
  - _Requirements: 10.1, 10.2, 10.3, 10.4, 10.5_

- [ ] 9. Seed initial regional presets
  - Create seeder for major Philippine cities (Manila, Cebu, Davao, Baguio, etc.)
  - Include realistic preset data for each city based on known climate and geography
  - Add presets for major island groups (Luzon, Visayas, Mindanao) as fallbacks
  - Run seeder as part of deployment
  - _Requirements: 5.4_

- [ ]* 10. Write tests for autofill functionality
  - [ ]* 10.1 Unit tests for API services
    - Test NominatimService with mocked HTTP responses
    - Test OpenMeteoService wind direction formatting
    - Test SoilGridsService soil type formatting
    - Test error handling and timeouts for all services
    - _Requirements: 1.4, 3.5, 4.5_
  
  - [ ]* 10.2 Unit tests for AutofillService
    - Test data merging logic with different priority scenarios
    - Test cache hit and miss scenarios
    - Test parallel API execution
    - Test graceful degradation when APIs fail
    - _Requirements: 5.4, 6.1, 8.1, 8.2, 9.1_
  
  - [ ]* 10.3 Integration tests
    - Test complete autofill flow from controller to response
    - Test with real database (SQLite in-memory)
    - Test cache expiration and invalidation
    - Test rate limiting on autofill endpoint
    - _Requirements: 6.2, 8.4, 9.3, 9.4_

- [ ] 11. Update documentation
  - Add API documentation for /site-visits/autofill endpoint
  - Document regional preset JSON structure
  - Create admin guide for managing presets
  - Add user guide for using autofill feature
  - Document API rate limits and caching behavior
  - _Requirements: All_
