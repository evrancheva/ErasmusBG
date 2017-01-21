@extends('layouts.user')
@section('title','| Create New Post')
@section('stylesheets')
{!! Html::style('css/fullcalendar.css') !!}
{!! Html::style('css/select2.min.css') !!}
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/fullcalendar.min.js') !!}
{!! Html::script('js/lang-all.js') !!}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'link code',
        menubar: false
    });
</script>
@endsection
@section('content')

 {!!  Auth::user()->role !!}
<h1 class="page-title"> Начало</h1>
<div class="portlet light portlet-fit  calendar">
    <div class="portlet-title">
        <div class="caption">
            <i class=" icon-layers font-green"></i>
            <span class="caption-subject font-green sbold uppercase">Предстоящи пътувания</span>
        </div>
        <div class="btn-group pull-right">
            <a href="{!! route('posts.create') !!}" class="btn btn-circle btn-outline red "><i class="fa fa-plus"></i>&nbsp;
            <span class="hidden-sm hidden-xs"> Добави нов проект</span>&nbsp;</a>
        </div>
    </div>
</div>
<div class="row">

<div class="col-md-12 col-sm-12">
    <div id="calendar" class="has-toolbar"> </div>
</div>
@stop
@section('scripts')
<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            eventLimit: true,
            views: {
                month: {
                    eventLimit: true
                }
            },
            
            events: [
    
               @foreach($posts as $post)
                {
    
                    id: {!! $post->id!!},
                    title: '{!! $post->title!!}, {!! $post->location !!}',
                    start: '{!! $post->start_date!!}',
                    end: '{!! $post->end_date!!}',
                    color: '#ffcc00',
                    url:'posts/{!! $post->id!!}'
                    /*url: '{$SITE}events/{$i.id}-{$i.url}.html'*/
    
                },
    
               @endforeach
    
            ]
    
        })
    
    });
    
    
    
</script>
@endsection