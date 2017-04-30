<!DOCTYPE html>
<html>
@include('frontend.partials.head')
<body>

@include('frontend.partials._loading')
@include('frontend.partials._modal_search')
@include('frontend.partials.components.modals._quick-view')


@section('wrapper')
    <div class="wrapper">
        @section('header')
            @include('frontend.partials.header')
        @show
        <div id="pageContent" class="page-content">
            <div class="col-lg-12">
                @include('frontend.partials.notifications')
                @section('content')
                    <section class="content top-padding">
                        <div class="container">
                            @section('top')
                            @show
                        </div>
                    </section>
                    <section class="content top-null">
                        <div class="container">
                            @section('middle')
                            @show
                        </div>
                    </section>
                @section('bottom')
                @show
                @show
            </div>
        </div>
        @section('footer')
            @include('frontend.partials.footer')
        @show
    </div>
    {{--@include('frontend.partials._compare')--}}
    @show
            <!-- Scripts -->
    @if(auth()->check())
        <div id="_element" class="hidden">{{ $token }}</div>
    @endif
@section('scripts')
    @include('frontend.partials.scripts')
@show
</body>
</html>
