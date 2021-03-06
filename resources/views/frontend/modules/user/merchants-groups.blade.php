@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('user.merchants-groups') !!}
@endsection

@section('content')
    <section class="content top-pad-none nav-submenu hidden-sm">
        <div class="container">
            <div class="alert alert-info">
                {{ trans('message.merchants_message_page') }} <a href="{{ route('contactus') }}">{{ trans('general.contactus') }}</a>
            </div>
            <div class="divider divider--xs"></div>
            <div class="col-lg-12">
                @include('frontend.partials._merchants-groups')
            </div>
        </div>
    </section>
@endsection
