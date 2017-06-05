<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Metronic | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    @section('styles')
        @include('backend.partials.styles')
    @show
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}"/>
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">

@include('backend.partials.nav')

<div class="clearfix"></div>
<div class="page-container">
    @include('backend.partials.sidebar')
    @section('wrapper')
        <div class="page-content-wrapper">
            <div class="page-content">
                {{--@include('backend.partials.breadcrumbs')--}}
                <h3 class="page-title"> Dashboard ::
                    <small>{{ request() ->route()->getName() }}</small>
                </h3>
                <div class="row">
                    <div class="col-lg-12">
                        @include('backend.partials.notifications')
                        @section('content')
                        @show
                    </div>
                </div>
            </div>
        </div>
    @show
</div>

@include('backend.partials.footer')
@section('scripts')
    @include('backend.partials.scripts')
@show
</body>
</html>