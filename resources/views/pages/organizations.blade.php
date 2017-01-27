@extends('layouts.main')
@section('title','| Партньори на ErasmusBG.com ')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <span class="titleOfarticle">Партньори</span>
         @if(!Auth::check())
         <div class="row">
             <div class="col-md-10 col-md-offset-1 col-xs-12">
                 
                  <a class="btn  btn-block apply" href="{!! route('register') !!}">
                    Кандидатсвай със своята организация, за да станеш част от нас.
                  </a>
               
                  </div>
             
            </div>
            @endif
          <div class="row">
           
              
               @foreach($organizations as $organization)
                <div class="col-md-6 trip margin col-xs-12 ">
                  <div class="org">
               <div class="row">
              
               <div class="col-md-5 col-xs-5 right-border">
                
                <a href="/organization/{!!cyr2url($organization->name)!!}">
                  <div class="text-center">
                   <img src="{{asset("/images/")}}/{!! $organization->logo !!}" class="logo-org img-responsive">  
                 </div>
                  
                 </a>
                
               </div>
               <div class="col-md-7  col-xs-7">
                <div class="text-center ">
                 <p class="info-org-big title-org">  {!!$organization->name!!}</p>
                 <div class="rating text-center">
                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                    <i class="fa fa-star-o yellow" aria-hidden="true"></i>
                    <i class="fa fa-star-o yellow" aria-hidden="true"></i>
                  </div>

                
                </div>

               <p  class="info-org"><i class="fa fa-map-marker orange" aria-hidden="true"></i>  Aдрес: {!!$organization->address!!}
                <br>
                <i class="fa fa-globe orange" aria-hidden="true"></i>  Сайт/FB page: <a href="{!!$organization->site!!}"> {!!$organization->site!!}</a>
                <br>
                <i class="fa fa-envelope-o orange" aria-hidden="true"></i>  Email: {!!$organization->email!!}
                <br>
                 <i class="fa fa-mobile orange" aria-hidden="true"></i>  Телефон: {!!$organization->phone!!}
                
                
                </p>
                <div class=" read-more-org">
                         <a class="read-more2" href="#">Прочети още </a>
                </div>
             
               </div>
               </div>
             </div> 
           </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
@stop