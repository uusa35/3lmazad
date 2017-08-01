@extends('backend.layouts.app')

@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Create New Option</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post" action="{{ route('backend.option.store') }}">
                {{ csrf_field() }}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">name Ar</label>
                        <div class="col-md-10">
                            <input type="text" name="name_ar" value="{{ $element->name_ar }}" class="form-control" placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">name En</label>
                        <div class="col-md-10">
                            <input type="text" name="name_en" value="{{ $element->name_en }}" class="form-control" placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">value</label>
                        <div class="col-md-10">
                            <input type="text" name="value" value="{{ $element->value }}" class="form-control" placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="col-md-2 control-label">{{ trans('general.field') }}</label>

                        <div class="col-md-10">
                            {{ Form::select('field_id', $fields->where('is_model',false)->pluck('name','id'),$element->field->id, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">active</label>
                        <div class="col-md-10">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox">
                                    <input type="checkbox" name="active" value="1" {{ $element->active ? 'checked' : null }}> active
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection