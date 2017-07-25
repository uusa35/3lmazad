<div class="ui floating labeled icon dropdown button search-dropdown search-dropdown-transmission tooltip-message"
     id="transmission-{{ $category->id }}"
     data-inverted=""
     data-tooltip="{{ trans('message.'.$field->name.'_field') }}"
>
    <input name="" id="transmission-input-{{ $category->id }}" value="0" type="hidden">
    <i class="search icon"></i>
    <span class="text">{{ trans('general.filter_transmission') }}</span>
    <div class="menu">
        <div class="item" data-value="manual">
            {{ trans('general.manual') }}
        </div>
        <div class="item" data-value="automatic">
            {{ trans('general.automatic') }}
        </div>
    </div>
</div>