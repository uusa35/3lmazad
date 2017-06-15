<div class="ui floating dropdown area labeled icon button search-dropdown search-dropdown-area tooltip-message"
     data-content="{{ trans('message.area_field') }}"
     id="area">
    <input name="area_id" id="area_input" value="0" type="hidden">
    <i class="marker icon"></i>
    <span class="text">{{ trans('general.filter_by_area') }}</span>
    <div class="menu">
        <div class="scrolling menu">
            @foreach($areas as $key => $value)
                <div class="item area_type" data-text="{{ $value }}" data-value="{{ $key }}">
                    <i class="marker icon"></i>
                    {{ $value }}
                </div>
            @endforeach
        </div>
    </div>
</div>