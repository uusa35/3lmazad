<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <title>{{ trans('general.app_name') }}</title>
    <meta name="keywords" content="{{ trans('general.app_keywords') }}"/>
    <meta name="description" content="{{ trans('general.app_description') }}">
    <meta name="author" content="{{ trans('general.app_author') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.ico') }}"/>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
