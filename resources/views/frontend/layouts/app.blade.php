<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
@include('frontend.partials.head')
<body>
<div class="container-fluid">
    <div class="wrapper">
        @section('header')
            @include('frontend.partials.header')
        @show
        <div id="pageContent" class="page-content">
            @include('frontend.partials.notifications')
            @section('breadcrumbs')
            @show
            @section('content')
            @show
        </div>
        @include('frontend.partials.components.modals._quick-view')

        @section('footer')
            <div class="divider divider--lg"></div>
            <div class="hidden" id="lang">{{ app()->getLocale() }}</div>
            @include('frontend.partials.footer')
        @show
        @section('scripts')
            @include('frontend.partials.scripts')
        @show
    </div>
    @include('frontend.partials._loading')
    @include('frontend.partials._modal_search')
</div>
</body>
</html>