@extends('layouts.admin')
@section('title' ,' | View Post')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{!!$post->title!!}</h1>
            <p class="lead">{!! $post->body !!}</p>
            <hr>
       
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label> URL: </label>
                    <p><a href="{!! route('blog.single',$post->slug) !!}">{{url('blog/'.$post->slug)}}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label> Location: </label>
                    <p>{!! $post->location !!}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label> Start date: </label>
                    <p>{!! $post->start_date !!}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label> End date: </label>
                    <p>{!! $post->end_date !!}</p>
                </dl>
                 <dl class="dl-horizontal">
                    <label> The email in which you will receive applications: </label>
                    <p>{!! $post->organization_email !!}</p>
                </dl>
                 <dl class="dl-horizontal">
                    <label> Additional link: </label>
                    <p>{!! $post->additional_link !!}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label> Created At: </label>
                    <p>{{date('M j, Y H:i',strtotime($post->created_at))}}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label> Last Updated: </label>
                    <p>{{date('M j, Y H:i',strtotime($post->updated_at))}}</p>
                </dl>

                        <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('admin.posts.edit','Edit',array($post->id),array('class'=>'btn btn-circle btn-outline btn-block blue')) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::open(['route'=>['posts.destroy',$post->id],'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete',array('class'=>'btn btn-circle btn-outline btn-block red ')) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-12">
                    <a href="{{route("admin.posts")}}" class="btn btn-circle btn-outline btn-block dark margin" > << See all posts</a>
                    </div>
                   </div>
            </div>
        </div>
        @if(!empty($post->pdf))
        <div class="col-md-12">
            <h1 class="title">PDF file</h1>
            <a href="{{asset("/pdf/")}}/{!! $post->pdf !!}" download> {!! $post->title !!} - pdf file </a>
               
        </div>
        @endif
            @if(!$images->isEmpty())
        <div class="col-md-12">
            <h1 class="title">Photos</h1>
        @foreach($images as $image)
        <img src="{{asset("/images/")}}/{!! $image->image_small !!}" style="width:250;height:250px;">
                @endforeach

        </div>
        @endif
    </div>
    
@endsection
