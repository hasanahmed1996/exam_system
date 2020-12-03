@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="/admin/dashboard" title="Go to Home" class="tip-bottom">
                    <i class="icon-home"></i> Home</a> <a href="#">Past Papers</a>
                <a href="#" class="current">View Past Papers</a> </div>
            <h1>Past Papers</h1>
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
                        <h5>View Past Papers</h5>
                    </div>
                    <div class="widget-content no-padding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Past Paper ID</th>
                                <th>Degree ID</th>
                                <th>Degree Name</th>
                                <th>Past Paper Name</th>
                                <th>Past Paper Code</th>
                                <th>Past Paper Year</th>
                                <th>Past Paper Thumbnail</th>
                                <th>Past Paper pdf</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($papers as $paper)
                                <tr class="gradeX">
                                    <td>{{$paper->id}}</td>
                                    <td>{{$paper->degree_id}}</td>
                                    <td>{{$paper->degree_name}}</td>
                                    <td>{{$paper->paper_name}}</td>
                                    <td>{{$paper->paper_code}}</td>
                                    <td>{{$paper->paper_year}}</td>
                                    <td>
                                        @if(!empty($paper->image))
                                        <img src ="{{asset('/images/backend_images/thumbnails/'.$paper->image)}}">
                                        @endif
                                    </td>
                                    <td> <a style="text-decoration: underline;" href="{{asset('/files/'.$paper->file) }}">{{$paper->file}}</a></td>
                                    <td class="center"> <a href="#myModal{{$paper->id}}" data-toggle="modal"
                                                           class="btn btn-success btn-mini">View</a> <br>
                                        <a href="{{ url('/admin/edit-paper/'.$paper->id)}}" class="btn btn-primary btn-mini">Edit</a> <br>
                                        <a rel="{{$paper->id}}" rel1="delete_paper"
                                           <?php /*href="{{ url('/admin/delete-paper/'.$paper->id)}}"*/?>
                                               href="javascript:"
                                           class="btn btn-danger btn-mini deleteRecord">Delete</a></td>
                                </tr>
                                    <div id="myModal{{$paper->id}}" class="modal hide">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">×</button>
                                            <h3>{{$paper->paper_name}} Full Details</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Paper ID: {{$paper->id}}</p>
                                            <p>Degree ID: {{$paper->degree_id}}</p>
                                            <p>Degree Name: {{$paper->degree_name}}</p>
                                            <p>Paper Name: {{$paper->paper_name}}</p>
                                            <p>Paper Code: {{$paper->paper_code}}</p>
                                            <p>Paper Year: {{$paper->paper_year}}</p>
                                            <p>Description: {{$paper->description}}</p>
                                            <p>File name: {{$paper->file}}</p>
                                        </div>
                                    </div>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
