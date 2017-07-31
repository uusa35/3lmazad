@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <form role="form" method="post" action="{{ route('backend.aboutus.update',$element->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="patch">

            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="title_ar" value="{{ $element->title_ar }}" required/>
                    <label for="form_control_1">title ar*</label>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="title_en" value="{{ $element->title_en }}" required/>
                    <label for="form_control_1">title en*</label>
                </div>
            </div>

            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <textarea class="form-control" name="body_ar" placeholder="description ..." required>
                        {{ $element->body_ar }}
                    </textarea>
                    <label for="form_control_1">Description Arabic*</label>
                    <span class="help-block">description</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <textarea class="form-control" name="body_en" placeholder="description ..." required>
                        {{ $element->body_en }}
                    </textarea>
                    <label for="form_control_1">Description English*</label>
                    <span class="help-block">description</span>
                </div>
            </div>
            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection