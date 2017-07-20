<div class="form-group">
        <label for="model_id" class="control-label col-sm-3">{{ trans('general.model_id') }}</label>
        <div class="col-sm-9">
            <select id="model-items-{{ $category->id }}" name="model_id" class="form-control">
                <option value="0">{{ trans('general.model_id') }}</option>
            </select>
        </div>
</div>