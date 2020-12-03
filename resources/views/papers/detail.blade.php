@extends('layouts.frontLayout.front_design')
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Paper Details</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/past-papers">Past Papers</a></li>
                        <li class="breadcrumb-item">{{$paperDetails->paper_name}} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->





    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img  src="{{asset('/images/backend_images/thumbnails/'.$paperDetails->image)}}" class="d-block w-100" alt="First slide"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$paperDetails->paper_name}}</h2>
                        <h3>Year: {{$paperDetails->paper_year}}</h3>
                        <h4>Module Code: {{$paperDetails->paper_code}}</h4>
                        <h4>Short Description:</h4>
                        <p> {{$paperDetails->description}} </p>

                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <a class="btn hvr-hover" data-fancybox-close="" href="{{asset('files/'.$paperDetails->file)}}">Download paper</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

@endsection

