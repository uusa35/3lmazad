@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('account.user.menu.edit',$element) !!}
@endsection

@section('content')
    <section class="content content--fill top-null">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.edit_service') }}</h2>
                    <h6 class="text-uppercase text-center">{{ trans('message.edit_service') }}</h6>
                    {{--            @include('frontend.partials.components._steps-process')--}}
                    <div class="divider divider--sm"></div>
                    <div class="card card--form">
                        <div class="divider divider--xs"></div>
                        @include('frontend.partials.forms._edit-service')
                        <div class="card--form__footer btn--with-icon"><a href="{{ route('account.user') }}">
                                <span class="fa fa-fw fa-arrow-circle-left fa-sm"></span>{{ trans('general.back') }}
                            </a>
                        </div>
                    </div>
                    <div class="divider divider--xl"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
