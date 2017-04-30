@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <form role="form" method="post" action="{{ route('backend.contactus.update',$element->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="patch">
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="name" placeholder="..." value="{{ $element->name }}">
                    <label for="form_control_1">Name*</label>
                    <span class="help-block">Website or Company Name</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="file" class="form-control" name="logo" placeholder="...">
                    <label for="form_control_1">Logo*</label>
                    <span class="help-block">logo will appear in the website</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="facebook_url" placeholder="..." value="{{ $element->facebook_url }}">
                    <label for="form_control_1">URL facebook*</label>
                    <span class="help-block">facebook</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="instagram_url" placeholder="..." value="{{ $element->instagram_url }}">
                    <label for="form_control_1">instagram URL*</label>
                    <span class="help-block">instagram</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="twitter_url" placeholder="..." value="{{ $element->twitter_url }}">
                    <label for="form_control_1">URL twitter*</label>
                    <span class="help-block">twitter</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="youtube_url" placeholder="..." value="{{ $element->youtube_url }}">
                    <label for="form_control_1">youtube</label>
                    <span class="help-block">youtube</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="phone" placeholder="..." value="{{ $element->phone }}">
                    <label for="form_control_1">phone</label>
                    <span class="help-block">phone</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="mobile" placeholder="..." value="{{ $element->mobile }}">
                    <label for="form_control_1">mobile</label>
                    <span class="help-block">mobile</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="email" placeholder="..." value="{{ $element->email }}">
                    <label for="form_control_1">email</label>
                    <span class="help-block">email</span>
                </div>
            </div>

            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="address" placeholder="..." value="{{ $element->address }}">
                    <label for="form_control_1">address</label>
                    <span class="help-block">address</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="latitude" placeholder="..." value="{{ $element->latitude }}">
                    <label for="form_control_1">latitude</label>
                    <span class="help-block">latitude</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="longitude" placeholder="..." value="{{ $element->longitude }}">
                    <label for="form_control_1">longitude</label>
                    <span class="help-block">longitude</span>
                </div>
            </div>


            <div class="form-actions noborder text-right">
                <button type="submit" class="btn blue">Submit</button>
                <button href="{{ url()->previous() }}" class="btn default">Cancel</button>
            </div>
        </form>
    </div>
@endsection