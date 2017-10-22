@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('login') !!}
@endsection

@section('content')
    <section class="content content--fill top-null">
        <div class="container">
            <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.login') }}</h2>
            <h6 class="text-uppercase text-center">{{ trans('message.login_form') }}</h6>
            <div class="divider divider--sm"></div>
            <div class="card card--form"><a href="#" class="icon card--form__icon">
                    <span class="icon-user-circle"></span>
                </a>
                @include('frontend.partials.forms._login')
                <div class="card--form__footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <a href="{{ url('/password/reset') }}"
                                       class="btn btn--wd text-uppercase wave btn-blue default-bg-orange">{{ trans('general.forget_ur_password') }}</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <a href="{{ route('register') }}"
                                       class="btn btn--wd text-uppercase wave btn-green default-bg-orange">{{ trans('general.register') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider divider--sm"></div>
            {{--<h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.new_here') }}</h2>--}}
            {{--<div class="divider divider--xs"></div>--}}
            {{--<div class="text-center"><a href="{{ route('register') }}"--}}
            {{--class="btn btn--wd text-uppercase wave">{{ trans('general.create_account') }}</a>--}}
            {{--</div>--}}
            {{--<div class="divider divider--md"></div>--}}
        </div>
    </section>
@endsection
