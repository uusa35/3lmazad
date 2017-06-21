<div class="ui floating labeled icon dropdown button search-dropdown search-dropdown-manufacturing_year tooltip-message"
     id="manufacturing_year-{{ $category->id }}"
     data-inverted=""
     data-tooltip="{{ trans('message.'.$field->name.'_field') }}">
    <input name="" id="manufacturing_year-input-{{ $category->id }}" value="0" type="hidden">
    <i class="search icon"></i>
    <span class="text">{{ trans('general.manufacturing_year') }}</span>
    <div class="menu">
        @foreach(array_reverse(range(date('Y')-15, date('Y'))) as $key => $value)
            <div class="item" data-value="{{ $value }}" data-text="{{ $value }}">
                {{ $value }}
            </div>
        @endforeach
    </div>
</div>