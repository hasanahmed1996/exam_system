@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="/admin/dashboard" title="Go to Home" class="tip-bottom">
                    <i class="icon-home"></i> Home</a> <a href="#">Past Papers</a>
                <a href="#" class="current">Edit Past Paper</a> </div>


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
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit paper details </h5>
                        </div>
                        <div class="widget-content no-padding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/edit-paper/'.$paperDetails->id)}}" name="edit_paper" id="edit_paper"
                                  novalidate="novalidate">{{csrf_field()}}


                                <div class="control-group">
                                    <label class="control-label">Under category</label>
                                    <div class="controls">
                                        <select name="degree_id" name="degree_id" style="width: 220px;">
                                            <?php echo $degrees_dropdown; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Past paper name</label>
                                    <div class="controls">
                                        <input type="text" name="paper_name" id="paper_name" value="{{ $paperDetails->paper_name }}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Past paper Code</label>
                                    <div class="controls">
                                        <input type="text" name="paper_code" id="paper_code" value="{{ $paperDetails->paper_code }}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Past paper year</label>
                                    <div class="controls">
                                        <input type="text" name="paper_year" id="paper_year" value="{{ $paperDetails->paper_year }}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description" id="description" >{{ $paperDetails->description }}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Thumbnail image</label>
                                    <div class="controls">
                                        <input type="file" name="image" id="image">
                                        <input type="hidden" name="current_image" value="{{$paperDetails->image}}">
                                        @if(!empty($paperDetails->image))
                                        <img style ="width: 30px;" src="{{ asset('/images/backend_images/thumbnails/'.$paperDetails->image) }}"> | <a href="{{url('/admin/delete-paper-thumb/'.$paperDetails->id)}}"> Delete Image</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Past paper file</label>
                                    <div class="controls">
                                        <input type="file" name="file" id="file">
                                        <input type="hidden" name="current_file" value="{{$paperDetails->file}}">
                                        @if(!empty($paperDetails->file))
                                            {{$paperDetails->file}} | <a href="{{url('/admin/delete-paper-file/'.$paperDetails->id)}}"> Delete File</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Update Past Paper" class="btn btn-success">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
