@extends('backend.layouts.app')

@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Edit Type</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post"
                  action="{{ route('backend.type.update',$element->id) }}">
                {{ csrf_field() }}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name Ar</label>
                        <div class="col-md-10">
                            <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name En</label>
                        <div class="col-md-10">
                            <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="col-md-2 control-label">{{ trans('general.icon') }}</label>

                        <div class="col-md-10">
                            {{ Form::select('icon', $icons,$element->icon, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">{{ trans('general.category') }}</label>
                        <div class="col-md-10">
                            {{ Form::select('category_id', $categories->where('parent_id',0)->pluck('name_en','id'),$element->category_id, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection
