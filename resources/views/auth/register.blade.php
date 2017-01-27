@extends('layouts.main')
@section('title','| Register')
@section('content')
<div class="container">

    <div class="row">
    <div class="col-md-12">
    <span class="titleOfarticle">Кандидатсвай, за да станеш част от нас</span>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form2 margin">
           <span class="red"> Моля попълнете всички задължителни полета * </span>
            {!! Form::open(['files'=>true]) !!}
            {!! Form::label('name','Име на Вашата организация* :') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            
            {!! Form::label('email','Email на организацията (на него ще се пращат въпроси и кандидатури)* :') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
            {!! Form::label('password','Парола* :') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
            {!! Form::label('password_confirmation','Потвърди паролата* :') !!}
            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
            {!! Form::label('description','Описание на Вашата организация*:') !!}
            {!! Form::textarea('site',null,['class'=>'form-control','placeholder' => 'Основна информация, цели, мисия, визия, извършени дейности']) !!}
           {!! Form::label('president','Име на настоящия президент на Вашата организация :') !!}
            {!! Form::text('president',null,['class'=>'form-control']) !!}
             {!! Form::label('site','Сайт (в случай, че няма, Facebook страница)*:') !!}
             {!! Form::text('description',null,['class'=>'form-control']) !!}
              {!! Form::label('phone','Телефон за връзка*:') !!}

            {!! Form::text('phone',null,['class'=>'form-control']) !!}
              {!! Form::label('address','Адрес*:') !!}
            {!! Form::text('address',null,['class'=>'form-control']) !!}
              {!! Form::label('motivation','Мотивация за участие в платформата ErasmusBG.com* :') !!}
            {!! Form::textarea('motivation',null,['class'=>'form-control']) !!}
            {!! Form::label('logo','Logo of your organization* :') !!}
            {!! Form::file('logo') !!}
           
            {!! Form::submit('Register',['class'=>'btn btn-primary btn-block mrg']) !!}

            {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
    </div>
@stop