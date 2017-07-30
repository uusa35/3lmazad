@extends('backend.layouts.app')

@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Create New Plan</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post" action="{{ route('backend.plan.create') }}">
                {{ csrf_field() }}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name Ar</label>
                        <div class="col-md-10">
                            <input type="text" name="name_ar" class="form-control" placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name En</label>
                        <div class="col-md-10">
                            <input type="text" name="name_en" class="form-control" placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Duration (Days)</label>
                        <div class="col-md-10">
                            <input type="number" name="duration" class="form-control" placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Free Or Paid Plan</label>
                        <div class="col-md-10">
                            <div class="mt-radio-list">
                                <label class="mt-radio">
                                    <input type="radio" name="is_paid" id="optionsRadios22" value="0" checked> Free
                                    <span></span>
                                </label>
                                <label class="mt-radio">
                                    <input type="radio" name="is_paid" id="optionsRadios23" value="1"> Paid
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Main Price</label>
                        <div class="col-md-10">
                            <input type="number" name="price" class="form-control" placeholder="Enter text" required>
                            <span class="help-inline">Main Price for the plan</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">On Sale Price</label>
                        <div class="col-md-10">
                            <input type="number" name="sale_price" class="form-control" placeholder="Enter text">
                            <span class="help-inline">On Sale Price shall overirde the Price only if on_sale is true</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">On Sale</label>
                        <div class="col-md-10">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox">
                                    <input type="checkbox" name="on_sale" value="1"> On Sale
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Plan Description Ar </label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="3" name="description_ar" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Plan Description En </label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="3" name="description_en" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Active</label>
                        <div class="col-md-10">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox">
                                    <input type="checkbox" name="active" value="1"> Active
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