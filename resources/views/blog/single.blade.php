@extends('layouts.main')
@section('title',"| $post->title")
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <span class="titleOfarticle">{!!$post->title!!}</span>
         <div class="row margin-top-bottom">
             <div class="col-md-5 ">
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
                           
                           <p > <strong> <p class="orange"> <i class="fa fa-check" aria-hidden="true"></i> Информация за проекта: <p>
                            </strong>  {!!$post->body!!}
                           </p>
                           <p >
                              
                              <p class="orange"><strong><i class="fa fa-check" aria-hidden="true"></i> 
                                 Начин на кандидатсване: </strong></p> {!!$post->way_of_applying!!} 
                           </p>
                           <p > <p class="orange"> <strong><i class="fa fa-check" aria-hidden="true"></i> Какво е покрито от проекта?:</strong> </p> {!!$post->fees!!} </p>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane" id="organization">
                      <div class="well well-lg well-orange ">
                          <img class=" main_image_trip inline" src="{!! asset('images/'. $post->user->logo)!!}">
                          <div class="inline">
                          <h2 >{!! $post->user->name !!} </h2>
                          <h2 class="">{!! $post->user->email !!} </h2>
                           <p> {!! $post->user->site !!}<p>
                                <p> {!! $post->user->address !!}<p>
                           <p> {!! $post->user->president !!}<p>
                          <p> {!! $post->user->description !!}<p>
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
@endsection