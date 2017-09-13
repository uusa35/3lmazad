@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('register') !!}
@endsection

@section('content')
    <section class="content content--fill top-null">
        <div class="container">
            <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.create_new_account') }}</h2>
            {{--<h6 class="text-uppercase text-center">{{ trans('message.create_new_account') }}</h6>--}}
            {{--@include('frontend.partials.components._steps-process')--}}
            <div class="divider divider--sm"></div>
            <div class="card card--form">
                <div class="divider divider--xs"></div>
                @include('frontend.partials.forms._register')
                <div class="card--form__footer btn--with-icon"><a href="{{ route('home') }}">
                        <span class="fa fa-fw fa-arrow-circle-left fa-sm"></span>{{ trans('general.back') }}
                    </a>
                </div>
            </div>
            <div class="divider divider--xl"></div>
        </div>
    </section>
@endsection
