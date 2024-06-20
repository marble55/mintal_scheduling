
document.addEventListener('DOMContentLoaded', function () {
    var sidebarToggleBtn = document.querySelector('.toggle-btn');
    var sidebar = document.getElementById('sidebar');
    var dropdownItems = document.querySelectorAll('.has-dropdown');

    // Toggle sidebar expand/collapse
    sidebarToggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('expand');
    });

    // Toggle dropdown menus
    dropdownItems.forEach(function (item) {
        var link = item.querySelector('.sidebar-link');
        link.addEventListener('click', function (e) {
            e.preventDefault();
            item.classList.toggle('active');
            
            // Optionally, close other dropdowns
            dropdownItems.forEach(function (otherItem) {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
        });
    });

    // Mark active menu items
    var currentUrl = window.location.href;
    var menuItems = document.querySelectorAll('.sidebar-link');
    menuItems.forEach(function (item) {
        if (item.href === currentUrl) {
            item.classList.add('active');
            var parentDropdown = item.closest('.has-dropdown');
            if (parentDropdown) {
                parentDropdown.classList.add('active');
            }
        }
    });
});




