<div class="ui floating dropdown labeled icon button search-dropdown search-dropdown-model tooltip-message"
     id="model_id-{{ $category->id }}"
     data-inverted=""
     data-tooltip="{{ trans('message.'.$field->name.'_field') }}">
    <input name="" id="model_id-input-{{ $category->id }}" value="" type="hidden">
    <i class="search icon"></i>
    <span class="text">{{ trans('general.filter_by_model') }}</span>
    <div class="menu">
        <div class="ui icon search input">
            <i class="search icon"></i>
            <input placeholder="{{ trans('general.search_models') }}" type="text"/>
        </div>
        <div class="divider"></div>
        <div class="scrolling menu" id="model_id-items-{{ $category->id }}">
            {{-- put the models here through jquery --}}
        </div>
    </div>
</div>