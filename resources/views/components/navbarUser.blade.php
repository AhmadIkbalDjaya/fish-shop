@push('style')
  <link rel="stylesheet" href="{{ asset('/css/users.css') }}">
@endpush

<!-- HEADER -->
<header class="header">
  <div id="menu-btn" class="fas fa-bars"></div>

  <a href="#home" class="logo">Fish Shop <img src="{{ asset('/images/icon-1.png') }}" alt="img"
      style="height: 40px"></a>

  <nav class="navbar">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#menu">Menu</a>
  </nav>
  <button href="#" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
      class="bi bi-cart2 fs-3"></i></button>
  <div class="btn-group">
    <button type="button" class="btn dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"
      data-bs-display="static" aria-expanded="false">
      <div class="bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center icn-akun">A</div>
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
      <li>
        <a href="{{ route('login') }}">
          <button class="dropdown-item logout fs-4 " type="button">Logout</button>
        </a>
      </li>
    </ul>
  </div>
</header>
