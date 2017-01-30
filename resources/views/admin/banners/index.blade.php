@extends('layouts.admin')
@section('title', '| All banners')
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
                        <span class="caption-subject font-green sbold uppercase">Всички банери</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Всички банери
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
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Link </th>
                                                <th>Width</th>
                                                <th>Height</th>
                                               <th>Active</th>
                                               

                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($banners as $banner)
                                                <tr>
                                                    <td>{!!$banner->id!!}</td>
                                                    <td>{!!$banner->name!!} </td>
                                                    <td> @if(!empty($banner->image))
                                                       <img src="{{asset("/images/")}}/{!!$banner->image!!}" class="thumb ">@else
                                                        <h5>No image </h5> @endif</td>
                                                        <td>{!!$banner->link!!} </td>
                                                    <td>{!!$banner->width!!} </td>
                                                    <td>{{$banner->height}}</td>
                                                    <td>@if($banner->active =='on') Active @else Not active @endif</td>

                                                 <td> <a href="{{route("admin.banners.edit",$banner->id)}}" class="btn btn-circle btn-outline blue ">Edit</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
