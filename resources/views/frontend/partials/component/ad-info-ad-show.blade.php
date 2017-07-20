<div class="col-lg-12 hidden-xs">
    <div class="ad-bar-details">
        <a class="ad-bar-children"><i class="icon {{ $element->category->icon }}"></i><span class="text-uppercase">{{  $element->categoryName }}</span></a>

        <a class="ad-bar-children"><i class="icon calendar"></i>{{  $element->createdDate }}</a>
        <a class="ad-bar-children"><i class="icon calendar"></i>{{  $element->endAt }}</a>
        <a class="ad-bar-children"><i class="icon calendar"></i>{{  $element->endAt }}</a>
        <a class="ad-bar-children"><i class="icon calendar"></i>{{  $element->endAt }}</a>

        @if(!is_null($element->brandName))
            <a class="ad-bar-children"><img class="ui avatar image" style="width: 10px; height: auto;" src="{{ asset('storage/uploads/images/thumbnail/'.$element->brand->image) }}"/> {{ $element->brandName }}</a>
        @endif
        @if(!is_null($element->meta->mileage))
            <a class="ad-bar-children"><i class="save icon"></i> {{ $element->meta->mileage }} {{ trans("general.km") }}
            </a>
        @endif
        @if(!is_null($element->meta->manfacturing_year))
            <a class="ad-bar-children"><i class="upload icon"></i> {{ $element->manufacturing_year }} </a>
        @endif
        <a class="ad-bar-children"><i class="download icon"></i> {{ $element->type->name }}</a>
        <a class="ad-bar-children"><i class="download icon"></i> {{ $element->brand->name }}</a>
        <a class="ad-bar-children"><i class="download icon"></i> {{ $element->model->name }}</a>
    </div>
</div>