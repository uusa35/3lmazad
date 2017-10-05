<!-- Header section -->
<header class="header header--sticky header--grey">
    @include('frontend.partials.nav._top')
    @include('frontend.partials.nav._sub')
    @include('frontend.partials.nav._main')
    @section('search')
        @include('frontend.partials.nav._search-row')
    @show
    <div class="col-lg-12 visible-xs text-center">
        <div  class="ui vertical buttons">
            @guest
            <a class="ui button" href="{{ route('login') }}">
                {{ trans('login') }} - {{ trans('general.register') }}
            </a>
            @endguest
            <a class="ui button" href="{{ route('ad.create') }}">
                {{ trans("general.create_ad") }}
            </a>
            <a class="ui button" href="{{ route('user.merchants-groups') }}">
                {{ trans('general.merchants-groups') }}
            </a>
        </div>
    </div>
</header>


