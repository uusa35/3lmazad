<div class="ui floating dropdown labeled icon button area_search_field" id="area">
    <i class="search icon"></i>
    <span class="text">{{ trans('general.filter_by_model') }}</span>
    <div class="menu">
        <div class="ui icon search input">
            <i class="search icon"></i>
            <input placeholder="Search Areas..." type="text"/>
        </div>
        <div class="divider"></div>
        <div class="scrolling menu">
            @foreach($areas as $key => $value)
                <div class="item area" value={{ $key }}>
                    <div class="ui empty circular label"></div>
                    {{ $value }}
                </div>
            @endforeach
        </div>
    </div>
</div>