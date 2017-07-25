<div class="ui floating dropdown building_age labeled icon button search-dropdown search-dropdown-building-age tooltip-message"
     data-inverted=""
     data-tooltip="{{ trans('message.'.$field->name.'_field') }}"
     id="building_age-{{ $category->id }}">
    <input name="" id="building_age-input-{{ $category->id }}" value="0" type="hidden">
    <i class="marker icon"></i>
    <span class="text">{{ trans('general.building_age') }}</span>
    <div class="menu">
        <div class="scrolling menu">
            @for($i=1;$i <= 5;$i++)
                <div class="item" data-text="{{ $i }}" data-value="{{ $i}}">
                    <i class="home icon"></i>
                    {{ $i }} {{ trans('general.year') }}
                </div>
            @endfor
        </div>
    </div>
</div>