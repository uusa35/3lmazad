@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <form role="form" method="post" action="{{ route('backend.slider.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="title" placeholder="...">
                    <label for="form_control_1">Slide Title*</label>
                    <span class="help-block">please enter proper title</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="url" placeholder="...">
                    <label for="form_control_1">Slide URL*</label>
                    <span class="help-block">full link is only allowed ('http://google.com')</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="order" placeholder="...">
                    <label for="form_control_1">Slide Order*</label>
                    <span class="help-block">slider Order is a number</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="file" class="form-control" name="image" placeholder="...">
                    <label for="form_control_1">Slide Image*</label>
                    <span class="help-block">slider Image only JPG / PNG is accepted -best fit '841','450'</span>
                </div>
            </div>

            <div class="form-body">
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio53" name="active" value="1" class="md-radiobtn" checked>
                        <label for="radio53">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> Active</label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio54" name="active" value="0" class="md-radiobtn">
                        <label for="radio54">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> N/A</label>
                    </div>
                </div>
            </div>


            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection