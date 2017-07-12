@extends('frontend.layouts.app')

@section('top')
    <section class="content content--fill top-null">
        <div class="container">
            <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.create_ad') }}</h2>
            <h6 class="text-uppercase text-center">{{ trans('message.create_ad') }}</h6>
{{--            @include('frontend.partials.components._steps-process')--}}
            <div class="divider divider--sm"></div>
                <div class="col-md-8 col-md-pull-2 col-sm-6 col-sm-pull-3">
                    <div class="card card--form">
                        <div class="divider divider--xs"></div>
                        @include('frontend.partials.forms._create-ad')
                        <div class="card--form__footer btn--with-icon"><a href="{{ route('account') }}">
                                <span class="fa fa-fw fa-arrow-circle-left fa-sm"></span>{{ trans('general.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            <div class="divider divider--xl"></div>
        </div>
    </section>
@endsection
