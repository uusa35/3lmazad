<form class="search-bar" method="get"
      action="{{ route('search') }}">
    <div class="main-fields">
        @include('frontend.partials.components.fields._area_id_field')
        @include('frontend.partials.components.fields._category_field')
        @include('frontend.partials.components.fields._keyword_field')
        @include('frontend.partials.components.fields._min_field')
        @include('frontend.partials.components.fields._max_field')
    </div>

    @foreach($categories as $category)
        {{--@if($category->children()->first()->id == 2)--}}
            {{--{{ dd($category->form->first()->fields->where('is_filter', true)->unique()->pluck('name')) }}--}}
        {{--@endif--}}
        @if($category->isParent)
            <div class="sub-fields hidden" id="sub-fields-{{ $category->id }}">
                <h1>{{ $category->name }}</h1>
                @foreach($category->form->first()->fields->where('is_filter', true)->unique() as $field)
                    @if($field->is_filter)
                        @if(view()->exists('frontend.partials.components.fields._'.$field->name.'_field'))
                            @include('frontend.partials.components.fields._'.$field->name.'_field')
                        @endif
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

{{--<div id="App"></div>--}}

{{--<div class="main">--}}
{{--<div class="first-row">--}}
{{--<h1>first row</h1>--}}
{{--<div class="item">item one</div>--}}
{{--<div class="item">item tow</div>--}}
{{--<div class="item">item three</div>--}}
{{--<div class="item">item four</div>--}}
{{--<div class="item">item five</div>--}}
{{--</div>--}}
{{--<div class="second-row">--}}
{{--<h1>second row</h1>--}}
{{--<div class="item">item one</div>--}}
{{--<div class="item">item tow</div>--}}
{{--<div class="item">item three</div>--}}
{{--<div class="item">item four</div>--}}
{{--<div class="item">item five</div>--}}
{{--</div>--}}
{{--</div>--}}
