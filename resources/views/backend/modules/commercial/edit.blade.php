@extends('backend.layouts.app')

@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">edit Commercial</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post"
                  action="{{ route('backend.commercial.update',$element->id) }}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="patch">
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">title ar</label>
                        <div class="col-md-8">
                            <input type="text" name="title_ar" value="{{ $element->title_ar }}" class="form-control"
                                   placeholder="Enter title ar" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">title en</label>
                        <div class="col-md-8">
                            <input type="text" name="title_en" value="{{ $element->title_en }}" class="form-control"
                                   placeholder="Enter title en" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">url</label>
                        <div class="col-md-8">
                            <input type="text" name="url" value="{{ $element->url }}" class="form-control"
                                   placeholder="Enter URL">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="control-label col-md-2">image</label>
                        <div class="col-md-8">
                            <input class="form-control tooltip-message" name="image"
                                   placeholder="image"
                                   type="file"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">End Date</label>
                        <div class="col-md-6">
                            <input class="form-control form-control-inline input-medium date-picker datepicker"
                                   name="end_date"
                                   data-date-start-date="0d"
                                   data-date-format="yyyy-mm-dd 00:00:00" size="16" type="text"
                                   value="{{ $element->end_date }}"/>
                            <span class="help-block"> Select date </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="body"
                               class="control-label col-md-2">description_ar</label>
                        <div class="col-md-8">
                <textarea class="form-control tooltip-message" name="description_ar"
                          placeholder="description_ar" maxlength="200"
                          aria-required="true">{{ $element->description_ar }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body"
                               class="control-label col-md-2">description en</label>
                        <div class="col-md-8">
                <textarea class="form-control tooltip-message" name="description_en"
                          placeholder="description_en" maxlength="200"
                          aria-required="true">{{ $element->description_en }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">is_fixed</label>
                        <div class="col-md-8">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox">
                                    <input type="checkbox" name="is_fixed"
                                           value="1" {{ $element->is_fixed ? 'checked' : null }}> is Fixed
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">active</label>
                        <div class="col-md-8">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox">
                                    <input type="checkbox" name="active"
                                           value="1" {{ $element->active ? 'checked' : null }}> active
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