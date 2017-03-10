@extends('layouts.admin')
@section('title' ,' | View user')
@section('content')
<div class="container">

    <div class="col-md-offset-3 col-md-6">
    <h3> Текущи роли на потребител:  {{ Auth::user()->name}} </h3>
   @foreach($roles as $role)
       <p> {{$role->name}} </p>
       @if(!($role->name == 'Admin'))
    {!! Form::model($user, ['route' => ['admin.user.makeAdmin', $user->id], 'method' => 'PUT', 'files' => true]) !!}
            {!! Form::submit('Направи Админ',array('class'=>'btn btn-circle btn-outline btn-block blue margin'))!!}
            {!!Form::close()!!}
          
        @endif
    @endforeach
    <a href="{{route('admin.users')}}" class="margin btn btn-block btn-circle btn-outline red">Cancel </a>
    </div>
 </div>  
@endsection
