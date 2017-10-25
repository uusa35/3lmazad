<div class="col-lg-12">
    <div class="ad-bar-details">
        <a class="ad-bar-children"><i class="icon {{ $element->category->icon }}"></i><span
                    class="text-uppercase">{{  $element->categoryName }}</span></a>

        <a class="ad-bar-children"><i class="icon calendar"></i>{{  $element->createdDate }}</a>
        <a class="ad-bar-children"><i class="icon delete calendar"></i>{{  $element->willExpireAt }}</a>
        @if(!is_null($element->brand_id))
            <a class="ad-bar-children">
                <img class="ui avatar image" style="width: 10px; height: auto;"
                     src="{{ asset('storage/uploads/images/thumbnail/'.$element->brand->image) }}"/> {{ $element->brandName }}
            </a>
        @endif
        @if(!is_null($element->color_id))
            <a class="ad-bar-children"><i class="icon square" style="color: {{ $element->color->code }};"></i>
                {{ trans('general.color') }}
            </a>
        @endif
        @if(!is_null($element->meta->mileage))
            <a class="ad-bar-children"><i class="wait icon"></i> {{ $element->meta->mileage }} {{ trans("general.km") }}
            </a>
        @endif
        @if(!is_null($element->meta->is_new))
            <a href="#" class="ad-bar-children">
                <i class="tag icon"></i>
                {{ $element->meta->is_new ? trans('general.new') : trans('general.old') }}
            </a>
        @endif
        @if(!is_null($element->meta->manufacturing_year))
            <a href="#" class="ad-bar-children">
                <i class="dot circle icon"></i>
                {{ $element->meta->manufacturing_year }}
            </a>
        @endif
        @if(!is_null($element->meta->is_automatic))
            <a href="#" class="ad-bar-children">
                <i class="settings icon"></i>
                {{ trans('general.gear_type') }}
                {{ $element->meta->is_automatic ? trans('general.automatic') : trans('general.manual')}}
            </a>
        @endif
        @if(!is_null($element->meta->room_no))
            <a href="#" class="ad-bar-children">
                <i class="dot circle  icon"></i>
                {{ trans('general.room_no') }}
                {{ $element->meta->room_no }}
            </a>
        @endif
        @if(!is_null($element->meta->floor_no))
            <a href="#" class="ad-bar-children">
                <i class="dot circle  icon"></i>
                {{ trans('general.floor_no') }}
                {{ $element->meta->floor_no }}
            </a>
        @endif
        @if(!is_null($element->meta->bathroom_no))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ trans("general.bathroom_no") }}
                {{ $element->meta->bathroom_no }}
            </a>
        @endif
        @if(!is_null($element->meta->rent_type))
            <a href="#" class="ad-bar-children">
                <i class="icon dot circle"></i>
                {{ trans('general.rent_type') }}
                {{ $element->meta->rent_type }}
            </a>
        @endif
        @if(!is_null($element->meta->building_age))
            <a href="#" class="ad-bar-children">
                <i class="icon dot circle"></i>
                {{ trans('general.building_age') }}
                {{ $element->meta->building_age }}
            </a>
        @endif
        @if(!is_null($element->meta->furnished))
            <a href="#" class="ad-bar-children">
                <i class="icon dot circle"></i>
                {{ trans("general.is_furnished") }}
                {{ $element->meta->furnished ? trans('general.furnished') : trans('general.not_furnished') }}
            </a>
        @endif
        @if(!is_null($element->meta->space))
            <a href="#" class="ad-bar-children">
                <i class="icon dot circle"></i>
                {{ trans('general.space') }}
                {{ $element->meta->space }}
            </a>
        @endif
        @if(!is_null($element->meta->address))
            <a href="#" class="">
                <i class="icon dot circle"></i>
                {{ trans('general.address') }}
                {{ $element->meta->address }}
            </a>
        @endif
    </div>
</div>