@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <form role="form" method="post" action="{{ route('backend.group.store') }}">
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
                <label for="icon" class="col-md-2 control-label">{{ trans('general.icon') }}</label>

                <div class="col-md-10">
                    {{ Form::select('icon', $icons,0, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">active</label>
                <div class="col-md-10">
                    <div class="mt-checkbox-list">
                        <label class="mt-checkbox">
                            <input type="checkbox" name="active" value="1"> active
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>

            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection