@extends('frontend.layouts.app')

@section('top')
    <section class="content content--fill top-null">
        <div class="container">
            <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.already_registered') }}</h2>
            <h6 class="text-uppercase text-center">{{ trans('message.already_registered') }}</h6>
            <div class="divider divider--sm"></div>
            <div class="col-md-6 col-md-pull-3 col-sm-6 col-sm-offset-0">
                <div class="card card--form"><a href="#" class="icon card--form__icon">
                        <span class="icon-user-circle"></span>
                    </a>
                    @include('frontend.partials.forms._login')
                    <div class="card--form__footer">
                        <div class="text-center">
                            <a href="{{ url('/password/reset') }}"
                               class="btn btn--wd text-uppercase wave btn-blue">{{ trans('general.forget_ur_password') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider divider--md"></div>
            <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.new_here') }}</h2>
            <div class="divider divider--xs"></div>
            <div class="text-center"><a href="{{ route('register') }}"
                                        class="btn btn--wd text-uppercase wave">{{ trans('general.create_account') }}</a>
            </div>
            <div class="divider divider--md"></div>
        </div>
    </section>
@endsection
