
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title> Laravel Blog</title>
    <script src="{{asset('font-awesome/js/fontawesome-all.min.js')}}"></script>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" >
      <a class="navbar-brand" href="#">LaraBlog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('posts.index')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('posts.index')}}">Parcourir</a>
          </li>

        <li class="nav-item"><a class="btn btn-outline-primary" href="{{route('posts.create')}}"><i class="far fa-edit"></i> Créer un article</a></li>  
      @guest
          <li class="nav-item"><a class="btn btn-outline-secondary" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li class="nav-item"><a class="btn btn-outline-success" href="{{ route('register') }}">{{ __('Register') }}</a></li>
      @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
            </div>
          </li>
        @endguest
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>


  

    <div class="container" style="margin-top:100px;">
   
      @if(session()->has('message'))
      <div class="alert alert-{{session()->has('type')?session('type'):'success'}}" role="alert">
        {{session('message')}}
      </div>
      @endif
            @yield('main_content')
    </div>


      <footer class="pt-4 my-md-5 pt-md-5 border-top">
          <p class="text-dark text-center">Copyroght | Prime IKIZAKUBUNTU</p>
      </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  </body>
</html>