@extends('layouts.user')
@section('title', '| All Posts')
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN THEME PANEL -->
    <!-- END THEME PANEL -->
    <h1 class="page-title"> Всички проекти</h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Начало</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <i class="icon-home"></i>
                <a href="{!! route('posts.index') !!}">Всички проекти</a>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit  calendar">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Всички проекти</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Всички проекти
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Location</th>
                                                <th>Dates</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($posts as $post)
                                                <tr>
                                                    <th>{{$post->id}}</th>
                                                     <th>{{$post->title}}</th>
                                                    <td>{{$post->location}}</td>
                                                    <td>{{date('M j, Y',strtotime($post->start_date))}} - {{date('M j, Y',strtotime($post->end_date))}}</td>
                                                    <td>
                                                        <a href="{{route("posts.show",$post->id)}}" class="btn btn-circle btn-outline blue ">View</a>
                                                        <a href="{{route("posts.edit",$post->id)}}" class="btn btn-circle btn-outline red ">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            {!!  $posts->render()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop