@extends('layouts.admin')
@section('title' ,' | View user')
@section('content')
<div class="container">

    <div class="col-md-offset-3 col-md-6">
    <h3> Текущи роли на потребител:  {{ Auth::user()->name}} </h3>
   @foreach($roles as $role)
       <p> {{$role}} </p>
       
    @endforeach


        @if(!in_array('Admin',$roles))
             {!! Form::model($user, ['route' => ['admin.user.makeAdmin', $user->id], 'method' => 'POST', 'files' => true]) !!}
            {!! Form::submit('Направи Админ',array('class'=>'btn btn-circle btn-outline btn-block blue margin'))!!}
            {!!Form::close()!!}
        @else
            {!! Form::model($user, ['route' => ['admin.user.removeAdmin', $user->id], 'method' => 'POST', 'files' => true]) !!}
            {!! Form::submit('Махни ролята админ',array('class'=>'btn btn-circle btn-outline btn-block blue margin'))!!}
            {!!Form::close()!!}
         @endif
 
  
    <a href="{{route('admin.users')}}" class="margin btn btn-block btn-circle btn-outline red">Cancel </a>
    </div>
 </div>  
@endsection
