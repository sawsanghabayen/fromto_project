@extends('fromto-app.parent')

@section('title','Temp')


@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection

@section('content')
<section class="section_home head-page">
    <div class="container">
        <div class="row text-center">
            <p>{{__('cms.contact_us')}}</p>
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
                <div class="data-contact">
                    <span class=" wow slideInUp">{{__('cms.title_contact_us')}}</span>
                    <h4 class=" wow slideInUp">{{App::isLocale('en') ? $questions[2]->title : $questions[2]->title_ar}}  {{App::isLocale('en') ? $answersQ3[0]->title : $answersQ3[0]->title_ar}}</h4>
                    <p class=" wow slideInUp">{{App::isLocale('en') ? $answersQ3[0]->content : $answersQ3[0]->content_ar}}</p>
                    <div class="d-contact wow slideInUp">
                        <div class="item-contact">
                            <figure><i class="fa-solid fa-location-dot"></i></figure>
                            <div>
                                <h6>{{__('cms.location')}}</h6>
                                <p>{{$settings[0]->location}}</p>
                            </div>
                        </div>
                        <div class="item-contact">
                            <figure><i class="fa-solid fa-envelope"></i></figure>
                            <div>
                                <h6>{{__('cms.email')}}</h6>
                                <p>{{$settings[0]->email}}</p>
                            </div>
                        </div>
                        <div class="item-contact">
                            <figure><i class="fa-solid fa-phone"></i></figure>
                            <div>
                                <h6>{{__('cms.contact_us')}}</h6>
                                <p>{{$settings[0]->mobile}}</p>
                            </div>
                        </div>
                        <div class="item-social">
                            <h6>{{__('cms.socail_media')}}</h6>
                            <ul class="social">
                                <li><a href="{{$settings[0]->facebook_url}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="{{$settings[0]->twitter_url}}"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="{{$settings[0]->instgram_url}}"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="{{$settings[0]->linkedin_url}}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cont-contact">
                    <div class="type-cont wow slideInUp">
                        
                        {{-- <p>Choose the message type</p>
                        <ul>
                            <li>
                                <input type="radio" name="type" id="inquiry" />
                                <label for="inquiry">Inquiry</label>
                            </li>
                            <li>
                                <input type="radio" name="type" id="complaint" />
                                <label for="complaint">Complaint</label>
                            </li>
                            <li>
                                <input type="radio" name="type" id="suggestion" />
                                <label for="suggestion">Suggestion</label>
                            </li>
                            <li>
                                <input type="radio" name="type" id="recruit" />
                                <label for="recruit">Recruit</label>
                            </li>
                        </ul> --}}
                    </div>
                    <div class="bd-cont wow slideInUp">
                        <p>{{__('cms.sub_title_contact_us')}}</p>
                        <form id="create-form" class="form-contact">
                           {{-- @if($errors->any())
                            <div class="alert alert-success" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                              </div>
                              @endif
                              @if(session()->has('message'))
                              <div class="alert alert-success" role="alert">
                                {{session()->get('message')}}
                                </div>
                                @endif --}}
                            <div class="d-flex">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{__('cms.name')}}" id="name"/>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="{{__('cms.email')}}" id="email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="{{__('cms.subject')}}" id="subject"/>
                            </div>
                            <div class="input-group">
                                <input type="file" class="form-control" id="file">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="{{__('cms.message')}}" id="message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn-site" onclick="performStore()">{{__('cms.send_message')}}</button>
                            </div>

                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section_home-->

@endsection

@section('scripts')
{{-- <script src="{{asset('controlpanel/assets/js/pages/features/miscellaneous/toastr.js')}}"></script> --}}
{{-- <script src="{{asset('controlpanel/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script> --}}
<script src="{{asset('js/axios.js')}}"></script>

<script src="{{asset('js/crud.js?n=1')}}"></script>
<script>
    
    function performStore() {
    //    alert(response.data.message);
      
      //application/x-www-form-urlencoded
      axios.post('/fromto-app/contacts', {
          name: document.getElementById('name').value,
          email: document.getElementById('email').value,
          subject: document.getElementById('subject').value,
          message: document.getElementById('message').value,
        //   file: document.getElementById('file').value,

      })
      .then(function (response) {
          console.log(response);

        //   dd(response.data);
          toastr.success(response.data.message);
          document.getElementById('create-form').reset();
      })
      .catch(function (error) {
          console.log(error.response);
          toastr.error(error.response.data.message);
      });

  
  }
</script>
@endsection
