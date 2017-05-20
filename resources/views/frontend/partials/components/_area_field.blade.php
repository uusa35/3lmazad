<div class="ui floating dropdown area labeled icon button search-dropdown search-dropdown-area" id="area">
    <input name="area" id="area_input" value="0" type="hidden">
    <i class="marker icon"></i>
    <span class="text">{{ trans('general.filter_by_area') }}</span>
    <div class="menu">
        {{--<div class="ui icon search input">--}}
            {{--<i class="search icon"></i>--}}
            {{--<input placeholder="Search Areas..." type="text"/>--}}
        {{--</div>--}}
        {{--<div class="divider"></div>--}}
        <div class="scrolling menu">
            @foreach($areas as $key => $value)
                <div class="item area_type" data-text="{{ $value }}" data-value="{{ $key }}">
                    <div class="ui empty circular label"></div>
                    {{ $value }}
                </div>
            @endforeach
        </div>
    </div>
</div>