@extends('layouts.admin')
@section('title' ,' | View user')
@section('content')
   
       	 	<div class="row">
            <div class="col-md-offset-3 col-md-6">
                    <div class="text-center">
            	<h1> {!!$user->name!!} </h1>

            	 <img src="{{asset("/images/")}}/{!! $user->logo !!}"  class="img-circle" style="width:250;height:250px;">
                 </div>
            	<div class="user-info">
            		<label class="label2" for="Site">Email: </label>
	            	<p > {!!$user->email!!} </p>	
	            	<label class="label2" for="Site">Site: </label>
	            	<p> {!!$user->site!!} </p>	
	            	<label class="label2" for="Site">Address: </label>
	            	<p> {!!$user->address!!} </p>	
	            	<label class="label2" for="Site">Phone: </label>
	            	<p> {!!$user->phone!!} </p>	
	            	<label class="label2" for="Site">Description: </label>
	            	<p> {!!$user->description!!} </p>
	            	<label class="label2" for="Site">Motivation: </label>
	            	<p> {!!$user->motivation!!}</p>	
	            	<div>
	          {!! Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'PUT', 'files' => true]) !!} 
		      		{!! Form::label('confirmed', 'Confirm user:') !!}
	 				{!! Form::checkbox('confirmed') !!}
	 				<div>
	 				{!! Form::submit('Save',array('class'=>'btn btn-circle btn-outline blue margin btn-block')) !!}
	 			</div>
        {!! Form::close() !!}

</div>
                      
                   
                        {!! Form::open(['route'=>['admin.user.delete',$user->id],'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete',array('class'=>'btn btn-circle btn-outline  red margin btn-block')) !!}
                        {!! Form::close() !!}
                
                   
                    <a href="{{route("admin.users")}}" class="btn btn-circle btn-outline dark margin btn-block" > << See all users</a>
                 	
	            	
            	</div>
            	</div>
            </div>
        </div>
        </div>
       
        </div>
    </div>
    
@endsection
