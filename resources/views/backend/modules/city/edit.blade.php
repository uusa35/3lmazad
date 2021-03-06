@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <form role="form" method="post" action="{{ route('backend.city.update',$element->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="patch">

            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="name_ar" placeholder="..."
                           value="{{ $element->name_ar }}" required/>
                    <label for="form_control_1">name ar*</label>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="name_en" placeholder="..."
                           value="{{ $element->name_en }}" required/>
                    <label for="form_control_1">name en*</label>
                </div>
            </div>

            <div class="form-group">
                <label for="area_id" class="col-md-2 control-label">area</label>
                <div class="col-md-10">
                    {{ Form::select('area_id', $areas,$element->area_id, ['class' => 'form-control']) }}
                </div>
            </div>
            </br>

            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection