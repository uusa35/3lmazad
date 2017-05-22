<div class="ui floating dropdown bathroom_no labeled icon button search-dropdown search-dropdown-building-age" id="bathroom_no-{{ $category->id }}">
    <input name="" id="bathroom_no-input-{{ $category->id }}" value="0" type="hidden">
    <i class="marker icon"></i>
    <span class="text">{{ trans('general.bathroom_no') }}</span>
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