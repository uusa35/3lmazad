@foreach($elements as $element)
    <div class="product-preview-wrapper">
        <div class="product-preview">
            <div class="product-preview__image">
                @if($element->hasValidDeal)
                    <div class="product-preview__label product-preview__label--right product-preview__label--sale text-center paid">
                        <i class="star icon text-center white icon-tag"></i>
                    </div>
                @endif
                <a href="{{ route('ad.show',$element->id) }}">
                    <img class="img-responsive img-thumbnail img-ad-landescape"
                         src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}" alt=""/>
                </a>
            </div>
            <div class="product-preview__info">
                {{--<div class="product-preview__info__btns">--}}
                {{--<a href="#" class="btn btn--round">--}}
                {{--<span class="icon-ecommerce"></span>--}}
                {{--</a>--}}
                {{--<a href="quick-view.html" class="btn btn--round btn--dark btn-quickview"--}}
                {{--data-toggle="modal"--}}
                {{--data-name="test"--}}
                {{--data-target="#quickView"><span class="icon icon-eye"></span></a>--}}
                {{--</div>--}}
                <div class="product-preview__info__title title-ad">
                    <div style="font-weight: bolder;">
                        <a href="{{ route('ad.show',$element->id) }}">{{ str_limit($element->title,100,'..') }}</a>
                    </div>
                    <div class="price-box__new">{{  $element->price }} {{ trans('general.kd') }}</div>
                </div>
                <hr>
                <div class="product-preview__info__description">
                    <p>{!! str_limit($element->meta->description,300,'...') !!}
                        <a href="{{ route('ad.show',$element->id) }}">..more</a>
                    </p>
                    <div class="ui small basic icon buttons hidden-xs">
                        @if(!is_null($element->brandName))
                            <button class="ui button"><i class="file icon"></i> {{ $element->brandName }}</button>
                        @endif
                        @if(!is_null($element->meta->mileage))
                            <button class="ui button"><i class="save icon"></i> {{ $element->meta->mileage }} {{ trans("general.km") }}</button>
                        @endif
                        <button class="ui button"><i class="upload icon"></i> manufacturing year</button>
                        <button class="ui button"><i class="download icon"></i> test</button>
                    </div>
                </div>
                <div class="product-preview__info__link hidden-xs">
                    <a href="#" class="compare-link">
                        <span class="icon calendar"></span>
                        <span class="product-preview__info__link__text"> {{ $element->created_at->diffForHumans() }}</span>
                    </a>
                    <a href="#">
                        <span class="icon icon-favorite"></span>
                        <span class="product-preview__info__link__text"> {{ $element->categoryName }}</span>
                    </a>
                    @if(auth()->user())
                        <a href="#" class="compare-link">
                            <span class="icon icon-bars"></span>
                            <span class="product-preview__info__link__text"> {{ trans('general.add_to_favorite') }}</span>
                        </a>
                    @endif
                </div>
                <div class="pull-right user-avatar-ad hidden-sm">
                    <a href="#">
                        <img class="ui mini circular image"
                             src="{{ asset('storage/uploads/images/thumbnail/'.$element->user->avatar) }}">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach