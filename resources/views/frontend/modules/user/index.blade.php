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
                    <div class="six wide center column">
                        <div class="ui card" style="margin-right: auto; margin-left: auto; width: 85%">
                            <div class="image">
                                <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->avatar) }}">
                            </div>
                            <div class="content">
                                <h3>{{ $element->name }}</h3>
                                <div class="meta">
                                    <span class="left floated time"><strong>{{ trans('general.memeber_from') }} :</strong></span>
                                    <span class="right floated time">{{ $element->fromDate }}</span>
                                </div>
                                <div class="description">

                                </div>
                            </div>
                            <div class="extra content">
                                <a href="{{ route('user.edit',$element->id) }}">
                                    <i class="user icon"></i>
                                    {{ trans("general.edit") }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="ten wide column">
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
                                        <a class="ui red button tooltip-message" href="{{ route('favorite.index') }}"
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