@extends('layouts.frontLayout.front_design')
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Past Exam Papers</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
                        <li class="breadcrumb-item"><a href="/past-papers">Past Exam Papers</a></li>
                        <li class="breadcrumb-item"><a href="/papers/{{$degreeDetails ->url}}">{{$degreeDetails->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($papersAll as $papers)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <!--<div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>-->
                                                    <img src="{{asset ('images/backend_images/thumbnails/'.$papers->image)}}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>

                                                        </ul>
                                                        <a class="cart" href="{{url ('paper/'.$papers->id)}}">View</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{$papers->paper_name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Degrees</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->


                            <!--////////////////////////////////////////////////////////////////////////////-->
                            <div class="panel panel-default">

                                <?php
                                ?>
                                @foreach($degrees as $deg)
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian" href="#{{$deg->id}}">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                <b>{{$deg->name}}</b>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="{{$deg->id}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                @foreach($deg->degrees as $fos)
                                                <li><a href="{{$fos->url}}">{{$fos->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--////////////////////////////////////////////////////////////////////////////-->
                        </div><!--/category-products-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@endsection

