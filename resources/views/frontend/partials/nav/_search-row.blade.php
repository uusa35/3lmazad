<form class="search-bar" method="get"
      action="{{ route('search') }}">

    <div class="main-fields">
        @include('frontend.partials.components._area_field')

        @include('frontend.partials.components._category_field')

        <div class="ui icon input">
            <i class="alarm outline icon"></i>
            <input type="text" class="search-input keyword_search_field toottip_message"
                   data-content="{{ trans('message.keyword_search') }}" name="search"
                   placeholder="{{ trans('general.keyword') }}"/>
        </div>

        <div class="ui icon input">
            <i class="alarm outline icon"></i>
            <input type="text" class="search-input min_search_field toottip_message" name="min"
                   data-content="{{ trans('message.min_search') }}"
                   placeholder="{{ trans('general.price_min') }}"/>
        </div>


        <div class="ui icon input">
            <i class="alarm outline icon"></i>
            <input type="text" class="search-input max_search_field toottip_message" name="max"
                   data-content="{{ trans('message.max_search') }}"
                   placeholder="{{ trans('general.price_max') }}"/>
        </div>
        <button type="submit" class="btn btn--grey">Search</button>
    </div>

    <div class="sub-fields">
        @include('frontend.partials.components._brand_field')
        @include('frontend.partials.components._model_field')
        @include('frontend.partials.components._condition_field')
        @include('frontend.partials.components._transmission_field')
    </div>
</form>

{{--<div id="App"></div>--}}

