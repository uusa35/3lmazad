@extends('backend.layouts.app')
@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Create New Faq</span>
            </div>
        </div>
        <div class="portlet-body form">

        <form role="form" method="post" action="{{ route('backend.faq.store') }}">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="title_ar" placeholder="..." required/>
                    <label for="form_control_1">title ar*</label>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="title_en" placeholder="..." required/>
                    <label for="form_control_1">title en*</label>
                </div>
            </div>

            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <textarea class="form-control" name="body_ar" placeholder="description ..." required>
                    </textarea>
                    <label for="form_control_1">Description Arabic*</label>
                    <span class="help-block">description</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <textarea class="form-control" name="body_en" placeholder="description ..." required>
                    </textarea>
                    <label for="form_control_1">Description English*</label>
                    <span class="help-block">description</span>
                </div>
            </div>
            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection