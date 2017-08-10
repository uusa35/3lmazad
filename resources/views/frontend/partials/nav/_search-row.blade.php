<form class="search-bar" method="get"
      action="{{ route('search') }}">
    <div class="main-fields">
        @include('frontend.partials.components.search-form._area_id_field')
        @include('frontend.partials.components.search-form._category_field')
        @include('frontend.partials.components.search-form._keyword_field')
        @include('frontend.partials.components.search-form._min_field')
        @include('frontend.partials.components.search-form._max_field')
    </div>

    <div class="sub-fields hidden" id="sub-fields">
        @foreach($fields->unique() as $field)
            @include('frontend.partials.components.search-form.'.$field->type)
        @endforeach
    </div>

    <button class="ui labeled icon brown button search-input" type="submit">
        <i class="search icon"></i>
        {{ trans('general.search') }}
    </button>
</form>
<hr>
