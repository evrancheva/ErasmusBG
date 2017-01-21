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
        <h2>Create New Post</h2>
        <h4>Please fill in the required fields</h4>
        <hr>
        {!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'','files'=>true]) !!}
        {!! Form::label('title','Title* :') !!}
        {!! Form::text('title',null,array('class'=>'form-control input-circle','required'=>'','maxlength:256'))!!}
         {!! Form::label('location','Location* :') !!}
        {!! Form::text('location',null,array('class'=>'form-control input-circle','required'=>'','maxlength:256'))!!}
         {!! Form::label('start_date','Start date* :') !!}
        {!! Form::text('start_date',null,array('class'=>'form-control input-circle start_date','required'=>'','maxlength:256'))!!}
         {!! Form::label('end_date','End date* :') !!}
        {!! Form::text('end_date',null,array('class'=>'form-control input-circle end_date','required'=>'','maxlength:256'))!!}
         {!! Form::label('organization_email','Email to recieve applications* :') !!}
        {!! Form::text('organization_email',null,array('class'=>'form-control input-circle','required'=>'','maxlength:256'))!!}
          {!! Form::label('additional_link','Additional link:') !!}
        {!! Form::text('additional_link',null,array('class'=>'form-control input-circle','required'=>'','maxlength:256'))!!}
       <!--- {!! Form::label('slug','Slug:') !!}
         {!! Form::text('slug',null,array('class'=>'form-control input-circle','required'=>'','maxlength:256'))!!}
        {!! Form::label('tags','Tags:')!!}
        <select class="form-control select2-multi input-circle" name="tags[]" multiple="multiple">
@foreach($tags as $tag)
        <option value='{!! $tag->id!!}'>{!!$tag->name!!}</option>
    @endforeach
</select>
       
        {!! Form::label('category','Category')!!}
 <select class="form-control input-circle" name="category_id">
    @foreach($categories as $category)
        <option value='{!! $category->id!!}'>{!!$category->name!!}</option>
    @endforeach
</select> -->
       {!! Form::label('main_image',"Upload main image* :") !!}
           {!! Form::file('main_image') !!}
        {!! Form::label('featured_images',"Upload Featured Images* :") !!}
       {!! Form::file('featured_images[]', array('multiple'=>true)) !!}
         {!! Form::label('upload_file',"Upload PDF:") !!}
        {!! Form::file('upload_file') !!}
        {!! Form::label('body',"Post Body* :") !!}
        {!! Form::textarea('body',null,array('class'=>'form-control input-circle')) !!}
        {!! Form::submit('Create Post',array('class'=>'btn btn-circle btn-outline btn-block blue margin'))!!}
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
