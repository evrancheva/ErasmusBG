@extends('layouts.user')
@section('title','| Create New Post')

@section('stylesheets')
{!! Html::style('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css') !!}
    {!! Html::style('css/parsley.css') !!}
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
<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <h2>Добави нов проект</h2>
        <h4>Моля попълнете задължителните полета*</h4>
        <hr>
        {!! Form::open(['route' => 'posts.store','files'=>true]) !!}
        {!! Form::label('title','Тема на проекта* :') !!}
        {!! Form::text('title',null,array('class'=>'form-control input-circle'))!!}
        {!! Form::label('theme','По коя програма е проекта? :') !!}
        {!! Form::text('theme',null,array('class'=>'form-control input-circle'))!!}
        {{ Form::label('country_id', 'Страна, в която ще се проведе проекта:') }}
        <select class="form-control input-circle" name="country_id">
          @foreach($countries as $country)
            <option value='{{ $country->id }}'>{{ $country->name }}</option>
          @endforeach

        </select>
         {!! Form::label('location','Градът, в който ще се проведе проекта* :') !!}
        {!! Form::text('location',null,array('class'=>'form-control input-circle'))!!}
         {!! Form::label('start_date','Начална дата* :') !!}
        {!! Form::text('start_date',null,array('class'=>'form-control input-circle start_date'))!!}
         {!! Form::label('end_date','Крайна дата* :') !!}
        {!! Form::text('end_date',null,array('class'=>'form-control input-circle end_date'))!!}
         {!! Form::label('body',"Информация за проекта* :") !!}
          {!! Form::textarea('body',null,array('class'=>'form-control input-circle')) !!}
             {!! Form::label('criteria',"Критерии за участие в проекта* :") !!}
            {!! Form::textarea('criteria',null,array('class'=>'form-control input-circle')) !!}
               {!! Form::label('fees',"Какво е покрито в проекта?* (пр. пътни разходи, ношувки...)  :") !!}
            {!! Form::textarea('fees',null,array('class'=>'form-control input-circle', 'placeholder' => 'Пътни разходки, храна, нощувки')) !!}
        
          {!! Form::label('way_of_applying','Начин на кандидатсване*:') !!}
        {!! Form::textarea('way_of_applying',null,array('class'=>'form-control input-circle'))!!}
   
       {!! Form::label('main_image',"Основна снимка на проекта* :") !!}
           {!! Form::file('main_image') !!}
        {!! Form::label('featured_images',"Допълнителни снимки на проекта (може да изберете повече от 1)* :") !!}
       {!! Form::file('featured_images[]', array('multiple'=>true)) !!}
      
        
        {!! Form::submit('Добави проекта',array('class'=>'btn btn-circle btn-outline btn-block blue margin'))!!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
    <script>
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
    </script>

@endsection
