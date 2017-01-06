@extends('layouts.user')
@section ('title', "| $tag->naame Tag")
@section('content')
<div class="row">
	<div class="col-md-8">
	<h1>{!! $tag->name !!} Tag <small>{!!$tag->posts()->count() !!} Posts</small></h1>
	</div>
	<div class=" col-md-2">
		<a href="{!! route('tags.edit',$tag->id)!!}" class="btn btn-primary pull-right btn-block">Edit</a>
	</div>
	<div class="col-md-2">
		{!!Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE'])!!}
			{!!Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
		{!!Form::close()!!}
	</div>

</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Tags</th>
                                                
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tag->posts as $post)
                                                <tr>
                                                    <th>{{$post->id}}</th>
                                                    <td>{{$post->title}}</td>
                                                   <td>
                                                   	@foreach($post->tags as $tag)
                                                   			<span class="label label-default">{!! $tag->name !!}</span>
                                                   	@endforeach
                                                
                                                    <td>
                                                        <a href="{{route("posts.show",$post->id)}}" class="btn btn-circle btn-outline blue ">View</a>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
	</div></div>
@stop