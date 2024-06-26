{{-- NAVBAR LANDING PAGE --}}

<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ route('home') }}">SMA IT IQRA'</a></h1>
      
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">About</a></li>
          <li><a class="nav-link scrollto" href="#about">Visi Misi</a></li>
          {{-- <li><a class="nav-link scrollto" href="#why-us">Prestasi</a></li>  --}}
          <li><a class="nav-link scrollto" href="#services">Berita</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          @if (Auth::user())
          <li><a class="nav-link scrollto" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="getstarted scrollto" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
                {{--  <a class="nav-link scrollto" href="{{ route('logout') }}">{{ __('Log Out') }}</a>  --}}
            </li>
          @else
            <li><a class="getstarted scrollto" href="{{ route('login') }}" style="margin-left: 18px">Login</a></li>
            <li><a class="getstarted scrollto" href="{{ route('register') }}" style="margin-left: 6px">Register</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
