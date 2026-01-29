/**
 * Standardized Loading Utilities
 * Domino-style loader animation
 */

const LoadingManager = {
    /**
     * Show full page loading overlay with domino animation
     * @param {string} message - Main loading message
     * @param {string} submessage - Optional sub-message
     */
    show: function(message = 'Loading...', submessage = '') {
        // Remove existing overlay if any
        this.hide();
        
        const overlay = document.createElement('div');
        overlay.id = 'globalLoadingOverlay';
        overlay.className = 'loading-overlay';
        overlay.innerHTML = `
            <div class="loading-content">
                <div class="domino-container">
                    <div class="domino-loader"></div>
                    <div class="domino-loader"></div>
                    <div class="domino-loader"></div>
                    <div class="domino-loader"></div>
                    <div class="domino-loader"></div>
                </div>
                <div class="loading-text">${message}</div>
                ${submessage ? `<div class="loading-subtext">${submessage}</div>` : ''}
            </div>
        `;
        
        document.body.appendChild(overlay);
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    },
    
    /**
     * Hide full page loading overlay
     */
    hide: function() {
        const overlay = document.getElementById('globalLoadingOverlay');
        if (overlay) {
            overlay.remove();
        }
        
        // Restore body scroll
        document.body.style.overflow = '';
    },
    
    /**
     * Show loading state on a button
     * @param {HTMLElement} button - The button element
     * @param {string} text - Loading text (default: 'Loading...')
     */
    buttonStart: function(button, text = 'Loading...') {
        if (!button) return;
        
        // Store original content
        button.dataset.originalHtml = button.innerHTML;
        button.disabled = true;
        
        button.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
            ${text}
        `;
    },
    
    /**
     * Restore button to original state
     * @param {HTMLElement} button - The button element
     */
    buttonStop: function(button) {
        if (!button) return;
        
        button.disabled = false;
        if (button.dataset.originalHtml) {
            button.innerHTML = button.dataset.originalHtml;
            delete button.dataset.originalHtml;
        }
    },
    
    /**
     * Show loading on form submission
     * @param {HTMLFormElement} form - The form element
     * @param {Object} options - Configuration options
     */
    formSubmit: function(form, options = {}) {
        const defaults = {
            message: 'Submitting...',
            submessage: 'Please wait while we process your request.',
            buttonText: 'Submitting...'
        };
        
        const config = { ...defaults, ...options };
        
        if (!form) return;
        
        form.addEventListener('submit', () => {
            // Find submit button
            const submitBtn = form.querySelector('button[type="submit"]');
            
            if (submitBtn) {
                this.buttonStart(submitBtn, config.buttonText);
            }
            
            // Show overlay after short delay
            setTimeout(() => {
                this.show(config.message, config.submessage);
            }, 300);
        });
    },
    
    /**
     * Create inline spinner (Bootstrap compatible)
     * @param {string} size - 'sm', 'md', or 'lg'
     * @param {string} color - Bootstrap color class
     * @returns {string} HTML string for spinner
     */
    inlineSpinner: function(size = 'sm', color = 'success') {
        const sizeClass = size === 'sm' ? 'spinner-border-sm' : '';
        return `<span class="spinner-border ${sizeClass} text-${color}" role="status" aria-hidden="true"></span>`;
    }
};

// Auto-hide loading on page errors
window.addEventListener('error', function() {
    LoadingManager.hide();
});

// Make globally available
window.LoadingManager = LoadingManager;
