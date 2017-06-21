<div class="ui floating dropdown labeled icon button search-dropdown search-dropdown-type tooltip-message" id="type-{{ $category->id }}"
     data-inverted=""
     data-tooltip="{{ trans('message.'.$field->name.'_field') }}"
>
    <input name="" id="type-input-{{ $category->id }}" value="0" type="hidden">
    <i class="search icon"></i>
    <span class="text">{{ trans('general.filter_by_type') }}</span>
    <div class="menu">
        <div class="ui icon search input">
            <i class="search icon"></i>
            <input placeholder="{{ trans('general.filter_by_type') }}" type="text"/>
        </div>
        <div class="divider"></div>
        <div class="scrolling menu">
            @foreach($category->types as $type)
                <div class="item" value={{ $type->id}} data-value="{{ $type->id }}" data-text="{{ $type->name }}">
                    <i class="icon {{ $type->icon }}"></i>
                    {{ $type->name }}
                </div>
            @endforeach
        </div>
    </div>
</div>