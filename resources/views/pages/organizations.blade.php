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
                        <div class="text-center">
                           <img src="{{asset("/images/")}}/{!! $organization->logo !!}" class="logo-org img-responsive">  
                        </div>
                     </div>
                     <div class="col-md-7  col-xs-7">
                        <div class="text-center ">
                           <p class="info-org-big title-org">  {!!$organization->name!!}</p>

                           <div class="rating text-center">
                              @for ($i = 1; $i <= round($organization->votes->avg('vote')); $i++)
                              <i class="fa fa-star yellow" aria-hidden="true"></i>
                              @endfor
                              @for ($i = 5 - round($organization->votes->avg('vote')) ; $i >=1 ; $i--)  
                              <i class="fa fa-star-o yellow" aria-hidden="true"></i>
                              @endfor
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
                           <button type="button" class="read-more2 " data-toggle="modal" onclick="Rate({!! $organization->id !!})" data-target="#myModal{!!$organization->id!!}">
                           Прочети още
                           </button>
                           <div class="modal fade" id="myModal{!!$organization->id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       <h1 class="modal-title text-center org2" id="myModalLabel">    
                                       {!!$organization->name!!}  
                                       </h1>
                                        <div class="text-center">
                                          <p class="thanks" id="vote{!!$organization->id!!}"> Оцени организацията!</p>
                                          <p class="thanks" id="thankyou{!!$organization->id!!}" style="display: none;"> Благодарим за гласа!</p>
                                          <div class=" move2" id="rateYo{!!$organization->id!!}"></div>
                                           
                                       </div>
                                    </div>
                                    <div class="modal-body">
                                       <div class="text-center">
                                          <img src="{{asset("/images/")}}/{!! $organization->logo !!}" class="logo-org2 img-responsive">  
                                       </div>
                                       <h3><i class="fa fa-info-circle orange" aria-hidden="true"></i> Основна информация за организацията: </h3>
                                       {!!$organization->description!!}
                                       @if(!empty($organization->additional_information)) 
                                       <h3><i class="fa fa-info-circle orange" aria-hidden="true"></i> Допълнителна информация за организацията: </h3>
                                       {!!$organization->additional_information!!}
                                       <div id="fb-root"></div>
                                       <div class="fb-comments"  data-width="100%" data-numposts="5"></div>
                                       @endif
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-default" data-dismiss="modal">Затвори</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
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
@section('scripts')

{!! Html::script('js/ajax.js') !!}

<script>
 var token = '{!! Session::token()!!}';
</script>
@stop