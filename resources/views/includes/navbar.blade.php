<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="{{ route('index') }}" class="navbar-brand">
          <img src="{{ asset('images/logo.svg') }}" alt="logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a href="{{ route('index') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Categories</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Rewards</a>
            </li>
            @if(Auth::user())
              @if(Auth::user()->role == 'pembeli')
                <li class="nav-item">
                  <a href="{{ route('pages.keranjang') }}" class="nav-link active" aria-current="page">Profil</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('pages.keranjang') }}" class="nav-link active" aria-current="page">Keranjang</a>
                </li>
              @endif
            @else
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Sign-Up</a>
              </li>
            @endif
            <li class="nav-item">
              @php $stat = Auth::user() ? 'logout' : 'login' @endphp
              <a href="{{ "/$stat" }}" class="nav-link active" aria-current="page">
                  {{ ucfirst($stat) }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>