@extends('layouts.admin')
@section('title', '| Edit Blog User')
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
<input class="id" type="hidden" value="{!!$user->id!!}">

<div class="row">
{!! Form::model($user, ['route' => ['admin.user.updateUser', $user->id], 'method' => 'PUT', 'files' => true]) !!}
<div class="col-md-8">
    <h3>Информация</h3>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   {!! Form::label('name','Име на организация* :') !!}
   {!! Form::text('name',null,array('class'=>'form-control input-circle','required'=>'','maxlength:256'))!!}
   {!! Form::label('email','Email на организацията :') !!}
   {!! Form::text('email',null,array('class'=>'form-control input-circle'))!!}
    {!! Form::label('president','Президент на организацията :') !!}
   {!! Form::text('president',null,array('class'=>'form-control input-circle'))!!}
       {!! Form::label('site','Сайт/ФБ page на организацията :') !!}
   {!! Form::text('site',null,array('class'=>'form-control input-circle'))!!}
   
       {!! Form::label('address','Адрес на организацията :') !!}
        {!! Form::text('address',null,array('class'=>'form-control input-circle'))!!}
             {!! Form::label('phone','Телефон на организацията :') !!}
        {!! Form::text('phone',null,array('class'=>'form-control input-circle'))!!}

  
   {!! Form::label('description','Описание на организацията:') !!}
   {!! Form::textarea('description',null,array('class'=>'form-control input-circle'))!!}

   {!! Form::label('additional_information','Допълнителна информация организацията:') !!}
   {!! Form::textarea('additional_information',null,array('class'=>'form-control input-circle'))!!}
   {!! Form::label('logo',"Смени лого :") !!}
   {!! Form::file('logo') !!}

<div class="row">
<div class="col-md-12">
   <div class="row">
      <div class="col-md-6">
         {!! Form::submit('Редактирай потребителя',array('class'=>'btn btn-circle btn-outline btn-block blue margin'))!!}
      </div>
       <div class="col-md-6">
          <a href="{{route('admin.users')}}" class="btn btn-circle btn-outline red btn-danger btn-block" > Cancel</a>
        
      </div>
   </div>
   </div>

  </div>
  
</div>
<div class="col-md-4">
    <h3>Лого</h3>
       <img  src="{{asset("/images/")}}/{!! $user->logo !!}" >
</div>
   <!-- end of .row (form) -->
</div>
@stop
@section('scripts')
{!! Html::script('js/select2.min.js') !!}
{!! Html::script('js/ajax.js') !!}
<script type="text/javascript">
  
   var token = '{!! Session::token()!!}';
   
</script>
@endsection