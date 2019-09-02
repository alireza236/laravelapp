<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">LaravelApp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        @if (!empty($halaman) && $halaman == 'siswa')
           <a class="nav-link active" href="{{ url('siswa') }}">Siswa<span class="sr-only">(current)</span></a>
        @else
           <a class="nav-link" href="{{ url('siswa') }}">Siswa</a>
        @endif
      </li>
        
      <li class="nav-item">
        @if (!empty($halaman) && $halaman == 'about')
            <a class="nav-link active" href="{{ url('about') }}">About<span class="sr-only">(current)</span></a>
        @else
            <a class="nav-link" href="{{ url('about') }}">About</a>
        @endif
      </li>

      @if (Auth::check())
      <li class="nav-item">
        @if (!empty($halaman) && $halaman == 'kelas')
        <a class="nav-link active" href="{{ url('kelas') }}">Kelas<span class="sr-only">(current)</span></a>
        @else
        <a class="nav-link" href="{{ url('kelas') }}">Kelas</a>
        @endif
      </li> 
      @endif

      @if (Auth::check())
      <li class="nav-item">
        @if (!empty($halaman) && $halaman == 'hobi')
        <a class="nav-link active" href="{{ url('hobi') }}">Kelas<span class="sr-only">(current)</span></a>
        @else
        <a class="nav-link" href="{{ url('hobi') }}">Hobi</a>
        @endif
      </li> 
      @endif

    @if (Auth::check() && Auth::user()->level == 'admin' )
      <li class="nav-item">
        @if (!empty($halaman) && $halaman == 'user')
        <a class="nav-link active" href="{{ url('user') }}">User<span class="sr-only">(current)</span></a>
        @else
        <a class="nav-link" href="{{ url('user') }}">User</a>
        @endif
      </li> 
    @endif
    </ul>

    <ul class="form-inline my-2 my-lg-0">
      @if (Auth::check())
        <a href="{{ url('logout') }}" class="btn btn-success my-2 my-sm-0">{{ Auth::user()->name }}</a>
      @else
        <a href="{{ url('login') }}" class="btn btn-success my-2 my-sm-0">Login</a>
      @endif
    </ul>
  </div>
</nav>