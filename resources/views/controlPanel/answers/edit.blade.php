@extends('controlpanel.parent')

@section('page-name','Edit Answer')
@section('main-page','Content Management')
@section('sub-page','Answers')
@section('page-name-small','Edit Answer')

@section('styles')

@endsection

@section('content')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Horizontal Form Layout</h3>
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
                    <h3 class="text-dark font-weight-bold mb-10">Basic Info</h3>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">Question:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="question_id"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    @foreach ($questions as $question)
                                    <option value="{{$question->id}}" @if($question->id == $answer->question_id)
                                        selected @endif>{{$question->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">Please select question</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Title (En):</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title" value="{{$answer->title}}" />
                            <span class="form-text text-muted">Please enter english title</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Title (Ar):</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title_ar" value="{{$answer->title_ar}}" />
                            <span class="form-text text-muted">Please enter arabic title</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Content (En):</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="content" value="{{$answer->content}}"/>
                            <span class="form-text text-muted">Please enter arabic content</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Content (Ar):</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="content_ar" value="{{$answer->content_ar}}" />
                            <span class="form-text text-muted">Please enter arabic content</span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.image')}}:</label>
                        <div class="col-9">
                            <div class="image-input image-input-empty image-input-outline" id="image"
                            style="background-image: url({{Storage::url($answer->image)}})">
                            <div class="image-input-wrapper"></div>

                            <label
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title=""
                                data-original-title="Change logo">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="answer_image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="answer_image_remove" />
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
                            <button type="button" onclick="performEdit()" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
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
<script src="{{asset('cms/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>
<script src="{{asset('cms/assets/js/pages/crud/file-upload/image-input.js')}}"></script>

<script>
    var image = new KTImageInput('image');
    
    function performEdit(){
        let formData = new FormData();
        formData.append('question_id',document.getElementById('question_id').value);
        formData.append('title',document.getElementById('title').value);
        formData.append('title_ar',document.getElementById('title_ar').value);
        formData.append('content',document.getElementById('content').value);
        formData.append('content_ar',document.getElementById('content_ar').value);
        formData.append('_method','PUT');     
        formData.append('image',image.input.files[0]);
        if(image.input.files[0] != undefined){
            formData.append('image',image.input.files[0]);
        }
        axios.post('/cms/admin/answers/{{$answer->id}}',formData)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/answers';
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>
@endsection