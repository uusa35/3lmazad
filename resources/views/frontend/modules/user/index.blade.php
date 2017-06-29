@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('user.index') !!}
@endsection

@section('top')
    <section class="content top-null">
        <div class="container">
            @include('frontend.partials._divider-xs')
            <div class="filters-row">
                {{--@include('frontend.partials._divider-xs')--}}
                <div class="ui top attached button">
                    <h1>{{ trans('general.my_account_control') }}</h1>
                </div>
                <hr>
                <div class="ui grid center">
                    <div class="seven wide center column">
                        <div class="ui items">
                            <div class="item">
                                <div class="ui small image">
                                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->avatar) }}">
                                </div>
                                <div class="content">
                                    <h3>{{ $element->name }}</h3>
                                    <div class="extra">
                                        <a href="{{ route('user.edit',$element->id) }}"
                                           class="ui mini floated button {{ app()->isLocale('ar') ? 'pull-left' : 'pull-right' }}">
                                            <i class="edit icon"></i> {{ trans('general.edit') }}
                                        </a>
                                    </div>
                                    <div class="meta">
                                        <p>
                                            <span class="date">{{ trans('general.member_from')}} :</span>
                                            <span class="date">{{  $element->fromDate }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.email')}} :</span>
                                            <span class="date">{{  $element->email }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.phone')}} :</span>
                                            <span class="date">{{  $element->phone }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.country')}} :</span>
                                            <span class="date">{{  $element->countryName }}</span>
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
                                               style="margin: 30px; display: block; clear:both;"></i>
                                            {{ trans('general.wishlist') }}
                                        </a>
                                        <a class="ui pink button tooltip-message"
                                           href="{{ route("user.show",$element->id) }}"
                                           data-tooltip="{{ trans('message.my_ads') }}" data-inverted="">
                                            <i class="right clone icon big"
                                               style="margin: 30px; display: block; clear:both;"></i>
                                            {{ trans('general.my_ads') }}
                                        </a>
                                        <a class="ui olive button tooltip-message" href="#"
                                           data-tooltip="{{ trans('message.something') }}" data-inverted="">
                                            <i class="right arrow icon big"
                                               style="margin: 30px; display: block; clear:both;"></i>
                                            Read more
                                        </a>
                                        <a class="ui olive button tooltip-message" href="#"
                                           data-tooltip="{{ trans('message.something') }}" data-inverted="">
                                            <i class="right arrow icon big"
                                               style="margin: 30px; display: block; clear:both;"></i>
                                            Read more
                                        </a>
                                        <a class="ui olive button tooltip-message" href="#"
                                           data-tooltip="{{ trans('message.something') }}" data-inverted="">
                                            <i class="right arrow icon big"
                                               style="margin: 30px; display: block; clear:both;"></i>
                                            Read more
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection