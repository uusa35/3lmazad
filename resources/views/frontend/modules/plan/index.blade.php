@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('plan') !!}
@endsection

@section('top')
    <section class="content top-null">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-offset-2">
                    <h2 class="title">{{ trans('general.plans_title') }}</h2>
                    <p class="sub-title">{{ trans('message.plans_message') }}</p>
                </div>
                <div class="divider divider--xs"></div>
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($elements as $element)
                            <div class="col-md-3">
                                <div class="table-columns">
                                    <ul class="price">
                                        <li class="header">{{ $element->name }}</li>
                                        <li class="grey price-box__old">{{ $element->price }} {{ trans('general.kwd') }}</li>
                                        @if($element->on_sale)
                                        <li class="blue on-sale price-box__new">{{ $element->sale_price }} {{ trans('general.kwd') }}</li>
                                        @endif
                                        <li>{{ trans('general.duration') }} : {{ $element->duration }} {{ trans('general.days') }}</li>
                                        <li class="grey"><a href="{{ route('plan.create') }}" class="btn btn-info">{{ trans('general.choose') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection