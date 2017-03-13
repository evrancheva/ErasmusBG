@extends('layouts/main')
@section('title','| Homepage')
@section('stylesheets')
@endsection
@section('content')
<div class="container">
   <span class="titleOfarticle">ТОП ЕРАЗЪМ ПРОЕКТИ</span>
   <div class="row">
      <div class="col-md-12">
         <div id="owl-demo">
            @foreach($posts as $post)
            <a href="{!! url('trips/'.$post->slug) !!}">
               <div class="item">
                  <div class="category" >
                     <div class="cover" style="dislay:none">
                        <div class="titleOfCategory">
                           <i class="fa fa-plane plane" aria-hidden="true"></i>
                           <div>{!! $post->title !!}</div>
                           <span class="small red">
                           <i class="fa fa-calendar" aria-hidden="true"></i> 
                           {{date('d-m-Y',strtotime($post->start_date))}} до {{date('d-m-Y',strtotime($post->end_date))}}
                           </span>
                        </div>
                     </div>
                     <img src="{{asset("/images/")}}/{!! $post->image !!}" alt='erasmus-project-{!! cyr2url($post->title) !!}'class="mainImageCategory img-responsive">
                  </div>
               </div>
            </a>
            <!-- -->
            @endforeach
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="row">
      <div class="col-md-8">
         <span class="titleOfarticle">Последно добавени</span>
         @foreach($posts as $post)
         <a href="{!! url('trips/'.$post->slug) !!}">
            <div class="row margin ">
               <div class="col-md-12 trip">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="category2">
                           <div class="cover2" style="dislay:none">
                              <div class="titleOfCategory2">
                                 <i class="fa fa-plane plane2" aria-hidden="true"></i>
                                 <div>{!! $post->title !!}</div>
                              </div>
                           </div>
                           <img src="{{asset("/images/")}}/{!! $post->image !!}" alt='erasmus-project-{!! cyr2url($post->title) !!}' class="mainImageCategory img-responsive">
                        </div>
                     </div>
                     <div class="col-md-8">
                        <div class="title-product">
                           <strong>{!! $post->title !!}</strong>
                           <div class="info">
                              <i class="fa fa-map-marker" aria-hidden="true"></i> 
                              {!! $post->location !!}, {!! $post->country->name!!}
                              <i class="fa fa-university" aria-hidden="true"></i>
                              {!! $post->user->name !!}
                              <span class="red">
                              <i class="fa fa-calendar" aria-hidden="true"></i> 
                              {{date('d-m-Y',strtotime($post->start_date))}} до {{date('d-m-Y',strtotime($post->end_date))}}
                              </span>
                           </div>
                        </div>
                        <br>
                        <div class="descr">
                           <div class="text">
                              {!! substr($post->body, 0, 700) !!}{!! strlen($post->body) > 700 ? '...' : "" !!}
                           </div>
                           <div class="line"></div>
                           <span class="read-more"> Read more </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </a>
         @endforeach
      </div>
      <div class="row">
         <div class="col-md-4 col-xs-12">
            <div class="fb">
               <div class="fb-page" data-href="https://www.facebook.com/Erasmusbgcom-325695476033/?fref=ts" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                  <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
               </div>
            </div>
            @if(!empty($banner[0]))
            <div class="banner-big"><a @if(!empty($banner[0]->link)) href="{!!$banner[0]->link!!}" @endif><img alt='banner' src="{{asset("/images")}}/{!! $banner[0]->image!!}" class=" img-responsive"></a></div>
            @endif
         </div>
      </div>
   </div>
</div>
</div>
@if(!Auth::check())
<div class="container">
   <span class="titleOfarticle">Бъди част от нас</span>
   <div class="row">
      <div class="col-md-12">
         <div class="form">
            <div class="row">
               <div class="col-md-4 col-md-offset-1 col-xs-12">
                  <a href="{!! route('register') !!}">
                  <a class="" href="{!! route('register') !!}">
                     <div class="register">
                        <div class="layer">
                  <a class="" href="{!! route('register') !!}" style="font-size:33px;top: 103px;">
                  Кандидатсвай със своята организация, за да станеш част от нас.
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                  </a>
                  </div>
                  </a>
                  </div>
               </div>
               <div class="col-md-offset-1 col-md-4 col-xs-12">
                  <a href="{!! route('register') !!}">
                  <a class="" href="{!! route('login') !!}">
                     <div class="register">
                        <div class="layer2">
                  <a class="" href="{!! route('login') !!}">
                  Влез в своя акаунт.
                  <i class="fa fa-sign-in" aria-hidden="true"></i>
                  </a>
                  </div>
                  </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @else
   <div class="container">
   <span class="titleOfarticle"></span>
   
      <div class="col-md-12">
         <div class="form">
            <div class="col-md-offset-4 col-md-12 col-xs-12">
                  
                  <a class="" href="\dashboard">
                     <div class="register">
                        <div class="layer2">
                                       
                              Вашият профил
                              <br>
                  <i class="fa fa-user" aria-hidden="true"></i>
                  </a>
                  </div> 
              
         </div>
      </div>
   </div>
 
   @endif
   <div class="container">
      <span class="titleOfarticle">Организации</span>
      <div class="row">
         <div class="col-md-12">
            <div class="col-md-offset-2"
            <div id="owl-demo3">
               @foreach($users as $user)
               <a href="{!! $user->site !!}" target="_blank">
               <div class="item">
                  <img src="{{asset("/images/")}}/{!! $user->logo !!}" class="img-responsive " style="width:50px; height:50px;">
                  <p>{!!$user->name!!}</p>
               </div>
               </a>
               @endforeach
            </div>
         </div>
         @if(!empty($wideBanner[0]))
         <div class="col-md-offset-2 col-md-8 banner-large hidden-xs hidden-sm">
            <a @if(!empty($wideBanner[0]->link )) href="{!!$wideBanner[0]->link !!}"  @endif>  
            <img src="{{asset("/images/")}}/{!! $wideBanner[0]->image!!}" class="img-responsive " >
            </a>
         </div>
         @endif
      </div>
   </div>
</div>
@endsection
@section('scripts')
{!! Html::script('js/owl.carousel.js') !!}
{!! Html::script('js/owl.carousel.min.js') !!}
{!! Html::script('js/parallax.js') !!}
{!! Html::script('js/parallax.min.js') !!}
{!! Html::script('js/scripts.js') !!}
{!! Html::script('js/custom.js') !!}
@endsection