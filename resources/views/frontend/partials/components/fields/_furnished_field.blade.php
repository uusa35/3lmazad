<div class="ui floating dropdown labeled icon button search-dropdown search-dropdown-furnished" id="furnished-{{ $category->id }}">
    <input name="" id="furnished-input-{{ $category->id }}" value="0" type="hidden">
        <i class="marker icon"></i>
        <span class="text">{{ trans('general.filter_by_furnished') }}</span>
        <div class="menu">
            <div class="item" data-text="not_furnished" data-value="false">
                <i class="marker icon"></i>
                {{ trans('general.not_furnished') }}
            </div>
            <div class="item" data-text="furnished" data-value="true">
                <i class="marker icon"></i>
                {{ trans('general.furnished') }}
            </div>
        </div>
</div>