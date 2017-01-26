@extends('layouts.main')
@section('title',"| $post->title")
@section('content')
<div class="container">

    <div class="row">
    <div class="col-md-12">
 <span class="titleOfarticle">{!!$post->title!!}</span>
    <div class="row">
        <div class="col-md-4 margin">
        	  @if(!empty($post->image))
                <img src="{!! asset('images/'. $post->image)!!}">
                @endif
                @foreach ($post->images as $image)
                    <span class="label label-default">{{ $image->created_at }}</span>
                @endforeach
            <h1>{!! $post->title !!}</h1>
            <h1>{!! $post->body !!}</h1>
            </div>
        </div>
    </div>
    </div>
    </div>
    @stop