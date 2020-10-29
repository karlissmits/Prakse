@extends ('layouts.app')
@section('content')

        <div class =" jumbotron text-center">


            @auth
              <h1>{{$title}} {{Auth::user()->name}}</h1>
              @else
              <h1>  Please sign in!</h1>
            @endauth
            <p>Laipni luugts!</p>
            <p><a class="btn btn-primary btn-lg loginbody" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
          </div>


@endsection
