@extends('layouts.user')
@section('title' ,' | View Post')
@section('content')
<div class="row">
   <div class="col-md-8 col-xs-12">
      <h1>{!!$post->title!!}</h1>
      <p class="lead">{!! $post->body !!}</p>
      <hr>
      <h1>Критерии за участие</h1>
      <p class="lead">{!! $post->criteria !!}</p>
      <hr>
       <h1>Разходи, които проекта покрива</h1>
      <p class="lead">{!! $post->fees !!}</p>
      <hr>
       <h1>Начин на кандидатсване</h1>
      <p class="lead">{!! $post->way_of_applying !!}</p>
      <hr>
      <hr>
   </div>
   <div class="col-md-4 col-xs-12">
      <div class="well">

         <h2> Допълнителна информация </h2>
         <dl class="dl-horizontal">
            <label> URL: </label>
            <p><a href="{!! route('blog.single',$post->slug) !!}">{{url('trips/'.$post->slug)}}</a></p>
         </dl>
         <dl class="dl-horizontal">
            <label> Локация: </label>
            <p>{!! $post->location !!}, {!! $post->country->name !!}</p>
         </dl>
         <dl class="dl-horizontal">
            <label> Начална дата: </label>
            <p>{!! $post->start_date !!}</p>
         </dl>
         <dl class="dl-horizontal">
            <label> Крайна дата: </label>
            <p>{!! $post->end_date !!}</p>
         </dl>
        <dl class="dl-horizontal">
            <label> Проекта е по програма:  </label>
            <p>{!! $post->theme !!}</p>
         </dl>
         <dl class="dl-horizontal">
            <label> Добавено на: </label>
            <p>{{date('M j, Y H:i',strtotime($post->created_at))}}</p>
         </dl>
         <dl class="dl-horizontal">
            <label> Редактирано на: </label>
            <p>{{date('M j, Y H:i',strtotime($post->updated_at))}}</p>
         </dl>
        
         <div class="row">
            <div class="col-md-6">
               {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-circle btn-outline btn-block blue')) !!}
            </div>
            <div class="col-md-6">
               {!! Form::open(['route'=>['posts.destroy',$post->id],'method' => 'DELETE']) !!}
               {!! Form::submit('Delete',array('class'=>'btn btn-circle btn-outline btn-block red ')) !!}
               {!! Form::close() !!}
            </div>
            <div class="col-md-12">
               <a href="{{route("posts.index")}}" class="btn btn-circle btn-outline btn-block dark margin" > << See all posts</a>
            </div>
         </div>
      </div>
 </div>

  
   

   <div class="col-md-12">
    <div class="row">
      <div class="col-md-2">
   @if(!empty($post->image)) 
<h2> Основна снимка </h2>
         <img  src="{{asset("/images/")}}/{!! $post->image !!}" style="width:250;height:250px;">

      </div>
      @if(!$images->isEmpty())
      <div class="col-md-10">
        
          <h2 class="title">Допълнителни снимки</h2>

          @foreach($images as $image)

          <div class="col-md-2 col-xs-12 margin-top-bottom">
            <img src="{{asset("/images/")}}/{!! $image->image_small !!}" style="width:250;height:250px;">
         </div>
          @endforeach
       </div>
     @endif
 </div>
</div>
   @endif
</div>
  </div>
@endsection