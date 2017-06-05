@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <form role="form" method="post" action="{{ route('backend.aboutus.store') }}">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="title" placeholder="..."/>
                    <label for="form_control_1">title*</label>
                    <span class="help-block">title</span>
                </div>
            </div>

            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <textarea class="form-control" name="description" placeholder="description ...">
                    </textarea>
                    <label for="form_control_1">Description*</label>
                    <span class="help-block">description</span>
                </div>
            </div>

            <div class="form-actions noborder text-right">
                <button type="submit" class="btn blue">Submit</button>
                <button href="{{ url()->previous() }}" class="btn default">Cancel</button>
            </div>
        </form>
    </div>
@endsection