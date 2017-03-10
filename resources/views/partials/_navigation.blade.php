<nav class="navbar navbar-default ">
    <div class="container">
        <div class="col-md-2">
          
        <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
             <a href="{!! route('index')!!}"> <img src="{{asset("/images/logoto.png")}}" class="img-responsive logo2"></a>
        </div>
    </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav top-nav ">
                <li class="{{Request::is('/') ? "active": ""}}"><a href="/">Начало</a></li>
                <li class="{{Request::is('trips') ? "active": ""}}"><a href="/trips">Всички проекти</a></li>
                <li class="{{Request::is('about') ? "active": ""}}"><a href="/about">За нас</a></li>
                
                <li class="{{Request::is('organizations') ? "active": ""}}"><a href="/organizations">Партньори</a></li>
                @if(!Auth::check())
                    <li class=""><a  href="{!! route('login') !!}">За организации</a></li>
                    @else
                 <li ><a  href="/dashboard"><span class="red"> Вашият профил </span></a> </li>
                  <li ><a  href="/logout"><span class="red" > <i class="fa fa-sign-out" aria-hidden="true"></i> </span></a> </li>
                 @endif

            </ul>

           <!-- <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li class="dropdown">
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Hello, {!! Auth::user()->name !!}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{!! route("posts.index") !!}">Posts</a></li>
                        <li><a href="{!! route('categories.index')!!}">Categories </a></li>
                         <li><a href="{!! route('tags.index')!!}">Tags </a></li>
                        <li role="separator" class="divider"></li>
                        <li><a >Logout</a></li>
                    </ul>
                </li>
                    @else
                    <a href="{!! route('login') !!}" class="btn btn-default">Log in</a>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div class="row">
         <div class="parallax">
    <img class="img-responsive" src="{{asset("/images/cover.png")}}"></div>
</div>