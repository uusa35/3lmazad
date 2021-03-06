<div class="col-sm-12 col-md-3 col-lg-3">
    <h4>{{ trans('general.ad_details') }}</h4>
    <div class="card">
        <div class="card__row">
            <p>
                {{ trans('general.message-ad-show-alert') }}
            </p>
        </div>
        @if($element->isOwner && $element->hasValidFreeDeal)
            <a href="{{ route('plan.index') }}" class="card__row card__row--icon">
                <div class="card__row--icon__icon"><i class="icon star" style="color: goldenrod;"></i></div>
                <div class="card__row--icon__text">
                    <div class="card__row__title">{{ trans('general.make_special') }}</div>
                </div>
            </a>
        @endif
        @if(auth()->check() && $element->isOwner)
            @if($element->user->isMerchant)
                <a href="{{ route('ad.booked',$element->id) }}" class="card__row card__row--icon">
                    <div class="card__row--icon__icon"><i
                                class="icon minus circle {{ !$element->booked ?  'red' : 'green'}}"></i></div>
                    <div class="card__row--icon__text">
                        <div class="card__row__title">{{ $element->booked ? trans('general.unbook') : trans('general.book') }}</div>
                    </div>
                </a>
            @endif
            <a href="{{ route('ad.edit',$element->id) }}" class="card__row card__row--icon">
                <div class="card__row--icon__icon"><i class="icon edit"></i></div>
                <div class="card__row--icon__text">
                    <div class="card__row__title">{{ trans('general.edit') }}</div>
                </div>
            </a>
        @endif
        <a href="{{ route('user.show',$element->user_id) }}" class="card__row card__row--icon">
            <div class="card__row--icon__icon">
                @if(!is_null($element->user->avatar))
                    <img class="img-responsive img-thumbnail" style="max-width: 40px; max-height; 40px;"
                         src="{{ asset('storage/uploads/images/thumbnail/'.$element->user->avatar) }}" alt="">
                @endif
                <div class="card__row--icon__icon"><i class="icon user circle outline"></i></div>
            </div>
            <div class="card__row--icon__text">
                <div class="card__row__title">{{ $element->user->name }}</div>
            </div>
        </a>
        @if(is_null($element->meta->mobile))
            <a href="#" class="card__row card__row--icon">
                <div class="card__row--icon__icon"><i class="icon mobile"></i></div>
                <div class="card__row--icon__text">
                    <div class="card__row__title">{{ $element->user->mobile }}</div>
                </div>
            </a>
        @elseif($element->user->is_mobile_visible)
            <a href="#" class="card__row card__row--icon">
                <div class="card__row--icon__icon"><i class="icon mobile"></i></div>
                <div class="card__row--icon__text">
                    <div class="card__row__title">{{ $element->user->mobile }}</div>
                </div>
            </a>
        @endif
        @if($element->user->is_email_visible)
            <a href="#" class="card__row card__row--icon small">
                <div class="card__row--icon__icon"><i class="icon inbox"></i></div>
                <div class="card__row--icon__text">
                    <div class="">{{ $element->user->email }}</div>
                </div>
            </a>
        @endif
        <a href="{{ route('ad.index',['id' => $element->category_id]) }}" class="card__row card__row--icon">
            <div class="card__row--icon__icon"><i class="icon {{ $element->category->icon }}"></i></div>
            <div class="card__row--icon__text">
                <div class="card__row__title">{{ $element->categoryName }}</div>
            </div>
        </a>
        @if(auth()->check())
            <a class="card__row card__row--icon"
               href={{ route('report.abuse',['ad_id' => $element->id,'abuser_id' => $element->user_id, 'reporter_id' => auth()->user()->id]) }}>
                <div class="card__row--icon__icon"><i class="icon warning sign red"></i></div>
                <div class="card__row--icon__text">
                    <div class="card__row__title">{{ trans('general.report_abuse') }}</div>
                </div>
            </a>
        @endif
        <a class="card__row card__row--icon"
           href="#">
            <div class="card__row--icon__icon"><i class="icon eye"></i></div>
            <div class="card__row--icon__text">
                <div class="card__row__title">{{ trans('general.views_counter') }}   {{ $counter }}</div>
            </div>
        </a>
    </div>
</div>