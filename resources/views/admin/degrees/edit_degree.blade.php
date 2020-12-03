@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="/admin/dashboard" title="Go to Home" class="tip-bottom">
                    <i class="icon-home"></i> Home</a> <a href="#">Degree</a>
                <a href="#" class="current">Edit Degree</a> </div>


            <h1>Degrees</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Degree</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('/admin/edit-degree/'.$degreeDetails->id)}}" name="edit_degree" id="edit_degree"
                                  novalidate="novalidate">{{csrf_field()}}

                                <div class="control-group">
                                    <label class="control-label">Degree type</label>
                                    <div class="controls">
                                        <select name="parent_id" style="width: 220px;">
                                            <option value="0">Select Degree from list</option>
                                            @foreach($modules as $val)
                                                <option value="{{$val->id}}" @if($val->id == $degreeDetails->parent_id)
                                                        selected @endif> {{ $val->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Module Name</label>
                                    <div class="controls">
                                        <input type="text" name="degree_name" id="degree_name" value="{{ $degreeDetails->name }}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description" id="description" >{{ $degreeDetails->description }}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">URL</label>
                                    <div class="controls">
                                        <input type="text" name="url" id="url" value="{{ $degreeDetails->url }}">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Submit Changes" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
