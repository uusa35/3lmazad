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
                <div class="ui top attached button">Button before grid</div>
                <div class="ui grid center">
                    <div class="sixteen wide column"></div>
                    <div class="five wide center column">
                        <div class="ui items">
                            <div class="item">
                                <div class="ui small image">
                                    <img src="http://placehold.it/200x200">
                                </div>
                                <div class="content">
                                    <div class="header">
                                        {{ $element->name }}
                                    </div>
                                    <div class="meta">
                                        <span class="price">{{ trans('general.memeber_from') .':'. $element->fromDate }}</span>
                                        <span class="stay">{{ trans('general.email') .':'. $element->email }}</span>
                                    </div>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                    <div class="extra">
                                        <div class="ui left mini floated button">
                                            <i class="right chevron icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="eleven wide column">
                        <div class="outer">
                            <div class="products-grid products-listing products-col products-isotope four-in-row">


                                <div class="extra">
                                    <div class="account-btns">
                                        <a class="ui default button tooltip-message" href="#"
                                           data-tooltip="{{ trans('message.settings') }}" data-inverted="">
                                            <i class="right settings icon big"
                                               style="margin: 30px; display: block; clear:both;"></i>
                                            {{ trans('general.settings') }}
                                        </a>
                                        <a class="ui red button tooltip-message"
                                           href="{{ route('favorite.index') }}"
                                           data-tooltip="{{ trans('message.wishlist') }}" data-inverted="">
                                            <i class="right outline heart icon big"
                                               style="margin: 30px; display: block; clear:both;"></i>
                                            {{ trans('general.wishlist') }}
                                        </a>
                                        <a class="ui pink button tooltip-message" href="#"
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