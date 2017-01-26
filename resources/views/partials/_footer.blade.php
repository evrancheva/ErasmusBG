<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="footer">
				<div class="col-md-offset-1 col-md-1">
 					 <a href="{!! route('index')!!}"> <img src="{{asset("/images/logoto.png")}}" class="img-responsive logo"></a>
				</div>
				<div class=" col-md-8">
				<ul class="bottom-nav">
				  <li class="{{Request::is('/') ? "active": ""}}"><a href="/">Начало</a></li>
                <li class="{{Request::is('/blog') ? "active": ""}}"><a href="/blog">Всички пътешествия</a></li>
                <li class="{{Request::is('/about') ? "active": ""}}"><a href="/about">За нас</a></li>
              	<li class="{{Request::is('/partners') ? "active": ""}}"><a href="/partners">Партньори</a></li>
                <li class=""><a @if(!Auth::check()) href="{!! route('login') !!}" @else href="/dashboard" @endif>За организации</a></li>
  				<li class="{{Request::is('/terms') ? "active": ""}}"><a href="/contact">Общи условия</a></li>
			</ul>
			</div></div>
			<div class="white">
			</div>
			<div class="footer2">
				<p class="text-center "><strong>Copyright Elsi - All rights reserved</strong></p>
			</div>
		</div>
	</div>

</div>
