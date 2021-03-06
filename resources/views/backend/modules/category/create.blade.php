@extends('backend.layouts.app')
@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Create New Category</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" method="post" class="form-horizontal" action="{{ route('backend.category.store') }}">
                <div class="form-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="parent_id"
                           value="{{ request()->has('parent_id') ? request()->parent_id : 0}}"/>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Category Name Arabic</label>
                        <div class="col-md-10">
                            <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Category Name English</label>
                        <div class="col-md-10">
                            <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="icon" class="col-md-2 control-label">{{ trans('general.icon') }}</label>
                        <div class="col-md-10">
                            {{ Form::select('icon', $icons,0, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    @if(!request()->has('parent_id'))
                        <div class="form-group">
                            <label class="col-md-2 control-label">is featured</label>
                            <div class="col-md-10">
                                <div class="mt-checkbox-list">
                                    <label class="mt-checkbox">
                                        <input type="checkbox" name="featured" value="1"> is Featured
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
                                        <input type="checkbox" name="on_homepage" value="1"> show on home page
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Category Order</label>
                            <div class="col-md-10">
                                <input type="text" name="order" value="{{ old('order') }}" class="form-control"
                                       placeholder="Enter text" required>
                            </div>
                        </div>
                    @endif

                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection