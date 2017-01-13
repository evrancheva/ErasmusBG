@extends('layouts.admin')
@section('title' ,' | View user')
@section('content')
    <div class="row">
       	 <div class="text-center">
       	 	<div class="row">
            <div class="col-md-12">
            	<h1> {!!$user->name!!} </h1>	
            	 <img src="{{asset("/images/")}}/{!! $user->logo !!}"  class="img-circle" style="width:250;height:250px;">
            	<div class="user-info">
            		<label for="Site">Email: </label>
	            	<p> {!!$user->email!!} </p>	
	            	<label for="Site">Site: </label>
	            	<p> {!!$user->site!!} </p>	
	            	<label for="Site">Address: </label>
	            	<p> {!!$user->address!!} </p>	
	            	<label for="Site">Phone: </label>
	            	<p> {!!$user->phone!!} </p>	
	            	<label for="Site">Description: </label>
	            	<p> {!!$user->description!!} </p>
	            	<label for="Site">Motivation: </label>
	            	<p> {!!$user->motivation!!}</p>	
	            	<div>
	          {!! Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'PUT', 'files' => true]) !!} 
		      		{!! Form::label('confirmed', 'Confirm user:') !!}
	 				{!! Form::checkbox('confirmed') !!}
	 				<div>
	 				{!! Form::submit('Save',array('class'=>'btn btn-circle btn-outline blue margin')) !!}
	 			</div>
        {!! Form::close() !!}

</div>
                      
                   
                        {!! Form::open(['route'=>['admin.user.delete',$user->id],'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete',array('class'=>'btn btn-circle btn-outline  red margin')) !!}
                        {!! Form::close() !!}
                
                   
                    <a href="{{route("admin.users")}}" class="btn btn-circle btn-outline dark margin" > << See all users</a>
                 	
	            	
            	</div>
            	</div>
            </div>
        </div>
        </div>
       
        </div>
    </div>
    
@endsection
