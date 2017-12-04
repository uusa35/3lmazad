<div class="form-group hidden" id="field-create-{{ $field->name }}">
    <div class="col-lg-12">
        <label for="{{ $field->name }}"
               class="control-label col-sm-3">{{ trans('general.'.$field->name) }}</label>
        <div class="col-sm-9">
            <input type="number" id="input-create-{{ $field->name }}" class="form-control" name="{{ $field->name }}"
                   value="{{ old($field->name) }}"
                   placeholder="{{ trans('general.'.$field->name) }}" type="{{ $field->type }}">
        </div>
    </div>
</div>