<div class="ui floating dropdown labeled icon button search-dropdown tooltip-message hidden fields {{ $field->name }}"
     data-inverted=""
     data-position="top center"
     data-tooltip="{{ trans('message.'.$field->name.'_hints') }}"
     id="{{ $field->name }}">
    <input name="{{ $field->name }}" id="{{ $field->name }}-input" value="0" data-value="0"
           data-text="{{ $field->name }}" type="hidden">
    <i class="{{ $field->icon }} icon"></i>
    <span class="text">{{ trans('general.search_for_item') }}</span>
    <div class="menu">
        <div class="ui icon search input">
            <i class="search icon"></i>
            {{--searching input text--}}
            <input name="" type="text"/>
        </div>
        <div class="divider"></div>
        <div class="scrolling menu" id="options-{{ $field->name }}">
            @foreach($field->options as $element)
                <div class="item {{ $element->name }}" value={{ $element->value }} data-value="{{ $element->value }}"
                     data-text="{{ $element->name }}">
                    {{ $element->name }}
                </div>
            @endforeach
        </div>
    </div>
</div>