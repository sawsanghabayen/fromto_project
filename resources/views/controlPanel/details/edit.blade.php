@extends('controlpanel.parent')

@section('page-name',__('cms.details'))
@section('main-page',__('cms.settings'))
@section('sub-page',__('cms.details'))
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
                <h3 class="card-title"></h3>
                {{-- <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div> --}}
            </div>
            <!--begin::Form-->
            <form id="update-form">
                <div class="card-body">
                    
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.title_detail')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title" value="{{$detail->title}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.title_detail')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.title_detail_ar')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title_ar" value="{{$detail->title_ar}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.title_detail_ar')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.content_detail')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="content"
                            value="{{$detail->content}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.content_detail')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.content_detail_ar')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="content_ar"
                            value="{{$detail->content_ar}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.content_detail_ar')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.image')}}:</label>
                        <div class="col-9">
                            <div class="image-input image-input-empty image-input-outline" id="image"
                            style="background-image: url({{Storage::url($detail->image)}})">
                            <div class="image-input-wrapper"></div>

                            <label
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title=""
                                data-original-title="Change detail">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="profile_detail" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="details_image_remove" />
                            </label>

                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="cancel" data-toggle="tooltip" title="Cancel detail">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>

                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="remove" data-toggle="tooltip" title="Remove image">
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
                            <button type="button" onclick="performUpdate()"
                                class="btn btn-primary mr-2">{{__('cms.save')}}</button>
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
    var image = new KTImageInput('image');

     function performUpdate(id) {
        let formData = new FormData();
        formData.append('_method','PUT');
        formData.append('title',document.getElementById('title').value);
        formData.append('title_ar',document.getElementById('title_ar').value);
        formData.append('content',document.getElementById('content').value);
        formData.append('content_ar',document.getElementById('content_ar').value);
        formData.append('image',image.input.files[0]);
        if(image.input.files[0] != undefined){
            formData.append('image',image.input.files[0]);
        }
        axios.post('/cms/admin/details/{{$detail->id}}',formData)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/details';
            
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>
{{-- <script>
     function performUpdate(id) {
        axios.put('/cms/admin/details/{{$detail->id}}', {
            title: document.getElementById('title').value,
            title_ar: document.getElementById('title_ar').value,
            content: document.getElementById('content').value,
            content_ar: document.getElementById('content_ar').value,


        })
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/details';
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script> --}}
@endsection