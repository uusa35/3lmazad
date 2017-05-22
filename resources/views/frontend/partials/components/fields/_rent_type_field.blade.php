<div class="ui floating dropdown rent_type labeled icon button search-dropdown search-dropdown-area" id="rent_type">
    <input name="rent_type" id="rent_type" value="0" type="hidden">
    <i class="marker icon"></i>
    <span class="text">{{ trans('general.rent_type') }}</span>
    <div class="menu">
        <div class="scrolling menu">
            <div class="item rent_type" data-text="monthly" data-value="weekly">
                <i class="marker icon"></i>
                {{ trans('general.weekly') }}
            </div>
            <div class="item rent_type" data-text="monthly" data-value="monthly">
                <i class="marker icon"></i>
                {{ trans('general.monthly') }}
            </div>
            <div class="item rent_type" data-text="monthly" data-value="yearly">
                <i class="marker icon"></i>
                {{ trans('general.yearly') }}
            </div>
        </div>
    </div>
</div>