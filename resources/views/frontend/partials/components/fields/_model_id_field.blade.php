<div class="ui floating dropdown labeled icon button search-dropdown search-dropdown-model"
     id="model_id-{{ $category->id }}">
    <input name="" id="model_id-input-{{ $category->id }}" value="" type="hidden">
    <i class="search icon"></i>
    <span class="text">{{ trans('general.filter_by_model') }}</span>
    <div class="menu">
        <div class="ui icon search input">
            <i class="search icon"></i>
            <input placeholder="{{ trans('general.filter_by_model') }}" type="text"/>
        </div>
        <div class="divider"></div>
        <div class="scrolling menu">
            @foreach($areas as $key => $value)
                <div class="item area" data-value={{ $key }} data-text={{ $value }}>
                    <div class="ui empty circular label"></div>
                    {{ $value }}
                </div>
            @endforeach
        </div>
    </div>
</div>