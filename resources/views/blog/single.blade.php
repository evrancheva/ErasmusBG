@extends('layouts.main')
@section('title',"| $post->title")
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <span class="titleOfarticle">{!!$post->title!!}</span>
         <div class="row margin-top-bottom">
            <div class="col-md-5 ">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
               @if(!empty($post->image))
               <img class="mainImageCategory main_image_trip" src="{!! asset('images/'. $post->image)!!}">
               @endif
               <div id="owl" class="margin-top-bottom">
                  @if(!$post->images->isEmpty())
                  <div class="item">
                     <img style="width:137px;"class="mainImageCategory main_image_trip" src="{!! asset('images/'. $post->image)!!}">
                  </div>
                  @endif
                  @foreach ($post->images as $image)
                  <div class="item">
                     <img src="{{asset("/images/")}}/{!! $image->image_small !!}" class="mainImageCategory img-responsive"
                     onclick="ChangePicture('{{asset("/images/")}}/{!! $image->image_small !!}')">
                  </div>
                  @endforeach
               </div>
            </div>
            <div class="col-md-7">
               <div class="wow">
                  <div class="main-info ">
                     <h2><i class="fa fa-certificate orange" aria-hidden="true"></i> Teма на проекта: {!!$post->title!!}</h2>
                     <hr>
                     <p ><i class="fa fa-calendar orange" aria-hidden="true"></i>  Дати на проекта: 
                        {{date('d-m-Y',strtotime($post->start_date))}} до {{date('d-m-Y',strtotime($post->end_date))}}
                     </p>
                     <p ><i class="fa fa-map-marker orange" aria-hidden="true"></i>  Локация: {!!$post->location!!}
                     </p>
                     <p ><i class="fa fa-university orange" aria-hidden="true"></i>  Организация: 
                        {!!$post->user->name!!}
                     </p>
                     @if($post->theme != '')
                     <p ><i class="fa fa-map-marker orange" aria-hidden="true"></i>  Проекта е по програма: {!!$post->theme!!}
                     </p>
                     @endif
                     <hr>
                     <p  ><i class="fa fa-female orange" aria-hidden="true"></i><i class="fa fa-male orange" aria-hidden="true"></i>  Критерии за участие:  {!!$post->criteria!!}
                     </p>
                     <hr>
                     <p><i class="fa  fa-share orange" aria-hidden="true"> </i> Сподели с приятели:
                     <div class="social">
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                           <a class="addthis_button_preferred_1"></a>
                           <a class="addthis_button_preferred_2"></a>
                           <a class="addthis_button_preferred_3"></a>
                           <a class="addthis_button_preferred_4"></a>
                           <a class="addthis_button_compact"></a>
                           <a class="addthis_counter addthis_bubble_style"></a>
                        </div>
                        <script type="text/javascript">{literal}var addthis_config = {"data_track_addressbar":true};{/literal}</script>
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-537cf4bd1ff9dd3c"></script>
                        <!-- AddThis Button END -->
                     </div>
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div >
                  <!-- Nav tabs -->
                  <div class="text-center">
                     <ul class="nav  tbs" role="tablist">
                        <li role="presentation" class="active"><a href="#main-info" aria-controls="home" role="tab" data-toggle="tab">Основна информация</a></li>
                        <li role="presentation" ><a href="#organization" aria-controls="messages" role="tab" data-toggle="tab">Информация за организацията</a></li>
                     </ul>
                  </div>
                  <!-- Tab panes -->
                  <div class="tab-content margin-top-bottom">
                     <div role="tabpanel" class="tab-pane active" id="main-info">
                        <div class="well well-lg well-orange">
                           <p >
                              <strong>
                           <p class="orange"> <i class="fa fa-check" aria-hidden="true"></i> Информация за проекта: <p>
                           </strong>  {!!$post->body!!}
                           </p>
                           <p >
                           <p class="orange"><strong><i class="fa fa-check" aria-hidden="true"></i> 
                              Начин на кандидатсване: </strong>
                           </p>
                           {!!$post->way_of_applying!!} 
                           </p>
                           <p > 
                           <p class="orange"> <strong><i class="fa fa-check" aria-hidden="true"></i> Какво е покрито от проекта?:</strong> </p>
                           {!!$post->fees!!} </p>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane" id="organization">
                        <div class="well well-lg well-orange ">
                           
                           <div class="text-center">
                            <img class="logo-org " src="{!! asset('images/'. $post->user->logo)!!}">
                              <input type="hidden" id="user_id" value="{!! $post->user->id !!}">
                               <h2 >{!! $post->user->name !!} </h2>
                               <div id="vote">Оцени организацията!</div>
                           <div id="rateYo" class="move"></div>
                           <div id="thankyou" style="display:none;"> Благодарим за гласа! </div>
                             <h4 class=""><i class="fa fa-envelope-o orange" aria-hidden="true"></i>  Email: {!! $post->user->email !!} </h4>
                               <p> <i class="fa fa-globe orange" aria-hidden="true"></i> Сайт/ Facebook page:  {!! $post->user->site !!}
                               </p>
                               <p> <i class="fa fa-map-marker orange" aria-hidden="true"></i>  Адрес: {!! $post->user->address !!}
                               </p>
                               <p> <i class="fa fa-mobile orange" aria-hidden="true"></i> Телефон: {!! $post->user->phone !!}
                               </p>
                               
                           </div>
                           <div class="normal-org">
                                  <p> <i class="fa fa-info-circle orange" aria-hidden="true"></i> Основна информация за организацията: {!! $post->user->description !!}
                               </p>
                               @if(!empty($post->user->additional_information)) <p><i class="fa fa-info-circle orange" aria-hidden="true"></i> Допълнителна информация: {!! $post->user->additional_information !!}
                               </p>
                               @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <span class="titleOfarticle">Коментари</span>
         <div id="fb-root"></div>
         <div class="fb-comments"  data-width="100%" data-numposts="5"></div>
      </div>
   </div>
</div>
@stop
@section('scripts')
{!! Html::script('js/owl.carousel.js') !!}
{!! Html::script('js/owl.carousel.min.js') !!}
{!! Html::script('js/scripts.js') !!}
{!! Html::script('js/custom.js') !!}
{!! Html::script('js/ajax.js') !!}
<script>
 var token = '{!! Session::token()!!}';
</script>
@endsection