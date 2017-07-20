<div class="form-group">
        <label for="{{ $field->name }}" class="control-label col-sm-3">{{ trans('general.'.$field->name) }}</label>
        <div class="col-sm-9">
            <select id="{{ $field->group }}-items-{{ $category->id }}" name="{{ $field->name }}" class="form-control">
                <option value="0">{{ trans('general.'.$field->name) }}</option>
                @foreach($elements as $element)
                    <option value="{{ $element->id }}">{{ $element->name }}</option>
                @endforeach
            </select>
        </div>
</div>