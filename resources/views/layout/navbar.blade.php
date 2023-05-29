<nav class="navbar navbar-expand-lg navbar-black ">
    <!-- Container wrapper -->
    <div class="container-fluid">
    <!-- Toggle button -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <!-- Navbar brand -->

            <h2 class="mt-3 mx-5">Muzika</h2>

            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/band">Bands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Activity</a>
                    </li>
                </ul>
            @endauth
        </div>

        <div class="d-flex align-items-center">

            @auth
                <div class="dropdown">
                    <a
                        class="dropdown-toggle d-flex align-items-center hidden-arrow"
                        href="#"
                        id="navbarDropdownMenuAvatar"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            src="{{ asset((auth()->user()->profile_pic ? 'storage/bandImgs/' . auth()->user()->profile_pic : '/assets/defaultProfile/pfp.png')) }}"
                            class="rounded-circle"
                            height="40"
                            width="40"
                            alt=""
                            loading="lazy"
                            style="border-radius: 90%"
                        />
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdownMenuAvatar"
                    >
                        <li>
                        <a class="dropdown-item" href="/settings ">Profile</a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="/profile">Settings</a>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                        <a class="dropdown-item" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            @endauth

        </div>
    </div>
</nav>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Amatic+SC&family=Bruno+Ace&family=Bruno+Ace+SC&family=Caveat&family=Comfortaa:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins&family=Sacramento&display=swap');
    *{
    font-family: 'Poppins', sans-serif;
    }
    h2{
        font-family: 'Sacramento', cursive;
        font-weight: bolder;
        color:#00376b;
    }

  </style>

  <script>

  </script>
