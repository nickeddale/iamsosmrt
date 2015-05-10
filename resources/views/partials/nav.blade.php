<nav id="nav-background" class="navbar navbar-inverse navbar-transparent  navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button id="navbar-collpase" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">iamsosmrt</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('category', ['category' => $categories[0]['name']]) }}">{{ $categories[0]['name'] }}</a></li>
        <li><a href="{{ url('category', ['category' => $categories[1]['name']]) }}">{{ $categories[1]['name'] }}</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">All Categories <span class="caret"></span></a>
          <ul class="dropdown-menu" id="dropdown-menu"role="menu">

            @foreach( $categories as $category )
              <li><a href="{{ url('category', ['category' => $category->name]) }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>