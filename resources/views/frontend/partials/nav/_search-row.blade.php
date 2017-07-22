<form class="search-bar" method="get"
      action="{{ route('search') }}">
    <div class="main-fields">
        @include('frontend.partials.components.search-fields._area_id_field')
        @include('frontend.partials.components.search-fields._category_field')
        @include('frontend.partials.components.search-fields._keyword_field')
        @include('frontend.partials.components.search-fields._min_field')
        @include('frontend.partials.components.search-fields._max_field')
    </div>

    @foreach($categories as $category)
        @if($category->isParent)
            <div class="sub-fields hidden" id="sub-fields-{{ $category->id }}">
                @foreach($category->form->fields->unique() as $field)
                    {{-- please review the other exact example at ad.create view i have done it this way because it's customized elements to semantic--}}
                    @if(view()->exists('frontend.partials.components.search-fields._'.$field->name.'_field'))
                        @include('frontend.partials.components.search-fields._'.$field->name.'_field')
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach

    <button class="ui labeled icon brown button search-input" type="submit">
        <i class="search icon"></i>
        {{ trans('general.search') }}
    </button>
</form>
