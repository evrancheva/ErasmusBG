@extends('layouts.user')
@section('title', '| Profile')
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
                                                        <a href="#tab_1_1" data-toggle="tab">Информация за организацията</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Промени лого</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_3" data-toggle="tab">Промени парола</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                         <div class="col-md-6 col-md-offset-3">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        {!! Form::model($user, ['route' => ['account.update', Auth::user()->id], 'method' => 'PUT', 'files' => true]) !!}

                                                        {!! Form::label('name', 'Име на организацията*:') !!}
                                                        {!! Form::text('name', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('email', 'Email:') !!}
                                                        {!! Form::text('email', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('description', 'Описание на организацията*:') !!}
                                                        {!! Form::textarea('description', null, ['class' => 'form-control input-circle','placeholder'=>'Основна информация, цели, мисия,визия, извършени дейности']) !!}
                                                        {!! Form::label('president', 'Име на настоящия президент на организацията:') !!}
                                                        {!! Form::text('email', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('site', 'Сайт (в случай, че няма - Facebook страница)*:') !!}
                                                        {!! Form::text('site', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('phone', 'Телефон за връзка*:') !!}
                                                        {!! Form::text('phone', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('address', 'Адрес на организацията:') !!}
                                                        {!! Form::text('address', null, ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('description', 'Допълнителна информация*:') !!}
                                                        {!! Form::textarea('description', null, ['class' => 'form-control input-circle','placeholder'=>'В случай, че искате да промотирате Ваши доброволчески проекти или да споделите нещо друго с хората, които ще кандидатстват по Ваши проекти,моля , напишете тук!']) !!}
                                                        
                                                        
                                                        {!! Form::submit('Save Changes', ['class' => 'btn btn-circle btn-outline blue btn-block margin']) !!}
                                                        {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                         <div class="col-md-3 col-md-offset-4">
                                                        @if(!empty($user->logo))
                                                        <div >
                                                            <h1>Настоящо лого</h1>
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
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
                                                        <div class="col-md-6 col-md-offset-3">
                                                        {!! Form::open(['route' => 'changePassword']) !!}

                                                        {!! Form::label('current_password', 'Настояща парола:') !!}
                                                        {!! Form::password('current_password',["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('new_password', 'Нова парола:') !!}
                                                        {!! Form::password('new_password', ["class" => 'form-control input-lg input-circle']) !!}
                                                        {!! Form::label('retype_password', 'Потвърдете новата парола:') !!}
                                                        {!! Form::password('retype_password', ["class" => 'form-control input-lg input-circle']) !!}

                                                        {!! Form::submit('Save Changes', ['class' => 'btn btn-circle btn-outline blue btn-block margin']) !!}
                                                        {!! Form::close() !!}
                                                        </div>
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