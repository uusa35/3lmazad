<div class="ui icon input tooltip-message hidden fields"
     id="{{ $field->name }}"
     data-inverted=""
     data-position="top center"
     data-tooltip="{{ trans('message.'.$field->name) }}">
    <i class="{{ $field->icon }} icon"></i>
    <input type="text" class="search-input" name="{{ $field->name }}"
           placeholder="{{ trans('general.'.$field->name) }}"/>
</div>