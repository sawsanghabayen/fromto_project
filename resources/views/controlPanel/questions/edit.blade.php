@extends('controlpanel.parent')

@section('page-name',__('cms.questions'))
@section('main-page',__('cms.hr'))
@section('sub-page',__('cms.questions'))
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
                        <label class="col-3 col-form-label">{{__('cms.title_question')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title" value="{{$question->title}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.title_question')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.title_question_ar')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title_ar" value="{{$question->title_ar}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.title_question_ar')}}</span>
                        </div>
                    </div>
  
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.image')}}:</label>
                        <div class="col-9">
                            <div class="image-input image-input-empty image-input-outline" id="image"
                            style="background-image: url({{Storage::url($question->image)}})">
                            <div class="image-input-wrapper"></div>

                            <label
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title=""
                                data-original-title="Change logo">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="question_image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="question_image_remove" />
                            </label>

                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="cancel" data-toggle="tooltip" title="Cancel image">
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
        formData.append('image',image.input.files[0]);
        if(image.input.files[0] != undefined){
            formData.append('image',image.input.files[0]);
        }
        axios.post('/cms/admin/questions/{{$question->id}}',formData)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/questions';
            
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>

@endsection