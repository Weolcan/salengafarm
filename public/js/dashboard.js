/**
 * Dashboard JS - Enhances the dashboard with interactive features
 * For Salenga Farm Plant Inventory System
 */

document.addEventListener('DOMContentLoaded', function() {
    // Setup sidebar toggle for mobile
    setupSidebarToggle();
    
    // Add animation classes to cards when page loads
    animateCards();
    
    // Filter functionality for Update Stock modal
    setupStockFilters();
    
    // Search functionality for Update Stock modal
    setupStockSearch();
    
    // Apply hover effects to all cards
    setupCardHoverEffects();
    
    // Make list items in low stock alerts and recent plants consistent
    equalizeListItems();
    
    // Listen for window resize to maintain proper sizing
    window.addEventListener('resize', handleResize);
});

/**
 * Setup sidebar toggle functionality for mobile
 */
function setupSidebarToggle() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebarMenu');
    const overlay = document.getElementById('sidebarOverlay');
    
    if (!sidebarToggle || !sidebar || !overlay) return;
    
    // Toggle sidebar on button click
    sidebarToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    });
    
    // Close sidebar when clicking overlay
    overlay.addEventListener('click', function() {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    });
    
    // Close sidebar when clicking a link (mobile only)
    if (window.innerWidth <= 991) {
        const sidebarLinks = sidebar.querySelectorAll('.sidebar-link');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            });
        });
    }
}

/**
 * Animates dashboard cards with a staggered fade-in effect
 */
function animateCards() {
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        // Add a staggered delay based on the index
        setTimeout(() => {
            card.classList.add('card-animated');
        }, 80 * index); // Slightly faster animation
    });
}

/**
 * Sets up category filters in the Update Stock modal
 */
function setupStockFilters() {
    const categoryLinks = document.querySelectorAll('[data-category]');
    
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links
            categoryLinks.forEach(l => l.classList.remove('active'));
            
            // Add active class to clicked link
            this.classList.add('active');
            
            const selectedCategory = this.getAttribute('data-category');
            filterTableByCategory(selectedCategory);
        });
    });
}

/**
 * Filters the stock table based on selected category
 */
function filterTableByCategory(category) {
    const tableRows = document.querySelectorAll('#stockUpdateTableBody tr');
    
    tableRows.forEach(row => {
        const rowCategory = row.getAttribute('data-category');
        
        if (category === 'all' || rowCategory === category) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

/**
 * Sets up search functionality for the stock table
 */
function setupStockSearch() {
    const searchInput = document.getElementById('stockSearchInput');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            const tableRows = document.querySelectorAll('#stockUpdateTableBody tr');
            
            tableRows.forEach(row => {
                const plantName = row.cells[0].textContent.toLowerCase();
                const category = row.cells[1].textContent.toLowerCase();
                
                if (plantName.includes(searchTerm) || category.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
}

/**
 * Sets up hover effects for dashboard cards
 */
function setupCardHoverEffects() {
    const cards = document.querySelectorAll('.card');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('card-hover');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('card-hover');
        });
    });
}

/**
 * Ensures list items in low stock alerts and recent plants have consistent heights
 */
function equalizeListItems() {
    const listItems = document.querySelectorAll('.list-group-item');
    listItems.forEach(item => {
        // Ensure text doesn't overflow
        const title = item.querySelector('h6');
        if (title) {
            // Add tooltip for truncated text
            title.setAttribute('title', title.textContent);
        }
    });
}

/**
 * Handles window resize to maintain proper sizing
 */
function handleResize() {
    // Check if we're on mobile
    if (window.innerWidth < 768) {
        // Adjust card heights for mobile
        document.querySelectorAll('.low-stock-card, .stock-distribution-card, .right-column-card, .recent-plants-card').forEach(card => {
            card.style.height = 'auto';
        });
    } else if (window.innerWidth < 992) {
        // Tablet sizes
        document.querySelectorAll('.low-stock-card').forEach(card => card.style.height = '280px');
        document.querySelectorAll('.stock-distribution-card').forEach(card => card.style.height = '350px');
        document.querySelectorAll('.right-column-card').forEach(card => card.style.height = '120px');
        document.querySelectorAll('.recent-plants-card').forEach(card => card.style.height = '280px');
    } else {
        // Desktop - reset to default heights
        document.querySelectorAll('.low-stock-card').forEach(card => card.style.height = '310px');
        document.querySelectorAll('.stock-distribution-card').forEach(card => card.style.height = '380px');
        document.querySelectorAll('.right-column-card').forEach(card => card.style.height = '130px');
        document.querySelectorAll('.recent-plants-card').forEach(card => card.style.height = '310px');
    }
    
    // Also adjust summary cards based on screen size
    const summaryCards = document.querySelectorAll('.row.mb-4 .card');
    if (window.innerWidth < 768) {
        summaryCards.forEach(card => card.style.height = 'auto');
    } else if (window.innerWidth < 992) {
        summaryCards.forEach(card => card.style.height = '80px');
    } else {
        summaryCards.forEach(card => card.style.height = '90px');
    }
    
    // Ensure chart is responsive
    if (window.Chart && window.Chart.instances) {
        Object.values(window.Chart.instances).forEach(chart => {
            chart.resize();
        });
    }
}

/**
 * Initializes and configures the stock distribution chart with animation
 * Note: This is called directly from the dashboard.blade.php
 * 
 * @param {string} chartId - The ID of the canvas element for the chart
 * @param {Object} data - Chart data including labels and values
 */
function initStockChart(chartId, data) {
    const ctx = document.getElementById(chartId).getContext('2d');
    
    // Use natural color scheme
    const chartColors = [
        '#2a9d4e',  // Primary green
        '#6cbf84',  // Light green
        '#5cb270',  // Leaf accent
        '#8b6f47',  // Earthy brown
        '#d7c9b7',  // Light brown
        '#f6e58d',  // Soft yellow
        '#f8f5f0'   // Soft cream
    ];
    
    // Ensure we have enough colors for all categories
    while (chartColors.length < data.labels.length) {
        chartColors.push(...chartColors);
    }
    
    return new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: data.labels,
            datasets: [{
                data: data.values,
                backgroundColor: chartColors.slice(0, data.labels.length),
                borderColor: '#ffffff',
                borderWidth: 2,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        font: {
                            family: "'Nunito', sans-serif",
                            size: 12,
                            weight: 'bold'
                        },
                        color: '#333'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#333',
                    bodyColor: '#555',
                    borderColor: '#ddd',
                    borderWidth: 1,
                    padding: 12,
                    boxPadding: 5,
                    usePointStyle: true,
                    callbacks: {
                        label: function(context) {
                            const value = context.raw;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = Math.round((value / total) * 100);
                            return `${context.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true,
                duration: 1200, // Slightly faster animation
                easing: 'easeOutCubic'
            }
        }
    });
}

/**
 * Shows a dismissible alert message
 * 
 * @param {string} message - The message to display
 * @param {string} type - Alert type (success, danger, warning, info)
 * @param {number} duration - How long to show the alert in milliseconds
 */
function showAlert(message, type = 'success', duration = 3000) {
    // Create alert element
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 end-0 mt-3 me-3`;
    alert.style.zIndex = '1060';
    alert.style.minWidth = '300px';
    alert.style.maxWidth = '400px';
    alert.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    // Add to document
    document.body.appendChild(alert);
    
    // Remove after duration
    setTimeout(() => {
        alert.classList.remove('show');
        setTimeout(() => {
            alert.remove();
        }, 300);
    }, duration);
} 

/**
 * Initializes and configures the sales distribution chart
 * 
 * @param {string} chartId - The ID of the canvas element for the chart
 * @param {Object} data - Chart data including labels and values
 */
function initSalesChart(chartId, data) {
    const ctx = document.getElementById(chartId).getContext('2d');
    
    // Format category labels to capitalize first letter
    const formattedLabels = data.labels.map(label => 
        label.charAt(0).toUpperCase() + label.slice(1)
    );
    
    // Use different color scheme for sales chart
    const chartColors = [
        '#4caf50',  // Green
        '#2196f3',  // Blue
        '#ff9800',  // Orange
        '#f44336',  // Red
        '#9c27b0',  // Purple
        '#673ab7',  // Deep Purple
        '#3f51b5',  // Indigo
        '#00bcd4',  // Cyan
        '#009688',  // Teal
        '#ffeb3b'   // Yellow
    ];
    
    // Ensure we have enough colors for all categories
    while (chartColors.length < data.labels.length) {
        chartColors.push(...chartColors);
    }
    
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: formattedLabels,
            datasets: [{
                label: 'Sales Percentage by Category',
                data: data.values,
                backgroundColor: chartColors.slice(0, data.labels.length),
                borderColor: '#ffffff',
                borderWidth: 1,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y', // Horizontal bar chart
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#333',
                    bodyColor: '#555',
                    borderColor: '#ddd',
                    borderWidth: 1,
                    padding: 12,
                    boxPadding: 5,
                    callbacks: {
                        label: function(context) {
                            return `${parseFloat(context.raw).toFixed(1)}% of total sales`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    max: 100,
                    title: {
                        display: true,
                        text: 'Percentage of Total Sales',
                        color: '#666',
                        font: {
                            size: 12,
                            weight: 'bold'
                        }
                    },
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                },
                y: {
                    ticks: {
                        font: {
                            size: 11
                        }
                    }
                }
            },
            animation: {
                duration: 1200,
                easing: 'easeOutQuart'
            }
        }
    });
} 