@extends('controlpanel.parent')

@section('page-name',__('cms.settings'))
@section('main-page',__('cms.settings'))
@section('sub-page',__('cms.settings'))
@section('page-name-small',__('cms.update'))

@section('styles')

@endsection

@section('content')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">{{__('cms.update')}}</h3>
                {{-- <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div> --}}
            </div>
            <!--begin::Form-->
            <form id="create-form">
                <div class="card-body">

                
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.mobile')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="mobile" value="{{$setting->mobile}}"
                                placeholder="Enter user name" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.mobile')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.email')}}:</label>
                        <div class="col-9">
                            <input type="email" class="form-control" id="email" value="{{$setting->email}}"
                                placeholder="Enter email" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.email')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.location')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="location" value="{{$setting->location}}"
                                placeholder="Enter full location" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.location')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.facebook_url')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="facebook_url" value="{{$setting->facebook_url}}"
                                placeholder="Enter facebook_url" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.facebook_url')}}</span>
                        </div>
                    </div>    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.instgram_url')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="instgram_url" value="{{$setting->instgram_url}}"
                                placeholder="Enter instgram_url" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.instgram_url')}}</span>
                        </div>
                    </div>    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.twitter_url')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="twitter_url" value="{{$setting->twitter_url}}"
                                placeholder="Enter twitter_url" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.twitter_url')}}</span>
                        </div>
                    </div>    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.linkedin_url')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="linkedin_url" value="{{$setting->linkedin_url}}"
                                placeholder="Enter linkedin_url" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.linkedin_url')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.image')}}:</label>
                        <div class="col-9">
                            <div class="image-input image-input-empty image-input-outline" id="logo"
                            style="background-image: url({{Storage::url($setting->logo)}})">
                            <div class="image-input-wrapper"></div>

                            <label
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title=""
                                data-original-title="Change logo">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="profile_logo" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="profile_logo_remove" />
                            </label>

                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="cancel" data-toggle="tooltip" title="Cancel logo">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>

                          
                        </div>
                        </div>
                    </div>
             
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performUpdate('{{$setting->id}}')"
                                class="btn btn-primary mr-2">{{__('cms.update')}}</button>
                            <button type="reset" class="btn btn-secondary">{{__('cms.cancel')}}</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Container-->
@endsection

@section('scripts')
<script src="{{asset('controlpanel/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>
<script src="{{asset('controlpanel/assets/js/pages/crud/file-upload/image-input.js')}}"></script>
<script>
    var logo = new KTImageInput('logo');

     function performUpdate(id) {
        let formData = new FormData();
        formData.append('_method','PUT');
        formData.append('email',document.getElementById('email').value);
        formData.append('mobile',document.getElementById('mobile').value);
        formData.append('location',document.getElementById('location').value);
        formData.append('facebook_url',document.getElementById('facebook_url').value);
        formData.append('instgram_url',document.getElementById('instgram_url').value);
        formData.append('twitter_url',document.getElementById('twitter_url').value);
        formData.append('linkedin_url',document.getElementById('linkedin_url').value);
        formData.append('logo',logo.input.files[0]);
        if(logo.input.files[0] != undefined){
            formData.append('logo',logo.input.files[0]);
        }
        axios.post('/cms/admin/settings/{{$setting->id}}',formData)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/settings';
            
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>
{{-- <script>
  function performUpdate(id) {
        axios.put('/cms/admin/settings/{{$setting->id}}', {
            email: document.getElementById('email').value,
            mobile: document.getElementById('mobile').value,
            location: document.getElementById('location').value,
            facebook_url: document.getElementById('facebook_url').value,
            instgram_url: document.getElementById('instgram_url').value,
            twitter_url: document.getElementById('twitter_url').value,
            linkedin_url: document.getElementById('linkedin_url').value,



        })
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/settings';
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script> --}}
@endsection