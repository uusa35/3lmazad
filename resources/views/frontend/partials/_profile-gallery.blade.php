<div class="divider divider--sm"></div>
@if($element->gallery->first()->images->count() <= 15 && $element->isOwner)
    <div class="text-center">
        <a class="btn btn--wd" href="{{ route('account.image.create') }}">
            {{ trans('general.ad_more_photo') }}
        </a>
    </div>
    <div class="divider divider--sm"></div>
@endif
<div class="gallery gallery-isotope" id="gallery">
    @if(!$element->gallery->isEmpty() && !$element->gallery->first()->images->isEmpty())
        @foreach($element->gallery->first()->images as $image)
            <div class="gallery__item">
                <div class="gallery__item__image">
                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$image->image) }}" alt=""/>
                    <div class="gallery__item__image__caption">
                        <h6>{{ $image->description }}</h6>
                        @if($element->isOwner)
                            <form action="{{ route('account.image.destroy',$image->id) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <button class="circular ui icon button red" style="opacity: 0.7;" type="submit"
                                        data-tooltip="{{ trans('message.remove_image') }}"
                                        data-inverted="true">
                                    <i class="icon window close" style="color: white;"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                    <a class="btn btn--round" href="{{ asset('storage/uploads/images/large/'.$image->image) }}">
                        <span class="icon icon-search"></span>
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">{{ trans('message.no_gallery') }}</div>
    @endif
</div>
<div class="divider divider--sm"></div>


