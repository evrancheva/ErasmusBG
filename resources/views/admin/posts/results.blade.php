@extends('layouts.admin')
@section('title', '| Results')
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN THEME PANEL -->
    <!-- END THEME PANEL -->


    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit  calendar">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Резултати от търсенето</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Проекти
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                        @if(!$posts->isEmpty())
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
                                                    <td>{{$post->location}}, {!!$post->country->name!!}</td>
                                                    <td>{{date('M j, Y',strtotime($post->start_date))}} - {{date('M j, Y',strtotime($post->end_date))}}</td>
                                                    <td>
                                                        <a href="{{route("posts.show",$post->id)}}" class="btn btn-circle btn-outline blue ">Виж</a>
                                                        <a href="{{route("posts.edit",$post->id)}}" class="btn btn-circle btn-outline red ">Редактирай</a>
                                                    </td>
                                                </tr>

                                          
                                            </tbody>
                                        </table>
                               
                                    </div>
                                      @endforeach
                                            @else <h3 class="red">Няма резултат от търсенето.  </h3>
                                            @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop