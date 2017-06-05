@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <form role="form" method="post" action="{{ route('backend.aboutus.update',$element->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="patch">

            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="title" placeholder="..." value="{{ $element->title }}">
                    <label for="form_control_1">title*</label>
                    <span class="help-block">title</span>
                </div>
            </div>

            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <textarea class="form-control" name="description" placeholder="description ...">
                        {{ $element->description }}
                    </textarea>
                    <label for="form_control_1">Description*</label>
                    <span class="help-block">description</span>
                </div>
            </div>

            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection