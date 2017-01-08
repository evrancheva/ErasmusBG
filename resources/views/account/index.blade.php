@extends('layouts.user')
@section('title', '| All Posts')
@section('content')
    <div class="">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->

        <!-- END THEME PANEL -->
        <h1 class="page-title"> Профил
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Начало</a>
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
                            <span class="caption-subject font-green sbold uppercase">Промени Профил</span>
                        </div>
                        </divф>
                        <div class="portlet-body">
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>

                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">

                                                        {!! Form::model($user, ['route' => ['account.update', Auth::user()->id], 'method' => 'PUT', 'files' => true]) !!}

                                                        {!! Form::label('name', 'Name of the organization:') !!}
                                                        {!! Form::text('name', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('email', 'Email of the organization:') !!}
                                                        {!! Form::text('email', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('phone', 'Phone of the organization:') !!}
                                                        {!! Form::text('phone', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('address', 'Address of the organization:') !!}
                                                        {!! Form::text('address', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('site', 'Site of the organization:') !!}
                                                        {!! Form::text('site', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('description', 'Description of the organization:') !!}
                                                        {!! Form::textarea('description', null, ['class' => 'form-control input-circle']) !!}
                                                        {!! Form::submit('Save Changes', ['class' => 'btn btn-circle btn-outline blue btn-block margin']) !!}
                                                        {!! Form::close() !!}

                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                        @if(!empty($user->logo))
                                                        <div >
                                                            <h1>Current Image</h1>
                                                            <img class="logo" src="{{asset("/images/")}}/{!! $user->logo !!}" style="width:250px;height:250px;">
                                                        </div>
                                                        @endif
                                                        {!! Form::open(['route' => 'addLogo',null,'files'=>true]) !!}
                                                            @if(!empty($user->logo))
                                                        {!! Form::label('featured_image',"Replace logo :") !!}
                                                            @else
                                                                {!! Form::label('featured_image',"Upload Logo :") !!}
                                                                @endif
                                                        {!! Form::file('featured_image') !!}
                                                        {!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block margin']) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
                                                        {!! Form::open(['route' => 'changePassword']) !!}

                                                        {!! Form::label('current_password', 'Current password:') !!}
                                                        {!! Form::password('current_password',["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('new_password', 'New password:') !!}
                                                        {!! Form::password('new_password', ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('retype_password', 'Retype password:') !!}
                                                        {!! Form::password('retype_password', ["class" => 'form-control input-lg input-circle']) !!}

                                                        {!! Form::submit('Save Changes', ['class' => 'btn btn-circle btn-outline blue btn-block margin']) !!}
                                                        {!! Form::close() !!}

                                                    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                    <!-- PRIVACY SETTINGS TAB -->

                                                    <!--end profile-settings-->

                                                    </form>
                                                </div>
                                                <!-- END PRIVACY SETTINGS TAB -->
                                            </div>
                                        </div>
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