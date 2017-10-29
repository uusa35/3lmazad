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
            <form role="form" method="post" class="form-horizontal"  action="{{ route('backend.group.store') }}">
                {{ csrf_field() }}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name Ar</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name_ar" placeholder="..." required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name en</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name_en" placeholder="..." required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Order</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="order" placeholder="ex 01,02,..." />
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
                </div>
            </form>
        </div>
    </div>
@endsection