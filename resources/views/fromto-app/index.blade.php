@extends('fromto-app.parent')

@section('title','FromTo')


@section('styles')

@endsection

@section('content')

        <section class="section_home">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="home_txt wow slideInLeft" data-wow-duration="1s">
                            <h1>{{App::isLocale('en') ? $details[0]->title : $details[0]->title_ar}}</h1>
                            {{-- <h1>{{$details[0]->title}}</h1> --}}
                            {{App::isLocale('en') ? $details[0]->content : $details[0]->content_ar}}
                            {{-- <p>{{$details[0]->content}}</p> --}}
                            <a href="" class="btn-site">{{__('cms.about')}}</a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="thumb-home wow zoomIn" data-wow-duration="1s" >
                            <img src="{{Storage::url($details[0]->image ?? '')}}" alt="" />
                        </div>
                    </div>
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
        
        <section class="section_partners">
            <div class="container">
                <div class="partners_head wow fadeInUp"  data-wow-duration="2s">
                    <p><strong>{{__('cms.fromto')}}</strong> {{__('cms.partners')}}</p>
                </div>
                <div class="owl-carousel coloum4 wow fadeInUp" data-wow-duration="2s">
                    @foreach ( $partners as $partner )
                        
                    <div class="item">
                        <figure class="item-partners"><img src="{{Storage::url($partner->logo ?? '')}}" alt="Image Certificates" /></figure>
                    </div>

                    @endforeach

  
                </div>
            </div>
        </section>
        <!--section_partners-->
        
        <section class="section_about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="thumb-about">
                            <img src="{{Storage::url($details[1]->image ?? '')}}" alt="Image About" class=" wow bounceInUp" data-wow-duration="1s" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sec_head wow fadeInUp">
                            <h2 class="wow bounceInRight" data-wow-duration="1.5s">{{App::isLocale('en') ? $details[1]->title : $details[1]->title_ar}}</h2>
                            <p class="wow fadeInUp">{{App::isLocale('en') ? $details[1]->content : $details[1]->content_ar}}
                            <br /><br />
                            {{-- From To help you safely and easily transport your car, furniture, and anything you want.  --}}
                            </p>
                            <a href="about.html" class="btn-site"><span>{{__('cms.read_more')}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section_about-->
        
        <section class="section_services">
            <div class="container">
                <div class="sec_head wow fadeInUp"  data-wow-duration="1s">
                    <h2>{{__('cms.services_we_offer')}}</h2>
                </div>
                <div class="row justify-content-center">
                    
                    @foreach($services as $service)
                    <div class="col-lg-4 col-6">
                        <div class="item-services wow fadeInUp"  data-wow-duration="1s">
                            <figure>
                                <img src="{{Storage::url($service->image ?? '')}}" alt="Image Services" />
                            </figure>
                            <div class="txt-services">
                                <h4>{{App::isLocale('en') ? $service->title : $service->title_ar}}</h4>
                                <p>{{App::isLocale('en') ? $service->content : $service->content_ar}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
     
                </div>
            </div>
        </section>
        <!--section_services-->
        
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
                            {{-- $questions[0]->title --}}
                            <h2 class="wow fadeInUp" data-wow-duration="1.5s">{{App::isLocale('en') ? $questions[0]->title : $questions[0]->title_ar}}</h2>
                        </div>
                        <div class="step-use">
                            @foreach ( $answersQ1 as $answerQ1)
                                
                            <div class="item-step">
                                <figure><i class="fa-solid fa-cloud-arrow-down"></i></figure>
                                <div class="txt-step">
                                    <h6>{{App::isLocale('en') ? $answerQ1->title : $answerQ1->title_ar}}</h6>
                                    <p>{{App::isLocale('en') ? $answerQ1->content : $answerQ1->content_ar}}</p>
                                </div>
                            </div>
                            @endforeach

                            {{-- <div class="item-step">
                                <figure><i class="fa-solid fa-person-circle-check"></i></figure>
                                <div class="txt-step">
                                    <h6>{{$answers[1]->title}}</h6>
                                    <p>{{$answers[1]->content}}</p>
                                </div>
                            </div>
                            <div class="item-step">
                                <figure><i class="fa-solid fa-comment-dots"></i></figure>
                                <div class="txt-step">
                                    <h6>{{$answers[2]->title}}</h6>
                                    <p>{{$answers[2]->content}}</p>
                                </div>
                            </div> --}}
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