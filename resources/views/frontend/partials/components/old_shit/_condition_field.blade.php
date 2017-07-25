<div class="ui floating labeled icon dropdown button search-dropdown search-dropdown-condition tooltip-message"
     id="condition-{{ $category->id }}"
     data-inverted=""
     data-tooltip="{{ trans('message.'.$field->name.'_field') }}"
>
    <input name="" id="condition-input-{{ $category->id }}" value="0" type="hidden">
    <i class="search icon"></i>
    <span class="text">{{ trans('general.filter_by_condition') }}</span>
    <div class="menu">
        <div class="item" data-value="old" data-text="old">
            {{ trans('general.old') }}
        </div>
        <div class="item" data-value="new" data-text="new">
            {{ trans('general.new') }}
        </div>
    </div>
</div>