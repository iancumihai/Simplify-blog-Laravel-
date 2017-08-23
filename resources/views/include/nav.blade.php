<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="logo" href="/">Simplify</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a id="nav-color" href="#">INFO MENARIK</a>
        </li>
        <li><a id="nav-color" href="#">KOMPUTER</a>
        </li>
        <li><a id="nav-color" href="#">PROFIL ARTIS</a>
        </li>
        <li><a id="nav-color" href="#">TIPS BLOGGER</a>
        </li>
        <li class="dropdown">
          <a id="nav-color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BLOG<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">About</a>
            </li>
            <li><a href="#">Contact</a>
            </li>
            <li><a href="#">Css minifier</a>
            </li>
            <li><a href="#">Disclaimer</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
        <li class="dropdown">
          <a id="nav-color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">WELCOME {{Auth::user()->name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('posts.index')}}">Post</a></li>
            <li><a href="{{route('categories.index')}}">Categories</a></li>
            <li><a href="{{route('tags.index')}}">Tags</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{route('logout')}}">Logout</a></li>
          </ul>
        </li>

        @else
          <li class="{{ Request::is('login') ? "active" : "" }}"><a id="nav-color" href="{{route('login')}}">LOGIN</a></li>
          <li class="{{ Request::is('register') ? "active" : "" }}"><a id="nav-color"  href="{{route('register')}}">REGISTER</a></li>
          @endif
      </ul>
    </div>
  </div>
</nav>