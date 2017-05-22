<div class="ui floating dropdown floor_no labeled icon button search-dropdown search-dropdown-building-age" id="floor_no-{{ $category->id }}">
    <input name="" id="floor_no-input-{{ $category->id }}" value="" type="hidden">
    <i class="marker icon"></i>
    <span class="text">{{ trans('general.floor_no') }}</span>
    <div class="menu">
        <div class="scrolling menu">
            @for($i=0;$i <= 10;$i++)
                <div class="item" data-text="{{ $i }}" data-value="{{ $i}}">
                    <i class="home icon"></i>
                    {{ $i }}
                </div>
            @endfor
        </div>
    </div>
</div>