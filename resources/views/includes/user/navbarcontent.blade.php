{{-- <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ route('home') }}">SI PRESTASI</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          @if (Auth::user())
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link getstarted scrollto" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
                {{--  <a class="nav-link scrollto" href="{{ route('logout') }}">{{ __('Log Out') }}</a>  --}}
            </li>
          @else
            <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
            <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
          @endif

          {{--  <li><a class="getstarted scrollto" href="#why-us">Get Started</a></li>  --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header --> --}}
