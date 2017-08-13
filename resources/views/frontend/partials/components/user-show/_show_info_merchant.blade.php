<div class="col-lg-12">
    <div class="col-lg-12 text-center">
        <img class="text-center img-responsive img-thumbnail img-rounded"
             src="{{ asset('storage/uploads/images/thumbnail/'.$element->avatar) }}">
    </div>
    <div class="col-lg-12">
        <hr>
        <div class="ui grid center">
            <div class="sixteen wide center column">
                <div class="ui items">
                    <div class="item">
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
                                    @if(!is_null($element->phone))
                                        <p>
                                            <span class="date"><strong>{{ trans('general.phone')}} :</strong></span>
                                            <span class="date">{{  $element->phone }}</span>
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
                                <p>
                                    <span class="date"><strong>{{ trans('general.group')}} :</strong></span>
                                    <span class="date">{{  $element->group->name }}</span>
                                </p>
                                @if(!is_null($element->timing))
                                    <p>
                                        <span class="date"><strong>{{ trans('general.timing')}} :</strong></span>
                                        <span class="date">{{  $element->timing }}</span>
                                    </p>
                                @endif
                                @if(!is_null($element->address))
                                    <p>
                                        <span class="date"><strong>{{ trans('general.address')}} :</strong></span>
                                        <span class="date">{{  $element->address }}</span>
                                    </p>
                                @endif
                                <p>
                                    <span class="date"><strong>{{ trans('general.description')}} :</strong></span>
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
    </div>
</div>