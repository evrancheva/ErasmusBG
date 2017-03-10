@extends('layouts.user')
@section('title', '| Edit Blog Post')
@section('stylesheets')
{!! Html::style('css/select2.min.css') !!}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
   tinymce.init({
       selector: 'textarea',
       plugins: 'link code',
       menubar: false
   });
</script>
@endsection
@section('content')
<input class="id" type="hidden" value="{!!$post->id!!}">

<div class="row">
{!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
<div class="col-md-8">

   {!! Form::label('title','Тема на проекта* :') !!}
   {!! Form::text('title',null,array('class'=>'form-control input-circle','required'=>'','maxlength:256'))!!}
   {!! Form::label('theme','По коя програма е проекта? :') !!}
   {!! Form::text('theme',null,array('class'=>'form-control input-circle'))!!}
   {{ Form::label('country_id', "Страна, в която ще се проведе проекта::", ['class' => 'form-spacing-top']) }}
         {{ Form::select('country_id', $countries, null, ['class' => 'form-control input-circle']) }}
   {!! Form::label('location','Градът, в който ще се проведе проекта* :') !!}
   {!! Form::text('location',null,array('class'=>'form-control input-circle','required'=>'','maxlength:256'))!!}
   {!! Form::label('start_date','Начална дата* :') !!}
   {!! Form::text('start_date',null,array('class'=>'form-control input-circle start_date','required'=>'','maxlength:256'))!!}
   {!! Form::label('end_date','Крайна дата* :') !!}
   {!! Form::text('end_date',null,array('class'=>'form-control input-circle end_date','required'=>'','maxlength:256'))!!}
   {!! Form::label('body',"Информация за проекта* :") !!}
   {!! Form::textarea('body',null,array('class'=>'form-control input-circle')) !!}
   {!! Form::label('criteria',"Критерии за участие в проекта* :") !!}
   {!! Form::textarea('criteria',null,array('class'=>'form-control input-circle')) !!}
   {!! Form::label('fees',"Какво е покрито в проекта?* (пр. пътни разходи, ношувки...)  :") !!}
   {!! Form::textarea('fees',null,array('class'=>'form-control input-circle', 'placeholder' => 'Пътни разходки, храна, нощувки')) !!}
   {!! Form::label('way_of_applying','Начин на кандидатсване*:') !!}
   {!! Form::textarea('way_of_applying',null,array('class'=>'form-control input-circle'))!!}
   {!! Form::label('main_image',"Смени основната снимка :") !!}
   {!! Form::file('main_image') !!}
   {!! Form::label('featured_images',"Добави още снимки:") !!}
   {!! Form::file('featured_images[]', array('multiple'=>true)) !!}
<div class="row">
<div class="col-md-12">
   <div class="row">
      <div class="col-md-6">
         {!! Form::submit('Редактирай проекта',array('class'=>'btn btn-circle btn-outline btn-block blue margin'))!!}
      </div>
       <div class="col-md-6">
         {!! Html::linkRoute('admin.posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-circle btn-outline red btn-danger btn-block')) !!}
      </div>
   </div>
   </div>

  </div>
  
</div>
<div class="col-md-4">
<div class="well">
   <dl class="dl-horizontal">
      <dt>Created At:</dt>
      <dd>{!! date('M j, Y h:ia', strtotime($post->created_at)) !!}</dd>
   </dl>
   <dl class="dl-horizontal">
      <dt>Last Updated:</dt>
      <dd>{!! date('M j, Y h:ia', strtotime($post->updated_at)) !!}</dd>
   </dl>
   <hr>
  
</div>
 {!!Form::close()!!}
<div class="col-md-12">
   @if(!empty($post->image)) 
   <h1> Основна снимка </h1>
   <div class="col-md-6">
      <img  src="{{asset("/images/")}}/{!! $post->image !!}" style="width:250;height:250px;">
   </div>
   @endif
   @if(!$images->isEmpty())
   <div class="row">
      <div class="col-md-12">
         <h1>
         Други снимки 
         <h1>
         @foreach($images as $image)
         <div class="col-md-6 x">
            <a class='deleteImage ' id='{!! $image->id !!}' ><i class="fa fa-times" aria-hidden="true"></i></a>
            <img id='image{!! $image->id!!}' class='margin-top-bottom right' src="{{asset("/images/")}}/{!! $image->image_small !!}" style="width:250;height:250px;">
         </div>
         @endforeach
      </div>
      @endif
   </div>
   <!-- end of .row (form) -->
</div>
@stop
@section('scripts')
{!! Html::script('js/select2.min.js') !!}
{!! Html::script('js/ajax.js') !!}
<script type="text/javascript">
   $('.select2-multi').select2();
   $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
   $(document).ready(function(){
   var date_input=$('.start_date'); //our date input has the name "date"
   
   date_input.datepicker({
      dateFormat: 'yy-mm-dd',
      
   })
   })
   $(document).ready(function(){
   var date_input=$('.end_date'); //our date input has the name "date"
   date_input.datepicker({
        dateFormat: 'yy-mm-dd',
   })
   })
   var token = '{!! Session::token()!!}';
   
</script>
@endsection