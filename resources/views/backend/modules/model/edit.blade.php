@extends('backend.layouts.app')


@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Edit Model</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post"
                  action="{{ route('backend.model.update',$element->id) }}"
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
                        <label for="brand_id" class="control-label col-sm-2">{{ trans("general.brand") }}</label>
                        <div class="col-sm-10">
                            <select id="brand_id" name="brand_id" class="form-control" required>
                                <option value="0">choose brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id === $element->brand_id ? 'selected'  : null }}>{{ $brand->name }}</option>
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
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection
