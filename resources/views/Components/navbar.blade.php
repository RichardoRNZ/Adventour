<?php
 use App\Http\Controllers\MainController;
    $countries = MainController:: getAllCountry();
?>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          Adventour
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle  text-white"
              href="#"
              id="navbarDropdownMenuLink"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              Country
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach ($countries as $country)

              <li>
                <a class="dropdown-item" href="#">{{$country->name}}</a>
              </li>


              @endforeach

            </ul>
          </li>
          <li class="nav-item text-white">
            <a class="nav-link text-white" href="#">Package</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Contact</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="text-reset me-3" href="#">
          <i class="icon fas fa-shopping-cart"></i>
        </a>

        <!-- Notifications -->
        <div class="dropdown">
          <a
            class="text-reset me-3 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
          <i class="icon fa-solid fa-clock-rotate-left "></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </div>
        <!-- Avatar -->
        <div class="profile">
            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" onclick="ProfileMenu()"/>
        </div>
        <div class="profile-menu-wrap" id="profilemenu">
            <div class="profile-menu">
                <div class="user-info">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" alt="" >
                    <h3>Elon Musk</h3>
                </div>
                <hr>
                <div class="profile-menu-link">
                    <a href="">
                        <i class="fas fa-user"></i>
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>
                </div>
                <div class="profile-menu-link">
                    <a href="">
                        <i class="fas fa-key"></i>
                        <p>Change Password</p>
                        <span>></span>
                    </a>
                </div>
                <div class="profile-menu-link">
                    <a href="">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <p>Sign Out</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </div>
        {{-- endmenuwrap --}}
        </div>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
