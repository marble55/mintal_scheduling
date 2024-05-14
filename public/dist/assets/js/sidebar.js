// document.addEventListener('DOMContentLoaded', function() {
//     const dropdownToggles = document.querySelectorAll('.sidebar-link[data-bs-toggle="collapse"]');

//     dropdownToggles.forEach(function(dropdownToggle) {
//         dropdownToggle.addEventListener('click', function() {
//             const target = document.querySelector(dropdownToggle.getAttribute('data-bs-target'));
//             const isExpanded = target.classList.contains('show');

//             // Close all dropdowns except the current one
//             const allDropdowns = document.querySelectorAll('.sidebar-dropdown');
//             allDropdowns.forEach(function(dropdown) {
//                 if (dropdown !== target && dropdown.classList.contains('show')) {
//                     dropdown.classList.remove('show');
//                 }
//             });

//             // Toggle the clicked dropdown
//             target.classList.toggle('show', !isExpanded);
//         });
//     });

//     // Close a specific menu
//     const closeMenuButtons = document.querySelectorAll('.close-menu-button');

//     closeMenuButtons.forEach(function(closeMenuButton) {
//         closeMenuButton.addEventListener('click', function(event) {
//             const menuToClose = document.querySelector(closeMenuButton.getAttribute('data-menu-target'));
//             menuToClose.classList.remove('show');
//             event.stopPropagation(); // Prevent toggling the sidebar when clicking the close button
//         });
//     });

//     const hamBurger = document.querySelector(".toggle-btn");

//     hamBurger.addEventListener("click", function () {
//         document.querySelector("#sidebar").classList.toggle("expand");
//     });
// });
// const hamBurger = document.querySelector(".toggle-btn");

// hamBurger.addEventListener("click", function () {
//   document.querySelector("#sidebar").classList.toggle("expand");
// });

document.addEventListener('DOMContentLoaded', function () {
  var sidebarToggleBtn = document.querySelector('.toggle-btn');
  var sidebar = document.getElementById('sidebar');

  sidebarToggleBtn.addEventListener('click', function () {
      sidebar.classList.toggle('expand');
  });
});

