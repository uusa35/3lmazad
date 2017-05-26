@extends('frontend.layouts.app')

@section('top')
    <section class="content content--fill top-null">
        <div class="container">
            <h2 class="h-pad-sm text-uppercase text-center">Already Registered?</h2>
            <h6 class="text-uppercase text-center">If you have an account with us, please log in.</h6>
            <div class="divider divider--sm"></div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-0">
                    <div class="card card--form"><a href="#" class="icon card--form__icon">
                            <span class="icon-user-circle"></span>
                        </a>
                        @include('frontend.partials.forms._login')
                        <div class="card--form__footer">
                            <div class="text-center"><a href="{{ url('/password/reset') }}"
                                                        class="btn btn--wd text-uppercase wave btn-blue">Forgot Your
                                    Password?</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider divider--md"></div>
            <h2 class="h-pad-sm text-uppercase text-center">New Here?</h2>
            <h6 class="text-uppercase text-center">Registration is free and easy!</h6>
            <div class="divider divider--xs"></div>
            <div class="text-center"><a href="{{ route('register') }}" class="btn btn--wd text-uppercase wave">create an
                    account</a></div>
            <div class="divider divider--md"></div>
        </div>
    </section>
@endsection
