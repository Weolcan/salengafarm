/**
 * Alert System - Standardized alerts using SweetAlert2
 */

const AlertSystem = {
    /**
     * Show a simple alert
     * @param {Object} options - Alert options
     * @param {string} options.title - Alert title
     * @param {string} options.message - Alert message
     * @param {string} options.type - Alert type (success, error, warning, info)
     */
    alert: function(options) {
        const defaults = {
            title: 'Notice',
            message: '',
            type: 'info'
        };
        
        const config = { ...defaults, ...options };
        
        Swal.fire({
            icon: config.type,
            title: config.title,
            text: config.message,
            confirmButtonText: 'OK',
            confirmButtonColor: '#198754'
        });
    },
    
    /**
     * Show a confirmation dialog
     * @param {Object} options - Confirmation options
     * @param {string} options.title - Dialog title
     * @param {string} options.message - Dialog message
     * @param {Function} options.onConfirm - Callback when confirmed
     * @param {Function} options.onCancel - Callback when cancelled
     */
    confirm: function(options) {
        const defaults = {
            title: 'Confirm',
            message: 'Are you sure?',
            confirmText: 'Yes',
            cancelText: 'Cancel',
            onConfirm: () => {},
            onCancel: () => {}
        };
        
        const config = { ...defaults, ...options };
        
        Swal.fire({
            icon: 'question',
            title: config.title,
            text: config.message,
            showCancelButton: true,
            confirmButtonText: config.confirmText,
            cancelButtonText: config.cancelText,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#6c757d'
        }).then((result) => {
            if (result.isConfirmed) {
                config.onConfirm();
            } else if (result.isDismissed) {
                config.onCancel();
            }
        });
    },
    
    /**
     * Show a toast notification
     * @param {Object} options - Toast options
     * @param {string} options.message - Toast message
     * @param {string} options.type - Toast type (success, error, warning, info)
     * @param {number} options.duration - Duration in milliseconds (default: 3000)
     */
    toast: function(options) {
        const defaults = {
            message: '',
            type: 'success',
            duration: 3000
        };
        
        const config = { ...defaults, ...options };
        
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: config.duration,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
        
        Toast.fire({
            icon: config.type,
            title: config.message
        });
    }
};

// Make globally available
window.AlertSystem = AlertSystem;
