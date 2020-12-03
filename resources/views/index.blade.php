@extends('layouts.frontLayout.front_design')
@section('content')


    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/frontend_images/logoL.png" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> <br> StudentDocs</strong></h1>
                            <p class="m-b-40">Welcome to StudentDocs <br> The number one past paper provider in the country!</p>
                            <p><a class="btn hvr-hover" href="/past-papers">Search our past papers</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/frontend_images/astonCampus.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> <br> StudentDocs</strong></h1>
                            <p class="m-b-40">A platform you can download all the past exam papers you need!</p>
                            <p><a class="btn hvr-hover" href="/past-papers">Search our past papers</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/frontend_images/paper.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> <br> StudentDocs</strong></h1>
                            <p class="m-b-40">And its all for free!</p>
                            <p><a class="btn hvr-hover" href="/past-papers">Search our past papers</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Products - Featured Papers  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured papers</h1>
                        <p>The most downloaded and highly featured past papers</p>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @foreach($papersAll as $papers)
                  <div class="col-lg-3 col-md-6 special-grid best-seller">
                       <div class="products-single fix">
                           <div class="box-img-hover">
                               <div class="type-lb">
                                   <p class="sale">Featured Paper</p>
                               </div>
                               <img src="{{asset ('images/backend_images/thumbnails/'.$papers->image)}}"  class="img-fluid" alt="Image">

                               <div class="mask-icon">
                                   <ul></ul><a class="cart" href="{{url ('paper/'.$papers->id)}}">View</a>
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
    <!-- End Products - Featured Papers  -->

@endsection
