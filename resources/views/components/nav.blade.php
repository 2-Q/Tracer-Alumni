@if (Auth::check())

<style>
  li {
    font-family: sans-serif;
  }
</style>
<nav style="background-color:#00C2D9;" class="navbar navbar-expand-lg justify-content-between   ">
    <div class="container-fluid">
        <img style="width: 130px; margin-right:5px;" src="{{ asset('logobkkstmj.png') }}" alt="">
      {{--  <a style="color: white; font-family:arial;" class="navbar-brand" href="/">Bursa Kerja Khusus - STMJ</a>  --}}
      <button class="navbar-toggler toggler-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul style="float: right" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li  class="nav-item">
            <a style="color: white;" class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item  {{ request()->is('professions.table') ? 'active' : ''}}">
            <a style="color: white" class="nav-link" href="/professions/index">Lowongan</a>
          </li>
          <li class="nav-item">
            <a style="color: white" class="nav-link" href="#">Tentang</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a style="color: white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="">
                        Profil Saya
                      </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
      </div>
    </div>
  </nav>
  @endif
  @if (Auth::check())
<nav style="background-color:#00C2D9;" class="navbar navbar-expand-lg justify-content-between fixed-top  ">
    <div class="container-fluid">
        <img style="width: 130px; margin-right:5px;" src="{{ asset('logobkkstmj.png') }}" alt="">
      {{--  <a style="color: white; font-family:arial;" class="navbar-brand" href="/">Bursa Kerja Khusus - STMJ</a>  --}}
      <button class="navbar-toggler toggler-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul style="float: right" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li  class="nav-item">
            <a style="color: white;" class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item  {{ request()->is('professions.table') ? 'active' : ''}}">
            <a style="color: white" class="nav-link" href="/professions/index">Lowongan</a>
          </li>
          <li class="nav-item">
            <a style="color: white" class="nav-link" href="#">Tentang</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a style="color: white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="">
                        Profil Saya
                      </a>
                      <a class="dropdown-item" href="/professions/dashboard">
                        Dashboard Saya
                      </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
      </div>
    </div>
  </nav>
  @endif