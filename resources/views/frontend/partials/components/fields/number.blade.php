<div class="form-group">
        <label for="{{ $field->name }}"
               class="control-label col-sm-3">{{ trans('general.'.$field->name) }}</label>
        <div class="col-sm-9">
            <input class="form-control" name="{{ $field->name }}" value="{{ old($field->name) }}"
                   placeholder="{{ trans('general.'.$field->name) }}" type="{{ $field->type }}">
        </div>
</div>