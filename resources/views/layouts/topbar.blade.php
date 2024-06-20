<div class="navbar-container">
    <nav class="navbar">

        <!-- School Year and Semester (Hidden in Mobile View) -->
        <div class="navbar-collapse" id="schoolYearSemester">
            <div class="d-flex flex-column align-items-center">
                <a class="navbar-brand" style=" color: black;">School Year:
                    {{ app('current_academic_year')->getCurrentYearName() }}</a>
                <span class="navbar-text" style=" color: black;">Semester:
                    {{ app('current_academic_year')->getCurrentSemesterName() }}</span>
            </div>
        </div>
        <div class="navbar-right">
            <!-- Navbar Brand Toggle Button (Visible in Mobile View) -->
            {{-- <button class="navbar-toggler" id="navbar-toggler"><i class="lni lni-calendar"></i></button> --}}
            <!-- Profile Dropdown -->
            <div class="profile-dropdown">
                <a class="profile-link" href="#" id="profileDropdown">
                    <div class="profile-pic">
                        <img src="{{ app('user_image') }}" alt="Profile Picture">
                    </div>
                </a>
                <div class="dropdown-menu" id="dropdownMenu">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Account</a>
                    <hr class="dropdown-divider">
                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // const navbarToggler = document.getElementById('navbar-toggler');
        const schoolYearSemester = document.getElementById('schoolYearSemester');
        const profileDropdown = document.getElementById('profileDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // navbarToggler.addEventListener('click', function() {
        //     schoolYearSemester.classList.toggle('show');
        // });

        profileDropdown.addEventListener('click', function(event) {
            event.preventDefault();
            dropdownMenu.classList.toggle('show');
        });

        // Close dropdown menu if user clicks outside of it
        document.addEventListener('click', function(event) {
            if (!dropdownMenu.contains(event.target) && !profileDropdown.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>