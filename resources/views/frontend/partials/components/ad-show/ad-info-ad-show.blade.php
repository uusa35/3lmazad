<div class="col-lg-12 hidden-xs">
    <div class="ad-bar-details">
        <a class="ad-bar-children"><i class="icon {{ $element->category->icon }}"></i><span
                    class="text-uppercase">{{  $element->categoryName }}</span></a>

        <a class="ad-bar-children"><i class="icon calendar"></i>{{  $element->createdDate }}</a>
        <a class="ad-bar-children"><i class="icon delete calendar"></i>{{  $element->willExpireAt }}</a>
        @if(!is_null($element->brandName))
            <a class="ad-bar-children">
                <img class="ui avatar image" style="width: 10px; height: auto;"
                     src="{{ asset('storage/uploads/images/thumbnail/'.$element->brand->image) }}"/> {{ $element->brandName }}
            </a>
        @endif
        @if(!is_null($element->meta->mileage))
            <a class="ad-bar-children"><i class="save icon"></i> {{ $element->meta->mileage }} {{ trans("general.km") }}
            </a>
        @endif
        @if(!is_null($element->meta->manfacturing_year))
            <a class="ad-bar-children"><i class="upload icon"></i> {{ $element->manufacturing_year }} </a>
        @endif
        @if(!is_null($element->meta->condition))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->condition }}
            </a>
        @endif
        @if(!is_null($element->meta->manufacturing_year))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->manufacturing_year }}
            </a>
        @endif
        @if(!is_null($element->meta->mileage))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->mileage }}
            </a>
        @endif
        @if(!is_null($element->meta->transmission))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->transmission }}
            </a>
        @endif
        @if(!is_null($element->meta->room_no))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->room_no }}
            </a>
        @endif
        @if(!is_null($element->meta->floor_no))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->floor_no }}
            </a>
        @endif
        @if(!is_null($element->meta->bathroom_no))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->bathroom_no }}
            </a>
        @endif
        @if(!is_null($element->meta->rent_type))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->rent_type }}
            </a>
        @endif
        @if(!is_null($element->meta->building_age))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->building_age }}
            </a>
        @endif
        @if(!is_null($element->meta->furnished))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->furnished }}
            </a>
        @endif
        @if(!is_null($element->meta->space))
            <a href="#" class="ad-bar-children">
                <i class="icon save"></i>
                {{ $element->meta->space }}
            </a>
        @endif
        @if(!is_null($element->meta->address))
            <a href="#" class="">
                <i class="icon save"></i>
                {{ $element->meta->address }}
            </a>
        @endif
    </div>
</div>