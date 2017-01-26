@extends('layouts.main')
@section('title','| Register')
@section('content')
<div class="container">

    <div class="row">
    <div class="col-md-12">
    <span class="titleOfarticle">Всички проекти</span>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form2 margin">
            Please fill in the required fields * 
            {!! Form::open() !!}
            {!! Form::label('name','Name* :') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            {!! Form::label('username','Username* :') !!}
            {!! Form::text('username',null,['class'=>'form-control']) !!}
            {!! Form::label('email','Email* :') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
            {!! Form::label('password','Password* :') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
            {!! Form::label('password_confirmation','Confirm password* :') !!}
            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
            {!! Form::label('description','Description for your organization:') !!}
            {!! Form::text('description',null,['class'=>'form-control']) !!}
             {!! Form::label('site','Site of your organization:') !!}
            {!! Form::text('site',null,['class'=>'form-control']) !!}
              {!! Form::label('phone','Phone:') !!}
            {!! Form::text('phone',null,['class'=>'form-control']) !!}
              {!! Form::label('address','Address of your organization:') !!}
            {!! Form::text('address',null,['class'=>'form-control']) !!}
              {!! Form::label('motivation','Motivation to participate* :') !!}
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