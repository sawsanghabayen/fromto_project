@extends('controlpanel.parent')

@section('page-name','All Contact contacts')
@section('main-page','Content Management')
@section('sub-page','Contact contacts')
@section('page-name-small','All Contact contacts')

@section('styles')

@endsection

@section('content')
<!--begin::Advance Table Widget 5-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Contact contacts</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage Contact contacts</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                <thead>
                    <tr class="text-uppercase">
                        <th style="min-width: 100px">name</th>
                        <th style="min-width: 100px">email</th>
                        <th style="min-width: 100px">file</th>
                        <th style="min-width: 300px">Subject & Message</th>
                        <th style="min-width: 100px">Send Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td class="pl-0">
                            <div>
                                <span
                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$contact->name}}</span>
                              
                        </td>
                        <td class="pl-0">
                            <div>
                                <span
                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$contact->email}}</span>
                                
                                
                            </div>
                        </td>


                              <td class="pl-0 py-8">
                            <div class="d-flex align-items-center">
                            <div class="symbol symbol-50 symbol-light mr-4">
                                <span class="symbol-label">
                                    <img src=""
                                        class="h-75 align-self-end" alt="" />
                                </span>
                            </div>
                            </div>
                        </td>
                       <td class="pl-0">
                            <div>
                                <span
                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$contact->subject}}</span>
                                <span class="text-muted font-weight-bold d-block font-size-sm">
                                    {{$contact->message}}</span>
                            </div>
                        </td>
                       <td class="pl-0">
                            <div>
                                <span
                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$contact->created_at->diffForHumans()}}</span>
                             
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 5-->
@endsection

@section('scripts')
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<script>
    function performDestroy(id,reference) {
        confirmDestroy('/cms/admin/contacts', id, reference);
    }
</script>
@endsection