@extends('layouts.admin')
@section('title', '| All users')
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN THEME PANEL -->
    <!-- END THEME PANEL -->
    <h1 class="page-title"> Всички проекти</h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
         
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
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                               

                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{!!$user->id!!}</td>
                                                    <td> @if(!empty($user->logo))
                                                        <img src="{{asset("/images/")}}/{!!$user->logo!!}" class="minilogo img-circle">@else
                                                        <h5>No image </h5> @endif</td>
                                                    <td>{!!$user->name!!} </td>
                                                    <td>{{$user->email}}</td>
                                                    
                                                    <td>@if(!empty($user->phone))
                                                        {{$user->phone}} @else <h5>No phone </h5> @endif</td>
                                                   <td></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            {!!  $users->render()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
