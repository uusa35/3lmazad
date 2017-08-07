<div class="form-group hidden" id="field-create-{{ $field->name }}">
    <div class="col-lg-12">
        <label for="{{ $field->name }}" class="control-label col-sm-3">{{ trans('general.'.$field->name) }}</label>
        <div class="col-sm-9">
            <select id="input-create-{{ $field->name }}" name="{{ $field->name }}" class="form-control">
                <option value>{{ trans('general.'.$field->name) }}</option>
                @if(!$field->options->isEmpty())
                    @foreach($field->options as $option)
                        <option value="{{ $option->value }}" {{ old($option->name) === $option->name ? 'selected' : null }}>
                            {{ $option->name }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>