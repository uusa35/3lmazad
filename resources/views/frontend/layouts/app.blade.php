<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
@include('frontend.partials.head')
<body class="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
@include('frontend.partials._loading')
@include('frontend.partials._modal_search')
<div class="wrapper">
    <div class="row">
        @section('header')
            @include('frontend.partials.header')
        @show
        <div id="pageContent" class="page-content">
            <div class="col-lg-12">
                @include('frontend.partials.notifications')
                @section('content')
                @section('top')
                @show
                @section('middle')
                @show
                @section('bottom')
                @show
            </div>
        </div>
    </div>
</div>

@section('footer')
    <div class="divider divider--lg"></div>
    <div class="hidden" id="lang">{{ app()->getLocale() }}</div>
    @include('frontend.partials.footer')
    @show
    {{--@include('frontend.partials._compare')--}}
            <!-- Scripts -->
@section('scripts')
    @include('frontend.partials.scripts')
@show
</body>
</html>