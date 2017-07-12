@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('login') !!}
@endsection


@section('top')
    <section class="content content--fill top-null">
        <div class="container">
            <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.reset_password') }}</h2>
            <h6 class="text-uppercase text-center">{{ trans('message.reset_password') }}</h6>
            {{--@include('frontend.partials.components._steps-process')--}}
            <div class="divider divider--sm"></div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
                    <div class="card card--form">
                        <div class="divider divider--xs"></div>
                        @include('frontend.partials.forms._reset_password')
                        <div class="card--form__footer btn--with-icon"><a href="{{ route('home') }}">
                                <span class="fa fa-fw fa-arrow-circle-left fa-sm"></span>{{ trans('general.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider divider--xl"></div>
        </div>
    </section>
@endsection
