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
                <div class="outer">
                    <div class="products-grid products-listing products-col products-isotope four-in-row">
                        <div class="extra">
                            <div class="account-btns">
                                <a class="ui olive button tooltip-message" href="#" data-tooltip="{{ trans('message.something') }}" data-inverted="">
                                    <i class="right arrow icon large" style="margin: 30px; display: block; clear:both;"></i>
                                    Read more
                                </a>
                                <a class="ui olive button tooltip-message" href="#" data-tooltip="{{ trans('message.something') }}" data-inverted="">
                                    <i class="right arrow icon large" style="margin: 30px; display: block; clear:both;"></i>
                                    Read more
                                </a>
                                <a class="ui olive button tooltip-message" href="#" data-tooltip="{{ trans('message.something') }}" data-inverted="">
                                    <i class="right arrow icon large" style="margin: 30px; display: block; clear:both;"></i>
                                    Read more
                                </a>
                                <a class="ui olive button tooltip-message" href="#" data-tooltip="{{ trans('message.something') }}" data-inverted="">
                                    <i class="right arrow icon large" style="margin: 30px; display: block; clear:both;"></i>
                                    Read more
                                </a>
                                <a class="ui olive button tooltip-message" href="#" data-tooltip="{{ trans('message.something') }}" data-inverted="">
                                    <i class="right arrow icon large" style="margin: 30px; display: block; clear:both;"></i>
                                    Read more
                                </a>
                                <a class="ui olive button tooltip-message" href="#" data-tooltip="{{ trans('message.something') }}" data-inverted="">
                                    <i class="right arrow icon large" style="margin: 30px; display: block; clear:both;"></i>
                                    Read more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection