@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('user.merchants-categories') !!}
@endsection

@section('top')
    <section class="content top-pad-none nav-submenu hidden-sm">
        <div class="container">
            <div class="divider divider--xs"></div>
            @include('frontend.partials._merchants-categories')
        </div>
    </section>
@endsection
