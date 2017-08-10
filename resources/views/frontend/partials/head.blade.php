<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta name="keywords" content="{{ config('app.name') }}"/>
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="author" content="{{ config('app.name') }}">
    {{--<link rel="shortcut icon" href="favicon.ico">--}}
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Web Fonts  -->
    @include('frontend.partials.styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'env' => env('APP_ENV')
        ]) !!};
    </script>
</head>