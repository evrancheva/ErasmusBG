@extends('layouts.admin')

@section('title', '| Edit user')

@section('stylesheets')
    {!! Html::style('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css') !!}
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
      {!! Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'PUT', 'files' => true]) !!} 
        <div class="col-md-8">
            {!! Form::label('confirmed', 'Confirm user:') !!}
            {!! Form::checkbox('confirmed', null, ["class" => 'form-control input-lg input-circle']) !!}


        {!! Form::close() !!}

    </div>  <!-- end of .row (form) -->
 </div>
</div>
@stop

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/ajax.js') !!}
    
    var token = '{!! Session::token()!!}';

    </script>

@endsection