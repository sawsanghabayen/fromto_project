
@extends('fromto-app.parent')

@section('title','Temp')


@section('styles')
<link rel="stylesheet" href="{{asset('cms/plugins/toastr/toastr.min.css')}}">
@endsection

@section('content')
<section class="section_home head-page">
    <div class="container">
        <div class="row text-center">
            <p>{{__('cms.about')}}</p>
        </div>
    </div>
    <div  class="shape-home">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="elementor-shape-fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
            <path class="elementor-shape-fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
            <path class="elementor-shape-fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
        </svg>
    </div>
</section>
<!--section_home-->

<section class="section_sec_about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="thumb-home wow rotateInDownRight" data-wow-duration="1s" >
                    <img src="{{asset('fromto/images/thumb-home.png')}}" alt="" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="home_txt">
                    <h1 class="wow slideInLeft" data-wow-duration="1s">{{App::isLocale('en') ? $details[0]->title : $details[0]->title_ar}}</h1>
                    <p class="wow fadeInUp" data-wow-duration="1.25s">{{App::isLocale('en') ? $details[0]->content : $details[0]->content_ar}} 
                  </p>
                    <a href="" class="btn-site wow fadeInUp" data-wow-duration="1.25s">{{__('cms.contact_us')}}</a>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!--section_home-->

<section class="section_why_about">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="sec_head wow fadeInUp">
                    <h2 class="wow bounceInLeft" data-wow-duration="1.5s">{{App::isLocale('en') ? $questions[3]->title : $questions[3]->title_ar}}</h2>
                </div>
                <div class="bd-val">
                    @foreach ($answersQ4 as $answerQ4 )
                        
                    <div class="item-values wow slideInUp">
                        <figure><img src="{{Storage::url($answerQ4->image ?? '')}}" alt="" /></figure>
                        <div class="txt-vl">
                            <h6>{{App::isLocale('en') ? $answerQ4->title : $answerQ4->title_ar}}</h6>
                            <p>{{App::isLocale('en') ? $answerQ4->content : $answerQ4->content_ar}}</p>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="item-mission wow slideInUp">
                        <figure><img src="{{asset('fromto/images/checked.png')}}" alt="" /></figure>
                        <div class="txt-vl">
                            <h6>Mission</h6>
                            <p>Our goal is to be able to provide many types of freight to satisfy the needs of our customers; from cranes to auto transport trucks; whatever the shipment or service, we ensure that it is delivered to the highest standards of quality assurance and on-time delivery.</p>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-7">
                <div class="thumb-about">
                    <img src="{{asset('fromto/images/about.png')}}" alt="Image About" class=" wow bounceInUp" data-wow-duration="1s" />
                </div>
            </div>
        </div>
    </div>
</section>
<!--section_about-->
 
<section class="section_how_use">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="thumb-how-use">
                    <img src="{{Storage::url($questions[0]->image ?? '')}}" alt="Image About" class="wow zoomIn" data-wow-duration="1s"  />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sec_head text-start">
                    <h2 class="wow fadeInUp" data-wow-duration="1.5s">{{App::isLocale('en') ? $questions[0]->title : $questions[0]->title_ar}}</h2>
                </div>
                <div class="step-use">

                    @foreach ( $answersQ1 as $answerQ1)

                        
                    <div class="item-step wow slideInUp">
                        <figure><i class="fa-solid fa-cloud-arrow-down"></i></figure>
                        <div class="txt-step">
                            <h6>{{App::isLocale('en') ? $answerQ1->title : $answerQ1->title_ar}}</h6>
                            <p>{{App::isLocale('en') ? $answerQ1->content : $answerQ1->content_ar}}</p>
                        </div>
                    </div>
                    @endforeach

          
          
                </div>
            </div>
        </div>
    </div>
    <div class="shape-how-use">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="elementor-shape-fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
            <path class="elementor-shape-fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
            <path class="elementor-shape-fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
        </svg>
    </div>
</section>
<!--section_how_use-->

<section class="section_make_unique">
    <div class="container">
        <div class="sec_head wow fadeInUp" data-wow-duration="1s">
            <h2>{{App::isLocale('en') ? $questions[1]->title : $questions[1]->title_ar}}</h2>
        </div>
        <div class="row">
            @foreach ($answersQ2 as $answerQ2 )
                        
            <div class="col-lg-4">
                <div class="item-make-unique wow fadeInUp" data-wow-duration="1s">
                    <figure><img src="{{Storage::url($answerQ2->image ?? '')}}" alt="" /></figure>
                    <div class="txt-make-unique">
                        <p>{{App::isLocale('en') ? $answerQ2->title : $answerQ2->title_ar}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--section_make_unique-->

@endsection

@section('scripts')

@endsection



