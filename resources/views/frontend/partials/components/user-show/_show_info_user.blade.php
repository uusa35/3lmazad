<div class="ui grid center">
    <div class="sixteen wide center column">
        <div class="ui items">
            <div class="item">
                <div class="ui small image">
                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->avatar) }}">
                </div>
                <div class="content">
                    <h3>{{ $element->name }}</h3>
                    <div class="meta">
                        @if($element->is_email_visible)
                            <p>
                                <span class="date"><strong>{{ trans('general.email')}} :</strong></span>
                                <span class="date">{{  $element->email }}</span>
                            </p>
                        @endif
                        @if($element->is_mobile_visible)
                            @if(!is_null($element->mobile))
                                <p>
                                    <span class="date"><strong>{{ trans('general.mobile')}} :</strong></span>
                                    <span class="date">{{  $element->mobile }}</span>
                                </p>
                            @endif
                        @endif
                        <p>
                            <span class="date"><strong>{{ trans('general.area')}} :</strong></span>
                            <span class="date">{{  $element->areaName }}</span>
                        </p>
                        <p>
                            <span class="date"><strong>{{ trans('general.account_type')}} :</strong></span>
                            <span class="date">{{  $element->isMerchant ? trans('general.merchant') : trans('general.user') }}</span>
                        </p>
                    </div>
                    <div class="description">
                        <p>{{ $element->description }}</p>
                    </div>
                    <div class="description col-lg-2 col-lg-push-10">
                        <a href="{{ route('user.ads',$element->id) }}"
                           class="btn btn--wd">{{ trans('general.user_ads') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>