<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
@include('frontend.partials.head')
<body class="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
@include('frontend.partials._loading')
@include('frontend.partials._modal_search')
@include('frontend.partials.components.modals._quick-view')
<div class="wrapper">
    <div class="row">
        @section('header')
            {{--@include('frontend.partials.header')--}}
        @show
        <div id="pageContent" class="page-content">
            {{--<div class="col-lg-12">--}}
            @include('frontend.partials.notifications')
            @section('content')
            @section('top')
            @show
            @section('middle')
            @show
            @section('bottom')
            @show
            {{--</div>--}}
        </div>
    </div>
</div>
@section('footer')
{{--@include('frontend.partials.footer')--}}
@show
{{--@include('frontend.partials._compare')--}}
        <!-- Scripts -->
@if(auth()->check())
    <div id="_element" class="hidden">{{ $token }}</div>
@endif
@section('scripts')
    @include('frontend.partials.scripts')
@show
</body>
</html>
