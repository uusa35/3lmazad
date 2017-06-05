@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <form role="form" method="post" action="{{ route('backend.category.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="parent_id" value="{{ request()->has('parent_id') ? request()->parent_id : 0}}"/>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="name" placeholder="...">
                    <label for="form_control_1">Category Name*</label>
                    <span class="help-block">Category Name</span>
                </div>
            </div>

            {{--<div class="form-body">--}}
            {{--<div class="md-checkbox">--}}
            {{--<input type="checkbox" name="featured" id="checkbox6" class="md-check" value="1">--}}
            {{--<label for="checkbox6">--}}
            {{--<span></span>--}}
            {{--<span class="check"></span>--}}
            {{--<span class="box"></span> featured </label>--}}
            {{--</div>--}}
            {{--</div>--}}


            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection