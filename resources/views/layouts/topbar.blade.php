<div class="navbar-container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: black;">UMSS</a>
            
            <div class="navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-pic">
                                <img src="{{ asset('dist/assets/images/JIM.jpg') }}" alt="Profile Picture">
                            </div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Account</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <!-- Logout  -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const profileLink = document.querySelector('.navbar-nav .dropdown-toggle');
        const dropdownMenu = document.querySelector('.navbar-nav .dropdown-menu');

        profileLink.addEventListener('click', function(event) {
            event.preventDefault();
            dropdownMenu.classList.toggle('show');
        });

        // Close dropdown menu if user clicks outside of it
        document.addEventListener('click', function(event) {
            if (!dropdownMenu.contains(event.target) && !profileLink.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>
