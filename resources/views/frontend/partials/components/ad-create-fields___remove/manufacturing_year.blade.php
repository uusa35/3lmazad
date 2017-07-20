<div class="form-group">
        <label for="manufacturing_year" class="control-label col-sm-3">{{ trans('general.manufacturing_year') }}</label>
        <div class="col-sm-9">
            <select id="manufacturing_year" name="manufacturing_year" class="form-control">
                <option value="area">{{ trans('general.manufacturing_year') }}</option>
                @foreach(array_reverse(range(date('Y')-25, date('Y'))) as $key => $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
</div>