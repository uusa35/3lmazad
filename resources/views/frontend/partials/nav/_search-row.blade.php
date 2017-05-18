<form class="form-inline search-bar" method="get"
      action="{{ route('search') }}">

    <div class="ui floating dropdown labeled icon button area_search_field" id="area">
        <i class="filter icon"></i>
        <span class="text">Filter Areas</span>
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

    <div class="ui dropdown button category_search_field" id="category">
        <span class="text">{{ trans('general.choose_category') }}</span>
        <i class="dropdown icon"></i>
        <div class="menu">
            <div class="item category" value="1">
                <span class="text">Category 1</span>
            </div>
            <div class="item">
                <i class="folder icon"></i>
                <span class="text">Cars</span>
                <div class="menu">
                    <div class="item">
                        <i class="folder icon"></i>
                        <span class="text">Cars For Sale</span>
                    </div>
                    <div class="item">Item 2B</div>
                    <div class="item">Item 2C</div>
                </div>
            </div>
            <div class="item">
                <i class="dropdown icon"></i>
                <span class="text">Category 2</span>
                <div class="menu">
                    <div class="item">Item 2A</div>
                    <div class="item">Item 2B</div>
                    <div class="item">Item 2C</div>
                </div>
            </div>
            <div class="item">
                <i class="dropdown icon"></i>
                <span class="text">Category 3</span>
                <div class="menu">
                    <div class="item">Item 3A</div>
                    <div class="item">Item 3B</div>
                    <div class="item">Item 3C</div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <input type="text" class="form-control search-input keyword_search_field toottip_message"
               data-content="{{ trans('message.keyword_search') }}" name="search"
               placeholder="{{ trans('general.keyword') }}"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control search-input min_search_field toottip_message" name="min"
               data-content="{{ trans('message.min_search') }}"
               placeholder="{{ trans('general.price_min') }}"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control search-input max_search_field toottip_message" name="max"
               data-content="{{ trans('message.max_search') }}"
               placeholder="{{ trans('general.price_max') }}"/>
    </div>

    <button type="submit" class="btn btn--grey">Search</button>
</form>

{{--<div id="App"></div>--}}

