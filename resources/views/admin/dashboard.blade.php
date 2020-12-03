@extends('layouts.adminLayout.admin_design')
@section('content')


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">
                <li class="bg_lb"> <a href="{{url('/admin/dashboard')}}"> <i class="icon-dashboard"></i> <span class="label label-important"></span> My Dashboard </a> </li>
                <li class="bg_lg span3"> <a href="{{url('/admin/add-degree')}}"> <i class="icon-signal"></i> Add  Degree/Module</a> </li>
                <li class="bg_ly"> <a href="{{url('/admin/view-degrees')}}"> <i class="icon-inbox"></i><span class="label label-success"></span> View All Degrees </a> </li>
                <li class="bg_lo"> <a href="{{url('/admin/add-paper')}}"> <i class="icon-th"></i> Add a paper</a> </li>
                <li class="bg_ls"> <a href="{{url('/admin/view-papers')}}"> <i class="icon-fullscreen"></i> View All Papers</a> </li>
                <li class="bg_ls"> <a href="{{url('/homepage')}}"> <i class="icon-fullscreen"></i> View Website</a> </li>

            </ul>
        </div>
        <!--End-Action boxes-->
    </div>
</div>

<!--end-main-container-part-->
@endsection
