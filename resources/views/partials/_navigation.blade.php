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
                <li class="{{Request::is('/blog') ? "active": ""}}"><a href="/blog">Всички проекти</a></li>
                <li class="{{Request::is('/about') ? "active": ""}}"><a href="/about">За нас</a></li>
                
                <li class="{{Request::is('/partners') ? "active": ""}}"><a href="/partners">Партньори</a></li>
                <li class=""><a @if(!Auth::check()) href="{!! route('login') !!}" @else href="/dashboard" @endif>За организации</a></li>
                 

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
    <img class="img-responsive" src="{{asset("/images/hW9bY1478716337.jpg")}}">
</div>