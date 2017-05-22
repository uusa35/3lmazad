<div class="ui floating dropdown room_no labeled icon button search-dropdown search-dropdown-building-age" id="room_no">
    <input name="room_no" id="room_no_field" value="0" type="hidden">
    <i class="marker icon"></i>
    <span class="text">{{ trans('general.room_no') }}</span>
    <div class="menu">
        <div class="scrolling menu">
            @for($i=1;$i <= 5;$i++)
                <div class="item" data-text="{{ $i }}" data-value="{{ $i}}">
                    <i class="home icon"></i>
                    {{ $i }}
                </div>
            @endfor
        </div>
    </div>
</div>