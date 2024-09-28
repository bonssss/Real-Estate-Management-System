$(document).ready(function() {
    // Function to handle sidebar visibility
    function toggleSidebar() {
        $('.sidebar').toggleClass('collapsed');
    }

    // Toggle sidebar when menu icon is clicked
    $('.navbar-toggler').click(function() {
        toggleSidebar();
    });

    // Toggle sidebar when close button is clicked
    $('.close-btn').click(function() {
        toggleSidebar();
    });

    // Hide sidebar on small screens by default
    if ($(window).width() < 768) {
        toggleSidebar();
    }

    // Re-hide sidebar when window is resized to small screen
    $(window).resize(function() {
        if ($(window).width() < 768) {
            $('.sidebar').addClass('collapsed');
        }
    });

    // Handle settings link click to toggle change password link visibility
    $('#settings-link').click(function(event) {
        event.preventDefault();
        $('#change-password-link').toggle();
    });

    // Show change password link by default for large screens
    if ($(window).width() >= 768) {
        $('#change-password-link').show();
    }



});
