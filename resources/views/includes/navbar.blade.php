<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" style="background-color: #f0f0f0;" id="mainNav">
  <div class="container">
    <a href="{{ (route('home')) }}" class="navbar-brand">
      <img src="{{ url('frontend/images/logo.png') }}" style="width: 8.5rem;" alt="Logo NOMADS">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="bi-list"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
        <li class="nav-item"><a id="nav-menu" class="nav-link me-lg-3" href="#">Home</a></li>
        <li class="nav-item"><a id="nav-menu" class="nav-link me-lg-3" href="#popularContent">Paket Travel</a></li>
        <li class="nav-item"><a id="nav-menu" class="nav-link me-lg-3" href="#">Price List</a></li>
        <li class="nav-item"><a id="nav-menu" class="nav-link me-lg-3" href="#testimonialContent">Testimoni</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Service
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Membership</a></li>
          </ul>
        </li>
      </ul>

      @guest
        <!-- Desktop Button -->
        <form action="">
          <button id="login" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0"
          onclick="event.preventDefault(); location.href='{{ url('login') }}';">
            <span class="d-flex align-items-center">
              <i class="bi bi-box-arrow-in-right me-2"></i>
              <span class="small">Masuk</span>
            </span>
          </button>
        </form>
      @endguest

      @auth
        <!-- Desktop Button -->
        <form action="{{ url('logout') }}" method="POST">
          @csrf
          <button id="login" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
            <span class="d-flex align-items-center">
              <i class="bi bi-box-arrow-in-left me-2"></i>
              <span class="small">Keluar</span>
            </span>
          </button>
        </form>
      @endauth

    </div>
  </div>
</nav>