<div class="gallery gallery-isotope" id="gallery">
    @foreach($element->images as $image)
        <div class="gallery__item">
            <div class="gallery__item__image">
                <img src="{{ asset('storage/uploads/images/thumbnail/'.$image->image) }}" alt=""/>
                <div class="gallery__item__image__caption">
                    <h6>{{ $image->description }}</h6>
                    <form action="{{ route('image.destroy',$image->id) }}" method="delete">
                        {{ csrf_field() }}
                        <button class="btn btn--round btn-red" style="opacity: 0.7;"
                                type="submit" data-tooltip="{{ trans('message.remove_image') }}" data-inverted="true">
                            <span class="icon icon-remove"></span>
                        </button>
                    </form>
                </div>
                <a class="btn btn--round" href="{{ asset('storage/uploads/images/large/'.$image->image) }}">
                    <span class="icon icon-search"></span>
                </a>
            </div>
        </div>
    @endforeach
</div>
<div class="divider divider--sm"></div>
@if($element->images->count() <= 15)
    <div class="text-center"><a class="btn btn--wd view-more-gallery"
                                data-load="gallery-more.html">{{ trans('general.ad_more_photo') }}</a>
    </div>
@endif
<div id="galleryPreload"></div>

