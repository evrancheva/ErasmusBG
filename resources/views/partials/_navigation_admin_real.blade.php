<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="\admin\">
               <img src="{{asset("/images/logoto.png")}}" style="width:56px;height:56px;" alt="logo" class="" /> </a>
            
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions">
            <div class="btn-group">

                <a href="{!! route('posts.create') !!}" class="btn btn-circle btn-outline red "><i class="fa fa-plus"></i>&nbsp;
                    <span class="hidden-sm hidden-xs"> Добави нов проект</span>&nbsp;</a>
            </div>
        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
            
                {!! Form::open(['route' => 'admin.posts.search','method' => 'get','class' => 'search-form search-form-expanded']) !!}
                   <div class="input-group">
                    {!! Form::text('search',null,array('class'=>'form-control','placeholder' => 'Search...'))!!}
                            <span class="input-group-btn">
                                 {{Form::button('<i class="icon-magnifier"></i>', array('type' => 'submit', 'class' => ' btn submit'))}}
                            </span>
                             </div>
                {!!Form::close()!!}
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">

                    <li class="dropdown dropdown-user">
                        <a href="/account" >

                            <img alt="" class="img-circle minilogo" src="{{asset("/images/")}}/{!! Auth::user()->logo !!}" />
                            <span class="username username-hide-on-mobile">{!! Auth::user()->name !!} </span>

                        </a>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="">

                       <a href="{!! route('logout')!!}">  <i class="icon-logout"></i>  </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- END SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="{{Request::is('admin') ? "active": ""}}" class="nav-item start ">
                    <a  class="nav-link nav-toggle"  href="{!! route('admin.dashboard')!!}">
                        <i class="icon-home"></i>
                        <span class="title">Начало</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="{{Request::is('admin/posts') ? "active": ""}} nav-item start" >
                    <a href="{!! route('admin.posts')!!}" class="nav-link nav-toggle">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <span class="title">Всички проекти</span>
                        <span class="arrow"></span>
                    </a>
                </li>
              
             
              <li class="{{Request::is('admin/users') ? "active": ""}} nav-item start ">
                    <a  href="{!! route('admin.users')!!}" class=" nav-link nav-toggle" >
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="title">Users</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="{{Request::is('admin/banners_management') ? "active": ""}} nav-item start ">
                    <a  href="{!! route('admin.banners_management')!!}" class=" nav-link nav-toggle" >
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span class="title">Banner Management</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                   <li class="nav-item start">
                    <a href="{!! route('logout')!!}" class="nav-link nav-toggle">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        <span class="title">Излез</span>
                        <span class="arrow"></span>
                    </a>
                </li>

            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->