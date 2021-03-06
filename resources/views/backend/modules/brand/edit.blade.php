@extends('backend.layouts.app')


@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Edit Brand</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post"
                  action="{{ route('backend.brand.update',$element->id) }}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="patch">
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name Ar</label>
                        <div class="col-md-10">
                            <input type="text" name="name_ar" value="{{ $element->name_ar }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name En</label>
                        <div class="col-md-10">
                            <input type="text" name="name_en" value="{{ $element->name_en }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>

                    <div class="form-group" id="">
                            <label for="category_id" class="control-label col-sm-2">{{ trans("general.category") }}</label>
                            <div class="col-sm-10">
                                <select id="category-create" name="category_id" class="form-control tooltip-message"
                                        data-content="{{ trans("message.parent_cat_ad_create") }}">
                                    <option value="0">{{ trans('message.choose_main_category') }}</option>
                                    @foreach($categories->where('parent_id',0) as $category)
                                        {{ $selected = isset($element) && $element->category->id && $element->category->id == $category->id ? 'selected' : null }}
                                        <option value="{{ $category->id }}" {{ $selected }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="color">image brand:
                        </label>
                        <div class="col-md-10">
                            <input class="form-control" name="image"
                                   type="file"
                            />
                            <div class="help-block">best fit 200x200</div>
                        </div>
                    </div>
                    <div class="col-lg-2 pull-right">
                        <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}" alt=""
                             class="img-responsive">
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Order</label>
                        <div class="col-md-10">
                            <input type="text" name="order" value="{{ $element->order }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>

                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection
