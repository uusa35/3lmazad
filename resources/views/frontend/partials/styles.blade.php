<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>
<!-- for FF, Chrome, Opera -->
<link rel="icon" type="image/png" href="{{ asset('uploads/sample.png') }}" sizes="16x16"/>
<link rel="icon" type="image/png" href="{{ asset('uploads/sample.png') }}" sizes="32x32"/>
<!-- for IE -->
<link rel="icon" type="image/x-icon" href="{{ asset('uploads/sample.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/sample.png') }}">
<!-- Styles -->
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
<link href="{{ mix('css/custom.css') }}" rel="stylesheet">

@if(app()->getLocale() === 'ar')
<link href="{{ mix('css/custom-arabic.css') }}" rel="stylesheet">
@endif

