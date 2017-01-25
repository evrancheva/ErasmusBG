@extends('layouts.main')
@section('title','| Login')
@section('content')
<div class="container">
    <span class="titleOfarticle">Влезте в своят акаунт</span>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form2 margin-top-bottom">

            {!! Form::open() !!}
            {!! Form::label('email','Email:',array('class' => 'label')) !!}
            {!! Form::email('email',null,['class'=>'form-control margin-top-bottom']) !!}
            {!! Form::label('password','Password:',array('class' => 'label')) !!}
            {!! Form::password('password',['class'=>'form-control margin-top-bottom']) !!}

            {!! Form::checkbox('remember') !!}{!! Form::label('remember','Remember Me') !!}
            {!! Form::submit('Login',['class'=>'btn btn-primary btn-block']) !!}
             <a href="{!! route('register') !!}" class="btn-block btn btn-danger"> Register here </a>
            <p><a href="{!! url('password/reset') !!}">Forgot password </a></p>

            {!! Form::close() !!}
        </div>
        </div>
    </div>
</div>
</div>
@stop