@extends('front.layout')

@section('content')
   <!-- breadcrumb start-->
   <section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Our Courses</h2>
                        <p>Home<span>/</span>Courses<span>/</span>{{$categories->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>popular courses</p>
                    <h2>Courses</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($courses as $course)
            <div class="col-sm-6 col-lg-4">
                <div class="single_special_cource">
                    <img src="{{asset("front/courses/$course->image")}}" class="special_img" alt="">
                    <div class="special_cource_text">
                        <a href="{{route('front.category', $course->category->id)}}" class="btn_4">{{$course->category->name}}</a>
                        <h4>{{$course->price}}</h4>
                        <a href="{{route('front.course', [$course->category->id, $course->id])}}"><h3>{{$course->name}}</h3></a>

                        <p>{{$course->samll_desc}}</p>
                        <div class="author_info">
                            <div class="author_img">
                                <img src="{{asset("front/trainers/")}}/{{$course->trainer->image}}" alt="">
                                <div class="author_info_text">
                                    <p>Conduct by:</p>
                                    <h5><a href="#">{{$course->trainer->name}}</a></h5>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            <div class = "d-flex justify-content-center w-100 mb-5 padding_top">
            {!! $courses->render()!!}
        </div>
        </div>
    </div>
</section>
<!--::blog_part end::-->
@endsection
