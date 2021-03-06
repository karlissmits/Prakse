


        <nav class=" fground navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container ">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Latvju valoda
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="/services">Services</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/posts">Blog</a>
      </li>
        <li class="nav-item">
            <a class="nav-link" href="posts/create">Create Post</a>
      </li>
      </li>
    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}

                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"

                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                                   <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                                   @if (Auth::user()->role_id==1)
                                                         <a class="dropdown-item" href="/admin">Admin Panel</a>
                                                         <a class="dropdown-item" href="/data">Data</a>
                                                        <a class="dropdown-item" href="/messages">Messages</a>
                                                   @endif




                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                             @if (Auth::user()->role_id==1)
                              <a class="dropdown-item" href="/jaunie">Jaunie vardi</a>
                              <a class="dropdown-item" href="/jauniedv">Jaunie darbibas vardi</a>


                              @endif
</a>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body {
          font-family: "Lato", sans-serif;
        }

        </style>
        </head>
        <body>

        <div class="leftnav">
          <li><a href="/lietvardi">Lietvardi</a></li>
        <li><a href="/darbibasvardi">Darbibas vardi</a></li>
        <li><a href="#">Ipasibas vardi</a></li>
        <li><a href="#">izteicieni</a></li>
        <li><a href="#">Saukli</a></li>
        <li><a href="#">Pamazinatas forma</a></li>
        </div>

        </body>
