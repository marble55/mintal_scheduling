
// document.addEventListener('DOMContentLoaded', function () {
//   var sidebarToggleBtn = document.querySelector('.toggle-btn');
//   var sidebar = document.getElementById('sidebar');

//   sidebarToggleBtn.addEventListener('click', function () {
//       sidebar.classList.toggle('expand');
//   });
// });
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


// let arrow = document.querySelectorAll(".arrow");
// for (var i = 0; i < arrow.length; i++) {
//     arrow[i].addEventListener("click", (e)=>{
//     let arrowParent = e.target.parentElement.parentElement;
//     arrowParent.classList.toggle("showMenu")
//     });
// }
// let sidebar = document.querySelector(".side-bar");
// let sidebarBtn = document.querySelector(".lni-menu");
// sidebarBtn.addEventListener("click", ()=>{
//     sidebar.classList.toggle("close");
// });
// document.addEventListener("DOMContentLoaded", function() {
//     const menuItems = document.querySelectorAll('.nav-links li');

//     menuItems.forEach(function(item) {
//         item.addEventListener('click', function() {
//             // Remove 'active' class from all menu items
//             menuItems.forEach(function(menuItem) {
//                 menuItem.classList.remove('active');
//             });
            
//             // Add 'active' class to the clicked menu item
//             item.classList.add('active');
//         });
//     });
// });

