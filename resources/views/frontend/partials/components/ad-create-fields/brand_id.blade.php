<div class="form-group">
        <label for="brand_id" class="control-label col-sm-3">{{ trans('general.brand_id') }}</label>
        <div class="col-sm-9">
            <select id="brand-items-{{ $category->id }}" name="brand_id" class="form-control"
                    parent_id="{{ $category->id }}">
                <option value="brand">{{ trans('general.brand_id') }}</option>
                @foreach($category->brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
</div>