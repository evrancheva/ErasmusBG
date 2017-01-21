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
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ["class" => 'form-control input-lg input-circle']) !!}

            {!! Form::label('location','Location:') !!}
        {!! Form::text('location',null,array('class'=>'form-control  input-lg input-circle','required'=>'','maxlength:256'))!!}
         {!! Form::label('start_date','Start date:') !!}
        {!! Form::text('start_date',null,array('class'=>'form-control input-lg input-circle start_date','required'=>'','maxlength:256'))!!}
         {!! Form::label('end_date','End date:') !!}
        {!! Form::text('end_date',null,array('class'=>'form-control input-lg input-circle end_date','id' => 'datetimepicker5','required'=>'','maxlength:256'))!!}
         {!! Form::label('organization_email','Email to recieve applications') !!}
        {!! Form::text('organization_email',null,array('class'=>'form-control input-lg input-circle','required'=>'','maxlength:256'))!!}
          {!! Form::label('additional_link','Additional link:') !!}
        {!! Form::text('additional_link',null,array('class'=>'form-control input-lg input-circle','required'=>'','maxlength:256'))!!}
{!! Form::label('main_image',"Replace main image :") !!}
           {!! Form::file('main_image') !!}
  {!! Form::label('featured_images',"Upload More Images:") !!}
       {!! Form::file('featured_images[]', array('multiple'=>true)) !!}


         {!! Form::label('upload_file',"Replace PDF:") !!}
        {!! Form::file('upload_file') !!}

            {!! Form::label('body', "Body:", ['class' => 'form-spacing-top']) !!}
            {!! Form::textarea('body', null, ['class' => 'form-control input-circle']) !!}
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
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) !!}
                    </div>
                </div>

            </div>

        {!! Form::close() !!}
        @if(!empty($post->image)) 
<h1> Current main image </h1>
         <img  src="{{asset("/images/")}}/{!! $post->image !!}" style="width:250;height:250px;">
@endif
        @if(!empty($post->pdf))
        
        <div id="pdf{!! $post->id !!}">
           <h1> Current Pdf file </h1>
          <div>
              <button class='deletePdf' id='{!! $post->id !!}' class="fa fa-times"><i class="fa fa-times" aria-hidden="true"></i></button>
                <a href="{{asset("/pdf/")}}/{!! $post->pdf !!}" download> {!! $post->title !!} - pdf file </a>
               
            </div>   
        </div>
            @endif

        @if(!$images->isEmpty())
            <h1> Current Images </h1>
            <div class="row">
             <div class="col-md-12">

            @foreach($images as $image)
            <div class="col-md-4 ">
                <button class='deleteImage ' id='{!! $image->id !!}' class="fa fa-times"><i class="fa fa-times" aria-hidden="true"></i></button>
                <img id='image{!! $image->id!!}' class='' src="{{asset("/images/")}}/{!! $image->image_small !!}" style="width:250;height:250px;">
                 </div>
            @endforeach
        </div>
           
        @endif
    </div>  <!-- end of .row (form) -->
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