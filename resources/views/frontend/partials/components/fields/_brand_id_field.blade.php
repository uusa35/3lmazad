<div class="ui floating dropdown labeled icon button search-dropdown search-dropdown-brand" id="brand_id-{{ $category->id }}">
    <input name="" id="brand_id-input-{{ $category->id }}" value="0" type="hidden">
    <i class="search icon"></i>
    <span class="text tooltip_message_on_hover"
          data-content="{{ trans('general.brand') }}"
          data-variation="inverted"
    >{{ trans('general.filter_by_brand') }}</span>
    <div class="menu">
        <div class="ui icon search input">
            <i class="search icon"></i>
            <input placeholder="Search Areas..." type="text"/>
        </div>
        <div class="divider"></div>
        <div class="scrolling menu">
            @foreach($category->brands as $brand)
                <div class="item brand" value={{ $brand->id}} data-value="{{ $brand->id }}" data-text="{{ $brand->name }}">
                    <img class="ui avatar image" src="{{ asset('storage/uploads/images/thumbnail/'.$brand->image) }}">
                    {{ $brand->name }}
                </div>
            @endforeach
        </div>
    </div>
</div>