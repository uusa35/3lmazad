<div class="ui floating dropdown labeled icon button search-dropdown search-dropdown-brand tooltip-message"
     data-inverted=""
     data-tooltip="{{ trans('message.'.$field->name.'_hints') }}"
     id="{{ $field->name }}">
    <input name="{{ $field->name }}" id="{{ $field->name }}-input" value="0" type="hidden">
    <i class="{{ $field->icon }} icon"></i>
    <span class="text tooltip_message_on_hover"
          data-content="{{ trans('general.'.$field->name) }}"
          data-variation="inverted">{{ trans('general.'.$field->name) }}</span>
    <div class="menu">
        <div class="ui icon search input">
            <i class="search icon"></i>
            <input name="" placeholder="{{ trans('general.search_'.$field->name) }}" type="text"/>
        </div>
        <div class="divider"></div>
        <div class="scrolling menu">
            @if(isset($fieldElements))
                @foreach($fieldElements as $element)
                    <div class="item {{ $element->name }}" value={{ $element->value }} data-value="{{ $element->value }}"
                         data-text="{{ $element->name }}">
                        @if(isset($element->image))
                            <img class="ui avatar image"
                                 src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}">
                        @elseif(isset($element->code))
                        @endif
                        {{ $field->label }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>