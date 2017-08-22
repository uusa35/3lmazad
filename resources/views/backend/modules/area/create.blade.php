@extends('backend.layouts.app')
@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Create New Area</span>
            </div>
        </div>
        <div class="portlet-body form">

        <form role="form" method="post" action="{{ route('backend.area.store') }}">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="name_ar" placeholder="..." required/>
                    <label for="form_control_1">name ar*</label>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="name_en" placeholder="..." required/>
                    <label for="form_control_1">name en*</label>
                </div>
            </div>

            <input type="hidden" name="country_id" value="118">

            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection