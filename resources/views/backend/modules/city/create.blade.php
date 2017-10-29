@extends('backend.layouts.app')
@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Create New City</span>
            </div>
        </div>
        <div class="portlet-body form">

        <form role="form" method="post" action="{{ route('backend.city.store') }}">
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

            <div class="form-group">
                <label for="area_id" class="col-md-2 control-label">area</label>
                <div class="col-md-10">
                    {{ Form::select('area_id', $areas,null, ['class' => 'form-control']) }}
                </div>
            </div>

            </br>

            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection