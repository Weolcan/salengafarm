$(document).ready(function() {
    // Fix edit button click to prevent multiple triggers and add proper toggle functionality
    $(document).on('click', '.edit-btn', function (e) {
        e.preventDefault();
        e.stopPropagation();

        const button = $(this);
        if (button.data('processing')) {
            return; // Prevent multiple clicks while processing
        }

        button.data('processing', true);
        
        const targetSelector = button.data('target');
        const targetElem = $(targetSelector);

        // Toggle edit mode
        if (targetElem.hasClass('editing')) {
            // Save or cancel edit - for now just toggle off
            targetElem.removeClass('editing');
            button.text('Edit').prepend('<i class="fas fa-edit"></i> ');
        } else {
            targetElem.addClass('editing');
            button.text('Cancel').prepend('<i class="fas fa-times"></i> ');
        }
        
        button.data('processing', false);
    });

    // Additional functionality can be added here for actual edit/save operations
    // This is currently just a visual toggle for the edit mode
});
