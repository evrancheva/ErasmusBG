@extends('layouts.main')
@section('title','| Forgot My Password')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Reset Password
                </div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'password/reset','method'=>'POST']) !!}
                    {!! Form::hidden('token',$token)!!}
                    {!! Form::label('email','Email:') !!}
                    {!! Form::email('email',null,['class'=>'form-control']) !!}
                     {!! Form::label('password','New password:') !!}
                    {!! Form::password('password', ['class'=>'form-control'])!!}
                     {!! Form::label('password_confirmation','Confirm New Password') !!}
                    {!! Form::password('password_confirmation', ['class'=>'form-control'])!!}

                    {!! Form::submit('Reset Password',['class'=>'btn btn-primary btn-block']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop