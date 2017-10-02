<div class="ui icon input tooltip-message hidden fields"
     data-inverted=""
     data-position="top center"
     id="{{ $field->name }}"
     data-tooltip="{{ trans('message.'.$field->name) }}">
    <i class="{{ $field->icon }} icon"></i>
    <input type="number" class="search-input search-input-keyword" name="{{ $field->name }}"
           placeholder="{{ trans('general.'.$field->name) }}"/>
</div>