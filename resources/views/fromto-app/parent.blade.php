<!DOCTYPE html>
<html lang="{{App::isLocale('en') ? 'en' : 'ar'}}" direction="{{App::isLocale('en') ? 'ltr' : 'rtl'}}"
style="direction: {{App::isLocale('en') ? 'ltr' : 'rtl'}};">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>فـــروم تو – فـــروم تو لخدمات النقل والمساعدة على الطريق</title>
	<!-- Stylesheets -->
    <link rel="icon" href="{{asset('fromto/images/favicon.svg')}}">
	<link href="{{asset('fromto/css/style.css')}}" rel="stylesheet">
    @if(App::isLocale('ar'))
	<link href="{{asset('fromto/css/rtl.css')}}" rel="stylesheet">
    @endif
	<!-- Responsive -->
	<link href="{{asset('fromto/css/responsive.css')}}" rel="stylesheet">
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
	<script src="{{asset('fromto/js/jquery-3.2.1.min.js')}}"></script>
    
    @yield('styles')
</head>
<body>
	
	<div class="main-wrapper">
		
        <header id="header">
			<div class="top-header">
			    <div class="container">
			        <ul class="hd-cont">
			            <li><a href="tel:(+62)546776543"><i class="fa-solid fa-phone"></i> {{$settings[0]->mobile}}</a></li>
			            <li><a href="mailto:info@fromto.sa"><i class="fa-solid fa-envelope"></i>{{$settings[0]->email}}</a></li>
			        </ul>
			        <div class="social">
			            <p>{{__('cms.follow_us')}} :</p>
			            <ul>
			                <li><a href="{{$settings[0]->facebook_url}}"><i class="fa-brands fa-facebook-f"></i></a></li>
			                <li><a href="{{$settings[0]->twitter_url}}"><i class="fa-brands fa-twitter"></i></a></li>
			                <li><a href="{{$settings[0]->instgram_url}}"><i class="fa-brands fa-instagram"></i></a></li>
			                <li><a href="{{$settings[0]->linkedin_url}}"><i class="fa-brands fa-linkedin-in"></i></a></li>
			            </ul>
			        </div>
			    </div>
			</div>
			<div class="bottom-header">
			    <div class="container">
			        <div class="logo-site">
			            <a href="index.html">
			                <img src="{{Storage::url($settings[0]->logo ?? '')}}" alt="" />
			            </a>
			        </div>
			        <ul class="main_menu clearfix">
			            <li class="active"><a class="page-scroll" href="{{route('app.index')}}">{{__('cms.home')}}</a></li>
			            <li><a class="page-scroll" href="{{route('app.about')}}">{{__('cms.about')}}</a></li>
			            <li><a class="page-scroll" href="partners.html">{{__('cms.our_partners')}}</a></li>
			            <li><a class="page-scroll" href="services.html">{{__('cms.our_services')}}</a></li>
			            <li><a class="page-scroll" href="{{route('contacts.create')}}">{{__('cms.contact_us')}}</a></li>
			            {{-- <li><a href="{{ LaravelLocalization::getLocalizedURL('ar')  }}" class="page-scroll">{{App::isLocale('en') ? 'العربية' : 'الانجليزية'}}</a></li> --}}
			            <li><a href="{{App::isLocale('en') ? LaravelLocalization::getLocalizedURL('ar') : LaravelLocalization::getNonLocalizedURL('en/en/fromto-app')}}" class="page-scroll">{{App::isLocale('en') ? 'العربية' : 'الانجليزية'}}</a></li>
			            <li class="login-site"><a href="index_ar.html" class="page-scroll"><span><i class="fa-solid fa-user"></i> {{__('cms.login')}}</span></a></li>
			            <li class="download-app"><a href="index_ar.html" class="page-scroll"><span><i class="fa-solid fa-download"></i> {{__('cms.download')}}</span></a></li>
			        </ul>
			        <div class="opt-mobail">
			            <button type="button" class="hamburger">
			                <span class="hamb-top"></span>
			                <span class="hamb-middle"></span>
			                <span class="hamb-bottom"></span>
			            </button>
			        </div>
			    </div>
			</div>
		</header>
		<!--header-->

@yield('content')
		
		<footer id="footer">
            <div class="top-footer">
                <div class="container">
                    <div class="d-flex row-ft">
                        <div class="col-dt">
                            <div class="cont-ft wow fadeInUp">
                                <figure class="logo-ft wow fadeInUp">
                                    <img src="{{asset('fromto/images/logo.png')}}" alt="Logo" class="img-fluid">
                                </figure>
                                <p>{{App::isLocale('en') ? $details[0]->content: $details[0]->content_ar}}</p>
                                <ul class="social-ft">
                                    <li><a href="{{$settings[0]->facebook_url}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="{{$settings[0]->twitter_url}}"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="{{$settings[0]->instgram_url}}"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="{{$settings[0]->linkedin_url}}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-about">
                            <div class="menu-ft">
                                <h5>{{__('cms.about')}}</h5>
                                <ul class="li-ft wow fadeInUp">
                                    <li><a href="{{route('app.index')}}">{{__('cms.home')}}</a></li>
                                    <li><a href="{{route('app.about')}}">{{__('cms.about')}}</a></li>
                                    <li><a href="partners.html">{{__('cms.our_partners')}}</a></li>
                                    <li><a href="{{route('app.contact')}}">{{__('cms.contact_us')}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-connect">
                            <div class="menu-ft">
                                <h5>{{__('cms.connect_with_us')}}</h5>
                                <ul class="list-contact wow fadeInUp">
                                    <li><a href="tel:(+62)546776543"><i class="fa-solid fa-phone"></i> {{($settings[0]->mobile)}}</a></li>
                                    {{-- <li><a href="tel:(+62)546776543"><i class="fa-solid fa-phone"></i> (+62) 546 776 543</a></li> --}}
			                        <li><a href="mailto:info@fromto.sa"><i class="fa-solid fa-envelope"></i> {{($settings[0]->email)}}</a></li>
                                    <li><a href=""><i class="fa-solid fa-location-dot"></i> {{($settings[0]->location)}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-downl">
                            <div class="menu-ft mb-3">
                                <h5>{{__('cms.download')}}</h5>
                                <ul class="d-download wow fadeInUp">
                                    <li><a href=""><img src="{{asset('fromto/images/google-play.png')}}" alt="" /></a></li>
                                    <li><a href=""><img src="{{asset('fromto/images/apple-store.svg')}}" alt="" /></a></li>
                                </ul>
                            </div>
                            <div class="menu-ft">
                                <h5>{{__('cms.payments')}}</h5>
                                <ul class="list-contact wow fadeInUp">
                                    <li><a href=""><img src="{{asset('fromto/images/pay.png')}}" alt="" /></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-ft">
                <div class="container">
                    <div class="cont-bt">
                        <p class="copyRight wow fadeInUp">{{__('cms.rights')}} ©</p>
                        <ul>
                            <li><a href="{{route('app.privacy')}}">{{__('cms.privacy')}}</a></li>
                            <li><a href="">{{__('cms.cookies')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="shape-footer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="elementor-shape-fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
                    <path class="elementor-shape-fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
                    <path class="elementor-shape-fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
                </svg>
            </div>
		</footer>
        <!--footer-->
        
		
	</div>
	<!--main-wrapper--> 
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="{{asset('fromto/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('fromto/js/all.min.js')}}"></script>
    <script src="{{asset('fromto/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('fromto/js/wow.js')}}"></script>
	<script src="{{asset('fromto/js/jquery.easing.min.js')}}"></script>
	<script src="{{asset('fromto/js/script.js')}}"></script>
    <script src="{{asset('controlpanel/assets/js/pages/features/miscellaneous/toastr.js')}}"></script>
    <script src="{{asset('controlpanel/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    {{-- <script src="{{asset('js/axios.js')}}"></script> --}}
	<script>
		new WOW().init();
	</script>
	
	@yield('scripts')
</body>
</html>	