@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('account.user',$element) !!}
@endsection

@section('top')
    <section class="content top-null">
        <div class="container">
            <div class="divider divider-xs"></div>
            <div class="filters-row">
                <div class="ui grid" style="border: 1px solid lightgrey; border-radius: 10px;">
                    <div class="seven wide center column">
                        <div class="ui items">
                            <div class="item">
                                <div class="ui small image">
                                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->avatar) }}">
                                </div>
                                <div class="content">
                                    <h3>{{ trans('general.my_account') }} : {{ $element->name }}</h3>
                                    <div class="extra">
                                        <a href="{{ route('user.edit',$element->id) }}"
                                           class="ui mini floated button {{ app()->isLocale('ar') ? 'pull-left' : 'pull-right' }}">
                                            <i class="edit icon"></i> {{ trans('general.edit') }}
                                        </a>
                                    </div>
                                    <div class="meta">
                                        <p>
                                            <span class="date">{{ trans('general.member_from')}} :</span>
                                            <span class="date">{{  $element->createdDate }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.email')}} :</span>
                                            <span class="date">{{  $element->email }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.mobile')}} :</span>
                                            <span class="date">{{  $element->mobile }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.account_type')}} :</span>
                                            <span class="date">{{  $element->isMerchant ? trans('general.merchant') : trans('general.user') }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.area')}} :</span>
                                            <span class="date">{{  $element->areaName }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.country')}} :</span>
                                            <span class="date">{{  $element->countryName }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.category')}} :</span>
                                            <span class="date">{{  $element->group->name }}</span>
                                        </p>
                                        <div class="ui toggle checkbox mobile" data-user-id="{{ $element->id }}">
                                            <label>{{ trans('general.mobile_visible') }}</label>
                                            <input name="mobile"
                                                   type="checkbox" {{ $element->is_mobile_visible ? 'checked' : null }}>
                                        </div>
                                        <div class="ui toggle checkbox email" data-user-id="{{ $element->id }}">
                                            <label>{{ trans('general.email_visible') }}</label>
                                            <input name="email"
                                                   type="checkbox" {{ $element->is_email_visible ? 'checked' : null  }}>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nine wide column">
                        <div class="outer">
                            <div class="products-grid products-listing products-col products-isotope four-in-row">
                                <div class="extra">
                                    <div class="account-btns">
                                        {{--<a class="ui default button tooltip-message" href="#"--}}
                                        {{--data-tooltip="{{ trans('message.settings') }}" data-inverted="">--}}
                                        {{--<i class="right settings icon big"--}}
                                        {{--style="margin: 30px; display: block; clear:both;"></i>--}}
                                        {{--{{ trans('general.settings') }}--}}
                                        {{--</a>--}}
                                        <a class="ui red button tooltip-message"
                                           href="{{ route('favorite.index') }}"
                                           data-tooltip="{{ trans('message.wishlist') }}" data-inverted="">
                                            <i class="right outline heart icon big"
                                               style="margin: 30px; margin-right: auto; margin-left: auto; display: block; clear:both;"></i>
                                            {{ trans('general.wishlist') }}
                                        </a>
                                        <a class="ui pink button tooltip-message"
                                           href="{{ route("user.ads",$element->id) }}"
                                           data-tooltip="{{ trans('message.my_active_ads') }}" data-inverted="">
                                            <i class="right clone icon big"
                                               style="margin: 30px; margin-right: auto; margin-left: auto; display: block; clear:both;"></i>
                                            {{ trans('general.my_active_ads') }}
                                        </a>
                                        <a class="ui olive button tooltip-message"
                                           href="{{ route('account.user.ads') }}"
                                           data-tooltip="{{ trans('message.list_of_all_ads') }}" data-inverted="">
                                            <i class="right arrow icon big"
                                               style="margin: 30px; margin-right: auto; margin-left: auto; display: block; clear:both;"></i>
                                            {{ trans('general.list_of_all_ads') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($element->isMerchant)
                    @include('frontend.partials._profile-gallery')
                @endif
            </div>
        </div>
    </section>
@endsection
