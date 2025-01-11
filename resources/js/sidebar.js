document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('sidebarToggle');

    // Check if the button exists (for mobile screens)
    if (toggleButton) {
        toggleButton.addEventListener('click', function () {
            // Toggle the sidebar's visibility
            sidebar.classList.toggle('-translate-x-full');
        });
    }

    alert('test');
});
