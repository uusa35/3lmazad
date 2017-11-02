@extends('backend.layouts.app')

@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Create New Field</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post"
                  action="{{ route('backend.field.update',$element->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    {{--<div class="form-group">--}}
                    {{--<label class="col-md-2 control-label">Name</label>--}}
                    {{--<div class="col-md-10">--}}
                    {{--<input type="text" name="name" disabled value="{{ $element->name }}" class="form-control" placeholder="Enter text" required>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label class="col-md-2 control-label">label Ar</label>
                        <div class="col-md-10">
                            <input type="text" name="label_ar" value="{{ $element->label_ar }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">label En</label>
                        <div class="col-md-10">
                            <input type="text" name="label_en" value="{{ $element->label_en }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Order</label>
                        <div class="col-md-10">
                            <input type="number" maxlength="2" name="order" value="{{ $element->order }}"
                                   class="form-control" placeholder="Enter text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="col-md-2 control-label">{{ trans('general.icon') }}</label>

                        <div class="col-md-10">
                            {{ Form::select('icon', $icons,$element->icon, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    @if(auth()->user()->email === 'super@admin.com')
                        <div class="form-group">
                            <label for="type" class="col-md-2 control-label">{{ trans('general.type') }}</label>

                            <div class="col-md-10">
                                {{ Form::select('type', $types,$element->type, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">is_required</label>
                            <div class="col-md-10">
                                <div class="mt-checkbox-list">
                                    <label class="mt-checkbox">
                                        <input type="checkbox" name="is_required"
                                               value="1" {{ $element->is_required ? 'checked' : null }}> is Required
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">is_model</label>
                            <div class="col-md-10">
                                <div class="mt-checkbox-list">
                                    <label class="mt-checkbox">
                                        <input type="checkbox" name="is_model"
                                               value="1" {{ $element->is_model ? 'checked' : null }}> is modal
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">searchable</label>
                            <div class="col-md-10">
                                <div class="mt-checkbox-list">
                                    <label class="mt-checkbox">
                                        <input type="checkbox" name="searchable"
                                               value="1" {{ $element->searchable ? 'checked' : null  }}> searchable
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">in_form</label>
                            <div class="col-md-10">
                                <div class="mt-checkbox-list">
                                    <label class="mt-checkbox">
                                        <input type="checkbox" name="in_form"
                                               value="1" {{ $element->in_form ? 'checked' : null  }}> in create ad form
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Collection Name</label>
                            <div class="col-md-10">
                                <input type="text" name="collection_name"
                                       value="{{ $element->collection_name }}" class="form-control"
                                       placeholder="Enter text">
                            </div>
                        </div>
                    @endif
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection