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
                  <a href="{!! url('blog/'.$post->slug) !!}">
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
                             <img src="{{asset("/images/")}}/{!! $post->image !!}" class="mainImageCategory img-responsive">
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
              <a href="{!! url('blog/'.$post->slug) !!}">
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
                             <img src="{{asset("/images/")}}/{!! $post->image !!}" class="mainImageCategory img-responsive">
                        </div>
                </div>
                <div class="col-md-8">

                        <div class="title-product">
                            <strong>{!! $post->title !!}</strong>
                              <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> 
                                          {!! $post->location !!} 
                                        <i class="fa fa-university" aria-hidden="true"></i>
                                          {!! $post->user_id !!}
                                          <span class="red">
                                          <i class="fa fa-calendar" aria-hidden="true"></i> 
                                       {{date('d-m-Y',strtotime($post->start_date))}} до {{date('d-m-Y',strtotime($post->end_date))}}
                                      </span>
                                    </div>
                           
                        </div>
                        <br>
                        <div class="descr">
                            <div class="text">
                           {!! $post->body !!}
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
                    <div class="fb-page" data-href="https://www.facebook.com/Erasmusbgcom-325695476033/?fref=ts" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
                </div>
                <div class="banner-big"><a href="https://abv.bg/"><img src="{{asset("/images/300x600.jpg")}}" class=" img-responsive"></div>
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
                <div class="col-md-5">
                    <a href="{!! route('register') !!}">
                    <div class="register">
                        <a class="button-er" href="{!! route('register') !!}">
                            Регистрирай своята организация

                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                    </a>
                </div>
                 <div class="col-md-offset-2 col-md-5">
                    <a href="{!! route('login') !!}">
                        <div class="register2">
                      <a class="button-er" href="{!! route('login') !!}">
                            Влез в своя акаунт <i class="fa fa-sign-in" aria-hidden="true"></i>
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
         <div class="row">
                    <div class=" col-md-12">
                       
            <img src="{{asset("/images/thank.png")}}" class="img-responsive margin" >
                      
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
                    <div class="item">
                     <img src="{{asset("/images/")}}/{!! $user->logo !!}" class="img-responsive img-circle" style="width:50px; height:50px;">
                     <p>{!!$user->name!!}</p>
                   </div>
            @endforeach
                
                </div>
            </div>

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