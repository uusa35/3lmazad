<div class="form-group">
    <div class="col-lg-12">
        <label for="area_id" class="control-label col-sm-3">{{ trans('general.area') }}</label>
        <div class="col-sm-9">
            <select id="area_id" name="area_id" class="form-control">
                <option value="area">{{ trans('general.area') }}</option>
                @foreach($allAreas as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>