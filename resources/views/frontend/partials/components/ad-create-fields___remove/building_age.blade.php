<div class="form-group">
        <label for="building_age" class="control-label col-sm-3">{{ trans('general.building_age') }}</label>
        <div class="col-sm-9">
            <select id="building_age" name="building_age" class="form-control">
                <option value="0">{{ trans('general.building_age') }}</option>
                @for($i=1;$i <= 5;$i++)
                    <option value="{{ $i }}">{{ $i }} {{ trans("general.year") }}</option>
                @endfor
            </select>
        </div>
</div>