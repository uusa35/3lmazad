<div class="ui icon input tooltip-message"
     data-inverted=""
     data-tooltip="{{ trans('message.'.$field->name.'_field') }}">
    <i class="search icon"></i>
    <input type="text" class="search-input search-input-min"
           id="space-input-{{ $category->id }}"
           name="space"
           value="0"
           placeholder="{{ trans('general.space') }}"/>
</div>
