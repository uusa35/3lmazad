@extends('backend.layouts.app')

@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Assign Field</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post"
                  action="{{ route('backend.category.assign', $element->id) }}">
                {{ csrf_field() }}
                <div class="form-body">
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">{{ trans('general.category') }}</label>
                        <div class="col-md-10">
                            {{ Form::select('', $categories->where('parent_id',0)->pluck('name_en','id'),$element->id, ['class' => 'form-control','disabled' => 'disabled']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        @foreach($fields->chunk(4) as $set)
                            <div class="col-lg-12 text-center">
                                @foreach($set as $field)
                                    <label class="col-md-2 control-label">{{ $field->label_en }}</label>
                                    <div class="col-md-1">
                                        <div class="mt-checkbox-list">
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="{{ $field->name }}"
                                                       value="{{ $field->id }}" {{ in_array($field->id,$element->fields->pluck('id')->toArray()) ? 'checked' : null }}> {{ $field->lable_en }}
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection