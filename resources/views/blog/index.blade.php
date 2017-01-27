@extends('layouts.main')
@section('title','| Всички Еразъм проекти ')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<span class="titleOfarticle">Всички проекти</span>
<div class="row">
     <div class="col-md-8 trip margin">
   @foreach($posts as $post)
   
     
        <a href="{!! url('trips/'.$post->slug) !!}">
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
                     {!! $post->location !!}, {!! $post->country->name !!} 
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
           </a>
 
    
   @endforeach
     </div>
   <div class="col-md-4">
    <div class="fb2 margin-top-bottom">
                    <div class="fb-page" data-href="https://www.facebook.com/Erasmusbgcom-325695476033/?fref=ts" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
                </div>
                <div class="banner margin-top-bottom">
                        <img src="{{asset("/images/banner300.gif")}}" class=" img-responsive">
                </div>
                 <div class="banner margin-top-bottom">
                        <img src="{{asset("/images/banner300.gif")}}" class=" img-responsive">
                </div>

   </div>
</div>
   <div class="row">
      <div class="col-md-12">
         <div class="text-center">
            {!!  $posts->render()!!}
         </div>
      </div>
   </div>
</div>
@stop