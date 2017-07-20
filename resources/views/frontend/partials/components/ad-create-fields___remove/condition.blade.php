<div class="form-group">
        <label for="condition" class="control-label col-sm-3">{{ trans('general.condition') }}</label>
        <div class="col-sm-9">
            <select id="condition-items-{{ $category->id }}" name="condition" class="form-control"
                    parent_id="{{ $category->id }}">
                <option value="0">{{ trans('general.condition') }}</option>
                <option value="new">{{ trans('general.new') }}</option>
                <option value="old">{{ trans('general.old') }}</option>
            </select>
        </div>
</div>