<form class="search-bar" method="get"
      action="{{ route('search') }}">
    <div class="main-fields">
        @include('frontend.partials.components._area_field')

        @include('frontend.partials.components._category_field')

        <div class="ui icon input">
            <i class="search icon"></i>
            <input type="text" class="search-input keyword_search_field toottip_message"
                   data-content="{{ trans('message.keyword_search') }}" name="search"
                   data-variation="inverted"
                   placeholder="{{ trans('general.keyword') }}"/>
        </div>

        <div class="ui right icon input">
            <i class="chevron circle down icon"></i>
            <input type="text" class="search-input min_search_field toottip_message" name="min"
                   data-content="{{ trans('message.min_search') }}"
                   data-variation="inverted"
                   placeholder="{{ trans('general.price_min') }}"/>
        </div>


        <div class="ui icon input">
            <i class="chevron circle up icon"></i>
            <input type="text" class="search-input max_search_field toottip_message" name="max"
                   data-content="{{ trans('message.max_search') }}"
                   data-variation="inverted"
                   placeholder="{{ trans('general.price_max') }}"/>
        </div>
        <button class="ui labeled icon brown button" type="submit">
            <i class="search icon"></i>
            {{ trans('general.search') }}
        </button>
    </div>

    <div class="sub-fields">
        @include('frontend.partials.components._brand_field')
        @include('frontend.partials.components._model_field')
        @include('frontend.partials.components._condition_field')
        @include('frontend.partials.components._transmission_field')
    </div>
</form>

{{--<div id="App"></div>--}}

