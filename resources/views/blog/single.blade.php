@extends('layouts.main')
@section('title',"| $post->title")
@section('content')
    <div class="row">
        <div class="col-md 8 col-md-offset-2">
        	  @if(!empty($post->image))
                <img src="{!! asset('images/'. $post->image)!!}">
                @endif
            <h1>{!! $post->title !!}</h1>
            <h1>{!! $post->body !!}</h1>
            <p> Posted In : {!! $post->category->name !!}</p>
        </div>
    </div>
    @stop