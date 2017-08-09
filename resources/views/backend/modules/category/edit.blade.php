@extends('backend.layouts.app')
@section('content')
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">Edit Category</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="post" class="form-horizontal" action="{{ route('backend.category.update',$element->id) }}" enctype="multipart/form-data">
                        <div class="form-body">
                            <input type="hidden" name="_method" value="patch">
                            {{ csrf_field() }}
                            <input type="hidden" name="parent_id"
                                   value="{{ request()->has('parent_id') ? request()->parent_id : 0}}"/>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Category Name Arabic</label>
                                <div class="col-md-10">
                                    <input type="text" name="name_ar" value="{{ $element->name_ar }}" class="form-control"
                                           placeholder="Enter text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Category Name English</label>
                                <div class="col-md-10">
                                    <input type="text" name="name_en" value="{{ $element->name_en }}" class="form-control"
                                           placeholder="Enter text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="icon" class="col-md-2 control-label">{{ trans('general.icon') }}</label>
                                <div class="col-md-10">
                                    {{ Form::select('icon', $icons,$element->icon, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            @if(!request()->has('parent_id'))
                                <div class="form-group">
                                    <label class="col-md-2 control-label">is featured</label>
                                    <div class="col-md-10">
                                        <div class="mt-checkbox-list">
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="featured" value="1" {{ $element->featured ? 'checked' : null }}> is Featured
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">show on home page</label>
                                    <div class="col-md-10">
                                        <div class="mt-checkbox-list">
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="on_homepage" value="1" {{ $element->on_homepage ? 'checked'  : null }}> show on home page
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @include('backend.partials.forms._btn-group')
                        </div>
                    </form>
                </div>
            </div>
@endsection