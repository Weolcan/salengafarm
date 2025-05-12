/**
 * JavaScript for handling home page functionality
 * - Category filtering
 * - Plant card details
 * - Search functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize existing functions
    initCategoryFilter();
    initPlantCardDetails();
    initSearchFunctionality();
    initPlantDetailsActions();
    initPlantInventorySearch();
    
    // Initialize new functions
    loadSelectedPlants();
    clearPlantsOnLogout();
    initPlantSelectionCounter();
    initAddPlantButtons();
    initEditableMeasurements();
    initModalSubmitButton();
    
    // Update plant action buttons based on selection
    selectedPlants.forEach(plant => {
        updatePlantActionButtons(plant.id, 'remove');
    });
    
    // Add toast styles if not already in CSS
    if (!document.getElementById('toastStyles')) {
        const style = document.createElement('style');
        style.id = 'toastStyles';
        style.textContent = `
            .toast {
                position: fixed;
                bottom: 80px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #333;
                color: white;
                padding: 12px 20px;
                border-radius: 4px;
                opacity: 0;
                transition: opacity 0.3s ease;
                z-index: 9999;
                visibility: hidden;
            }
            .toast.show {
                opacity: 1;
                visibility: visible;
            }
        `;
        document.head.appendChild(style);
    }
    
    console.log('Home page functionality initialized');
});

/**
 * Initialize the category filter
 */
function initCategoryFilter() {
    const categoryItems = document.querySelectorAll('.category-icon-item');
    const plantItems = document.querySelectorAll('.plant-item');
    
    categoryItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove active class from all category items
            categoryItems.forEach(cat => cat.classList.remove('active'));
            
            // Add active class to clicked category
            this.classList.add('active');
            
            // Get selected category
            const category = this.getAttribute('data-category');
            console.log('Category selected:', category);
            
            // Filter plants
            plantItems.forEach(plant => {
                const plantCategory = plant.getAttribute('data-category');
                
                if (category === 'all' || plantCategory === category) {
                    plant.style.display = '';
                } else {
                    plant.style.display = 'none';
                }
            });
        });
    });
    
    console.log('Category filter initialized with', categoryItems.length, 'categories');
}

/**
 * Initialize plant card details click functionality
 */
function initPlantCardDetails() {
    // Admin plant cards
    document.querySelectorAll('.admin-plant-card .plant-main-view').forEach(mainView => {
        mainView.addEventListener('click', function(e) {
            // Get the parent card
            const card = this.closest('.admin-plant-card');
            if (card) {
                // Check if we're in selection mode
                if (document.body.classList.contains('plant-selection-mode')) {
                    return; // Don't toggle details in selection mode
                }
                
                // Toggle the details
                toggleAdminDetails(card.querySelector('.back-to-main'));
                e.stopPropagation();
                console.log('Admin plant card clicked');
            }
        });
    });
    
    // User plant cards
    document.querySelectorAll('.user-plant-card .plant-main-view').forEach(mainView => {
        mainView.addEventListener('click', function(e) {
            // Get the parent card
            const card = this.closest('.user-plant-card');
            if (card) {
                // Check if we're in selection mode
                if (document.body.classList.contains('plant-selection-mode')) {
                    return; // Don't toggle details in selection mode
                }
                
                // Toggle the details
                toggleUserDetails(card.querySelector('.back-to-main'));
                e.stopPropagation();
                console.log('User plant card clicked');
            }
        });
    });
    
    console.log('Plant card details initialized');
}

/**
 * Toggle admin plant details panel
 */
function toggleAdminDetails(element) {
    const card = element.closest('.admin-plant-card');
    if (card) {
        card.classList.toggle('show-details');
        
        // If showing details, reset scrollbar position
        if (card.classList.contains('show-details')) {
            const detailsPanel = card.querySelector('.plant-details-panel');
            if (detailsPanel) {
                detailsPanel.scrollTop = 0;
            }
        }
    }
}

/**
 * Toggle user plant details panel
 */
function toggleUserDetails(element) {
    const card = element.closest('.user-plant-card');
    if (card) {
        card.classList.toggle('show-details');
        
        // If showing details, reset scrollbar position
        if (card.classList.contains('show-details')) {
            const detailsPanel = card.querySelector('.plant-details-panel');
            if (detailsPanel) {
                detailsPanel.scrollTop = 0;
            }
        }
    }
}

/**
 * Initialize plant details functionality
 */
function initPlantDetailsActions() {
    // Handle delete plant button clicks
    document.querySelectorAll('.delete-plant-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            
            const plantId = this.getAttribute('data-plant-id');
            const plantName = this.getAttribute('data-plant-name');
            
            if (confirm(`Are you sure you want to remove ${plantName} from display?`)) {
                fetch(`/display-plants/${plantId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Plant deleted:', data);
                    // Reload the page to reflect changes
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error deleting plant:', error);
                    alert('Failed to delete plant. Please try again.');
                });
            }
        });
    });
    
    // Handle manage photo button clicks
    document.querySelectorAll('.manage-photo-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            
            const plantId = this.getAttribute('data-plant-id');
            const photoPath = this.getAttribute('data-photo-path');
            
            // Set the plant ID in the modal form
            document.getElementById('photoPlantId').value = plantId;
            
            // Show/hide the current photo or placeholder
            const currentPhoto = document.getElementById('currentPhoto');
            const noPhotoPlaceholder = document.getElementById('noPhotoPlaceholder');
            
            if (photoPath) {
                currentPhoto.src = `/storage/${photoPath}`;
                currentPhoto.classList.remove('d-none');
                noPhotoPlaceholder.classList.add('d-none');
            } else {
                currentPhoto.classList.add('d-none');
                noPhotoPlaceholder.classList.remove('d-none');
            }
            
            // Open the photo management modal
            const photoModal = new bootstrap.Modal(document.getElementById('photoManageModal'));
            photoModal.show();
        });
    });
    
    // Handle save photo button click
    const savePhotoBtn = document.getElementById('savePhoto');
    if (savePhotoBtn) {
        savePhotoBtn.addEventListener('click', function() {
            const form = document.getElementById('photoUploadForm');
            const formData = new FormData(form);
            
            // Check if a file was selected
            if (document.getElementById('plantPhoto').files.length === 0) {
                alert('Please select a photo to upload.');
                return;
            }
            
            fetch('/display-plants/photo/upload', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Photo uploaded:', data);
                // Close the modal
                bootstrap.Modal.getInstance(document.getElementById('photoManageModal')).hide();
                // Reload the page to show the new photo
                window.location.reload();
            })
            .catch(error => {
                console.error('Error uploading photo:', error);
                alert('Failed to upload photo. Please try again.');
            });
        });
    }
    
    // Handle remove photo button click
    const removePhotoBtn = document.getElementById('removePhoto');
    if (removePhotoBtn) {
        removePhotoBtn.addEventListener('click', function() {
            const plantId = document.getElementById('photoPlantId').value;
            
            if (confirm('Are you sure you want to remove this photo?')) {
                fetch(`/display-plants/photo/remove/${plantId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Photo removed:', data);
                    // Close the modal
                    bootstrap.Modal.getInstance(document.getElementById('photoManageModal')).hide();
                    // Reload the page
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error removing photo:', error);
                    alert('Failed to remove photo. Please try again.');
                });
            }
        });
    }
}

/**
 * Initialize plant inventory search for adding plants
 */
function initPlantInventorySearch() {
    const searchInput = document.getElementById('plantSearchInput');
    const searchResults = document.getElementById('searchResults');
    
    if (!searchInput || !searchResults) {
        return;
    }
    
    // Get IDs of all displayed plants to exclude them from search results
    const getDisplayedPlantIds = () => {
        const displayedPlants = [];
        document.querySelectorAll('.plant-item').forEach(item => {
            const plantName = item.getAttribute('data-name');
            if (plantName) {
                displayedPlants.push(plantName);
            }
        });
        return displayedPlants;
    };
    
    // Handle input changes for search
    searchInput.addEventListener('input', function() {
        const query = this.value.trim();
        
        // Display results with just a single character (changed from 2)
        if (query.length < 1) {
            searchResults.classList.add('d-none');
            return;
        }
        
        // Get the currently displayed plants to exclude
        const displayedPlants = getDisplayedPlantIds();
        
        // Fetch plants from inventory that match the query
        fetch(`/plants/search?search=${encodeURIComponent(query)}&exclude=${encodeURIComponent(JSON.stringify(displayedPlants))}`, {
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Clear previous results
            searchResults.innerHTML = '';
            
            if (data.length === 0) {
                searchResults.innerHTML = '<div class="p-2 text-muted">No plants found</div>';
            } else {
                data.forEach(plant => {
                    const item = document.createElement('div');
                    item.className = 'search-result-item p-2 border-bottom';
                    // Add styles to prevent text selection while keeping a clickable appearance
                    item.style.userSelect = 'none';
                    item.style.cursor = 'pointer';
                    item.style.webkitUserSelect = 'none';
                    item.style.mozUserSelect = 'none';
                    item.style.msUserSelect = 'none';
                    
                    item.innerHTML = `
                        <div><strong>${plant.name}</strong></div>
                        <div class="small text-muted">${plant.scientific_name || ''}</div>
                    `;
                    
                    // Handle click on the plant to select it
                    item.addEventListener('click', function() {
                        // Fill in the form with the selected plant's data
                        document.getElementById('plantName').value = plant.name;
                        document.getElementById('plantCode').value = plant.code || '';
                        document.getElementById('scientificName').value = plant.scientific_name || '';
                        document.getElementById('category').value = plant.category;
                        document.getElementById('heightMm').value = plant.height_mm || '';
                        document.getElementById('spreadMm').value = plant.spread_mm || '';
                        document.getElementById('spacingMm').value = plant.spacing_mm || '';
                        
                        // Hide the search results
                        searchResults.classList.add('d-none');
                        searchInput.value = plant.name;
                    });
                    
                    searchResults.appendChild(item);
                });
            }
            
            searchResults.classList.remove('d-none');
        })
        .catch(error => {
            console.error('Error searching plants:', error);
            searchResults.innerHTML = '<div class="p-2 text-danger">Error loading plants</div>';
            searchResults.classList.remove('d-none');
        });
    });
    
    // Hide search results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('d-none');
        }
    });
    
    // Set up the Save button for the Add Plant modal
    const saveNewPlantBtn = document.getElementById('saveNewPlant');
    if (saveNewPlantBtn) {
        saveNewPlantBtn.addEventListener('click', function() {
            const formData = new FormData();
            
            // Get form data
            formData.append('name', document.getElementById('plantName').value);
            formData.append('code', document.getElementById('plantCode').value);
            formData.append('scientific_name', document.getElementById('scientificName').value);
            formData.append('category', document.getElementById('category').value);
            formData.append('height_mm', document.getElementById('heightMm').value);
            formData.append('spread_mm', document.getElementById('spreadMm').value);
            formData.append('spacing_mm', document.getElementById('spacingMm').value);
            
            // Add photo if selected
            const photoInput = document.getElementById('photo');
            if (photoInput.files.length > 0) {
                formData.append('photo', photoInput.files[0]);
            }
            
            // Submit the form
            fetch('/display-plants', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Plant added:', data);
                // Close the modal
                bootstrap.Modal.getInstance(document.getElementById('addPlantModal')).hide();
                // Reload the page
                window.location.reload();
            })
            .catch(error => {
                console.error('Error adding plant:', error);
                alert('Failed to add plant. Please try again.');
            });
        });
    }
}

/**
 * Initialize search functionality
 */
function initSearchFunctionality() {
    const searchInput = document.getElementById('searchInput');
    if (!searchInput) {
        console.error('Search input not found');
        return;
    }
    
    const plantItems = document.querySelectorAll('.plant-item');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        console.log('Search term:', searchTerm);
        
        plantItems.forEach(plant => {
            const plantName = plant.getAttribute('data-name').toLowerCase();
            if (plantName.includes(searchTerm) || searchTerm === '') {
                plant.style.display = '';
            } else {
                plant.style.display = 'none';
            }
        });
    });
    
    console.log('Search functionality initialized');
}

// Add this new function to handle the RFQ form
function handleRFQForm() {
    const itemsTable = document.getElementById('rfqItemsTable');
    if (!itemsTable) {
        console.error('RFQ items table not found');
        return;
    }

    const plants = [
        { name: 'Plant 1', code: 'P1', height: '100', spread: '50', spacing: '30' },
        { name: 'Plant 2', code: 'P2', height: '120', spread: '60', spacing: '40' },
        { name: 'Plant 3', code: 'P3', height: '150', spread: '70', spacing: '50' }
    ];

    plants.forEach((plant, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td style="text-align: center;">${index + 1}</td>
            <td style="text-align: center;">
                <input type="number" min="1" value="${plant.quantity || 1}" class="form-control form-control-sm" style="width: 60px" 
                    onchange="updatePlantTotalPrice(this)">
            </td>
            <td>${plant.name}</td>
            <td>${plant.code || ''}</td>
            <td style="text-align: center;">
                <input type="number" value="${plant.height || ''}" class="form-control form-control-sm height-field" style="width: 80px">
            </td>
            <td style="text-align: center;">
                <input type="number" value="${plant.spread || ''}" class="form-control form-control-sm spread-field" style="width: 80px">
            </td>
            <td style="text-align: center;">
                <input type="number" value="${plant.spacing || ''}" class="form-control form-control-sm spacing-field" style="width: 80px">
            </td>
            <td style="text-align: center;">
                <input type="text" class="form-control form-control-sm remarks-field" placeholder="Add remarks">
            </td>
            <td style="text-align: center;">
                <input type="number" class="form-control form-control-sm unit-price" value="0.00" min="0" step="0.01" style="width: 80px"
                    onchange="updatePlantTotalPrice(this)">
            </td>
            <td style="text-align: center;">
                <span class="total-price">₱0.00</span>
            </td>
            <td style="text-align: center;">Pending</td>
        `;
        itemsTable.appendChild(row);
    });
    
    // Add function to calculate total price
    window.updatePlantTotalPrice = function(input) {
        const row = input.closest('tr');
        const quantity = parseFloat(row.querySelector('td:nth-child(2) input').value) || 0;
        const unitPrice = parseFloat(row.querySelector('.unit-price').value) || 0;
        const totalPrice = (quantity * unitPrice).toFixed(2);
        row.querySelector('.total-price').textContent = '₱' + totalPrice;
    };
    
    // Initialize total prices
    document.querySelectorAll('#rfqItemsTable tr').forEach(row => {
        const unitPriceInput = row.querySelector('.unit-price');
        if (unitPriceInput) {
            window.updatePlantTotalPrice(unitPriceInput);
        }
    });
    
    // Reset selection mode
    document.body.classList.remove('plant-selection-mode');
}

// Global variables for plant selection
let selectedPlants = [];
const MAX_PLANTS = 20;

// Initialize plant selection counter - only for authenticated users
function initPlantSelectionCounter() {
    // Only show counter for authenticated users who are not clients
    if (!isUserAuthenticated() || isClientUser()) {
        return;
    }
    
    // Create counter element if it doesn't exist
    if (!document.querySelector('.selected-plants-counter')) {
        const counter = document.createElement('div');
        counter.className = 'selected-plants-counter';
        counter.innerHTML = `
            <i class="fas fa-leaf"></i>
            <span class="count">0</span>
            <span>plants selected</span>
            <button class="view-btn" onclick="viewSelectedPlants()">View Request</button>
            <button class="clear-btn" onclick="clearAllSelectedPlants()"><i class="fas fa-trash"></i></button>
        `;
        document.body.appendChild(counter);
    }
    updatePlantCounter();
}

// Check if user is authenticated
function isUserAuthenticated() {
    // We can check if the user is authenticated by looking for a specific element
    // that's only present for authenticated users
    return document.querySelector('[data-auth-check="true"]') !== null;
}

// Check if the current user is a client
function isClientUser() {
    // Look for a data attribute that identifies client users
    return document.querySelector('[data-user-role="client"]') !== null;
}

// Add a function to clear all selected plants
function clearAllSelectedPlants() {
    if (selectedPlants.length === 0) {
        return; // Nothing to clear
    }
    
    if (confirm('Are you sure you want to clear all selected plants?')) {
        // Store the plant IDs to update their buttons
        const plantIds = selectedPlants.map(plant => plant.id);
        
        // Clear the array
        selectedPlants = [];
        
        // Save the empty selection
        saveSelectedPlants();
        
        // Update the counter
        updatePlantCounter();
        
        // Update all buttons back to "Add Plant"
        plantIds.forEach(id => {
            updatePlantActionButtons(id, 'add');
        });
        
        showToast('All selected plants have been cleared');
    }
}

// Update the plant selection counter
function updatePlantCounter() {
    const counter = document.querySelector('.selected-plants-counter');
    if (!counter) return;
    
    const countElement = counter.querySelector('.count');
    countElement.textContent = selectedPlants.length;
    
    if (selectedPlants.length > 0) {
        counter.classList.add('has-items');
    } else {
        counter.classList.remove('has-items');
    }
}

// Handle add plant button click
function initAddPlantButtons() {
    // Skip for clients or non-authenticated users
    if (!isUserAuthenticated() || isClientUser()) {
        return;
    }

    document.querySelectorAll('.plant-action-btn').forEach(button => {
        button.addEventListener('click', function() {
            const plantId = this.getAttribute('data-plant-id');
            const plantName = this.getAttribute('data-plant-name');
            const plantCode = this.getAttribute('data-plant-code');
            const action = this.getAttribute('data-action');
            
            // Get the edited measurements from the inputs
            const card = this.closest('.plant-details-panel');
            const heightInput = card.querySelector('.editable-measurement[data-field="height"]');
            const spreadInput = card.querySelector('.editable-measurement[data-field="spread"]');
            const spacingInput = card.querySelector('.editable-measurement[data-field="spacing"]');
            
            const height = heightInput ? heightInput.value : null;
            const spread = spreadInput ? spreadInput.value : null;
            const spacing = spacingInput ? spacingInput.value : null;
            
            if (action === 'add') {
                // Add plant to selection
                addPlantToSelection(plantId, plantName, plantCode, height, spread, spacing);
                
                // Change button to remove
                this.setAttribute('data-action', 'remove');
                this.innerHTML = '<i class="fas fa-minus"></i> Remove Plant';
            } else {
                // Remove plant from selection
                removePlantFromSelection(plantId);
                
                // Change button back to add
                this.setAttribute('data-action', 'add');
                this.innerHTML = '<i class="fas fa-plus"></i> Add Plant';
            }
        });
    });
}

// Add plant to selection
function addPlantToSelection(plantId, plantName, plantCode, height, spread, spacing) {
    // Check if already at maximum plants
    if (selectedPlants.length >= MAX_PLANTS) {
        alert(`You can only select up to ${MAX_PLANTS} plants for a request.`);
        return;
    }
    
    // Check if plant already exists in selection
    const existingIndex = selectedPlants.findIndex(p => p.id === plantId);
    
    if (existingIndex >= 0) {
        // Update existing plant
        selectedPlants[existingIndex].height = height;
        selectedPlants[existingIndex].spread = spread;
        selectedPlants[existingIndex].spacing = spacing;
        showToast(`Updated measurements for ${plantName}`);
    } else {
        // Add new plant
        selectedPlants.push({
            id: plantId,
            name: plantName,
            code: plantCode,
            height: height,
            spread: spread,
            spacing: spacing,
            quantity: 1
        });
        showToast(`Added ${plantName} to your request`);
    }
    
    // Save to session storage
    saveSelectedPlants();
    
    // Update counter
    updatePlantCounter();
    
    // Update the button state for this plant
    updatePlantActionButtons(plantId, 'remove');
}

// Remove plant from selection
function removePlantFromSelection(plantId) {
    // Find and remove from array
    const index = selectedPlants.findIndex(p => p.id === plantId);
    
    if (index !== -1) {
        const plantName = selectedPlants[index].name;
        selectedPlants.splice(index, 1);
        saveSelectedPlants();
        updatePlantCounter();
        showToast(`Removed ${plantName} from your request`);
    }
    
    // Update the button state for this plant
    updatePlantActionButtons(plantId, 'add');
}

// Update all action buttons for a specific plant
function updatePlantActionButtons(plantId, action) {
    document.querySelectorAll(`.plant-action-btn[data-plant-id="${plantId}"]`).forEach(btn => {
        btn.setAttribute('data-action', action);
        
        if (action === 'add') {
            btn.innerHTML = '<i class="fas fa-plus"></i> Add Plant';
        } else {
            btn.innerHTML = '<i class="fas fa-minus"></i> Remove Plant';
        }
    });
}

// View selected plants (opens request form)
function viewSelectedPlants() {
    if (selectedPlants.length === 0) {
        alert('You have not selected any plants yet.');
        return;
    }
    
    // Open the modal instead of navigating
    populateRequestFormModal();
    const requestModal = new bootstrap.Modal(document.getElementById('requestFormModal'));
    requestModal.show();
}

// Populate the request form modal with selected plants
function populateRequestFormModal() {
    const tableBody = document.getElementById('modalPlantsTableBody');
    const emptySelection = document.getElementById('modalEmptySelection');
    const submitButton = document.getElementById('modalSubmitButton');
    
    // Clear the current table
    tableBody.innerHTML = '';
    
    // Update UI based on selection
    if (selectedPlants.length === 0) {
        emptySelection.classList.remove('d-none');
        submitButton.disabled = true;
    } else {
        emptySelection.classList.add('d-none');
        submitButton.disabled = false;
        
        // Populate table with selected plants
        selectedPlants.forEach((plant, index) => {
            const row = document.createElement('tr');
            row.dataset.id = plant.id;
            
            row.innerHTML = `
                <td>${plant.name}
                    <input type="hidden" name="plants[${index}][id]" value="${plant.id}">
                    <input type="hidden" name="plants[${index}][name]" value="${plant.name}">
                </td>
                <td>${plant.code || 'N/A'}</td>
                <td>
                    <input type="number" class="form-control form-control-sm modal-qty-input" 
                           name="plants[${index}][quantity]" 
                           value="${plant.quantity}" 
                           min="1" 
                           max="100"
                           required>
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm" 
                           name="plants[${index}][height]" 
                           value="${plant.height || ''}" 
                           placeholder="mm">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm" 
                           name="plants[${index}][spread]" 
                           value="${plant.spread || ''}" 
                           placeholder="mm">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm" 
                           name="plants[${index}][spacing]" 
                           value="${plant.spacing || ''}" 
                           placeholder="mm">
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger modal-remove-plant" data-id="${plant.id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;
            
            tableBody.appendChild(row);
        });
        
        // Initialize event listeners for the modal's remove buttons
        initModalRemoveButtons();
        
        // Initialize quantity input handlers in the modal
        initModalQuantityInputs();
    }
}

// Handle remove plant button in the modal
function initModalRemoveButtons() {
    document.querySelectorAll('.modal-remove-plant').forEach(button => {
        button.addEventListener('click', function() {
            const plantId = this.getAttribute('data-id');
            const row = this.closest('tr');
            
            // Remove from UI
            row.remove();
            
            // Remove from selectedPlants array
            removePlantFromSelection(plantId);
            
            // Show empty state if no plants left
            if (selectedPlants.length === 0) {
                document.getElementById('modalEmptySelection').classList.remove('d-none');
                document.getElementById('modalSubmitButton').disabled = true;
            }
            
            // Update quantity input names to maintain consecutive indexing
            document.querySelectorAll('#modalPlantsTableBody tr').forEach((row, index) => {
                row.querySelectorAll('input[name*="plants["]').forEach(input => {
                    const name = input.name;
                    const newName = name.replace(/plants\[\d+\]/, `plants[${index}]`);
                    input.name = newName;
                });
            });
            
            // Update UI buttons for this plant
            updatePlantActionButtons(plantId, 'add');
        });
    });
}

// Initialize quantity inputs in the modal
function initModalQuantityInputs() {
    document.querySelectorAll('.modal-qty-input').forEach(input => {
        input.addEventListener('change', function() {
            const plantId = this.closest('tr').dataset.id;
            const newQty = parseInt(this.value);
            
            // Update in selectedPlants array
            const index = selectedPlants.findIndex(p => p.id === plantId);
            if (index !== -1) {
                selectedPlants[index].quantity = newQty;
                saveSelectedPlants();
            }
        });
    });
}

// Handle the modal's submit button
function initModalSubmitButton() {
    const submitButton = document.getElementById('modalSubmitButton');
    if (!submitButton) return;
    
    submitButton.addEventListener('click', function() {
        const form = document.getElementById('modalRequestForm');
        
        // Validate form
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        
        if (selectedPlants.length === 0) {
            alert('Please select at least one plant for your request.');
            return;
        }
        
        // Get CSRF token from meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Submit the form through AJAX
        const formData = new FormData(form);
        
        // Show loading state
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => {
            // Check if response is JSON or HTML
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                return response.json().then(data => {
                    return { success: data.success, message: data.message, isJson: true };
                });
            } else {
                // If it's HTML, that means it's a redirect
                // We'll simulate a redirect here
                window.location.href = response.url;
                return { success: true, isJson: false };
            }
        })
        .then(data => {
            if (data.isJson) {
                if (data.success) {
                    // Show success message
                    alert('Your plant request has been submitted successfully!');
                    
                    // Store the plant IDs to update their buttons
                    const plantIds = selectedPlants.map(plant => plant.id);
                    
                    // Clear selected plants
                    selectedPlants = [];
                    saveSelectedPlants();
                    updatePlantCounter();
                    
                    // Reset all plant action buttons to "Add"
                    plantIds.forEach(id => {
                        updatePlantActionButtons(id, 'add');
                    });
                    
                    // Close the modal
                    bootstrap.Modal.getInstance(document.getElementById('requestFormModal')).hide();
                } else {
                    alert('Error: ' + (data.message || 'An error occurred while submitting your request.'));
                }
            }
            
            // Reset button state
            submitButton.disabled = false;
            submitButton.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Request';
        })
        .catch(error => {
            console.error('Error submitting form:', error);
            alert('An error occurred while submitting your request. Please try again.');
            
            // Reset button state
            submitButton.disabled = false;
            submitButton.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Request';
        });
    });
}

// Show toast notification
function showToast(message) {
    // Create toast if it doesn't exist
    if (!document.getElementById('toast')) {
        const toast = document.createElement('div');
        toast.id = 'toast';
        toast.className = 'toast';
        document.body.appendChild(toast);
    }
    
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.classList.add('show');
    
    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}

// Initialize editable measurements
function initEditableMeasurements() {
    document.querySelectorAll('.editable-measurement').forEach(input => {
        // Restore original value when escape key is pressed
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                this.value = this.getAttribute('data-original');
                this.blur();
            }
        });
    });
}

// Save selected plants to session storage
function saveSelectedPlants() {
    sessionStorage.setItem('selectedPlants', JSON.stringify(selectedPlants));
}

// Load selected plants from session storage
function loadSelectedPlants() {
    const saved = sessionStorage.getItem('selectedPlants');
    if (saved) {
        selectedPlants = JSON.parse(saved);
    }
}

// Add a function to clear plants on logout
function clearPlantsOnLogout() {
    // Find logout links
    document.querySelectorAll('a[href*="logout"]').forEach(link => {
        link.addEventListener('click', function(e) {
            // Clear selected plants from session storage
            sessionStorage.removeItem('selectedPlants');
            selectedPlants = [];
        });
    });
    
    // Also clear plants if user is not authenticated
    if (!isUserAuthenticated() && sessionStorage.getItem('selectedPlants')) {
        sessionStorage.removeItem('selectedPlants');
        selectedPlants = [];
    }
} 