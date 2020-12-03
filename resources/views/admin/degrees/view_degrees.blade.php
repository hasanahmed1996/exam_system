@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Degree</a><a href="#" class="current">View Degree/module</a> </div>
            <h1>Degrees</h1>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View degrees/module</h5>
                        </div>
                        <div class="widget-content no-padding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Degree ID</th>
                                    <th>Degree Name</th>
                                    <th>Module/subject of :</th>
                                    <th>Degree URL</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($degrees as $degree)
                                <tr class="gradeX">
                                    <td>{{$degree->id}}</td>
                                    <td>{{$degree->name}}</td>
                                    <td>{{$degree->parent_id}}</td>
                                    <td>{{$degree->url}}</td>
                                    <td class="center"><a href="{{ url('/admin/edit-degree/'.$degree->id)}}"
                                    class="btn btn-primary btn-mini">Edit Details</a> <br> <a <?php /*id="delDegree"
                                    href="{{ url('/admin/delete-degree/'.$degree->id)}}"*/?>
                                    href="javascript:" rel="{{$degree->id}}" rel1="delete-degree"
                                    class="btn btn-danger btn-mini deleteRecord">Delete</a></td>
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

@endsection
