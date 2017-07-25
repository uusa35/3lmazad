<div class="ui icon input tooltip-message hidden fields"
     data-inverted=""
     id="{{ $field->name }}"
     data-tooltip="{{ trans('message.'.$field->name) }}">
    <i class="{{ $field->icon }} icon"></i>
    <input type="number" class="search-input" name="{{ $field->name }}"
           placeholder="{{ trans('general.'.$field->name) }}"/>
</div>