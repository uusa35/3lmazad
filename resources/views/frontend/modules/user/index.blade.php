@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('user.index') !!}
@endsection

@section('top')
    <section class="content top-null">
        <div class="container">a
            @include('frontend.partials._divider-xs')
            <div class="filters-row">
                {{--@include('frontend.partials._divider-xs')--}}
                <div class="outer">
                    <div class="products-grid products-listing products-col products-isotope four-in-row">
                        <button class="ui icon button">
                            i stopped here {{ i stopped here  }}
                            <i class="right arrow icon massive" style="margin: 50px; display: block; clear:both;"></i>
                            <span style="margin-top :80px"> Next </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection