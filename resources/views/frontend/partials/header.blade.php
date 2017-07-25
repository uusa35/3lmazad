<!-- Header section -->
<header class="header header--sticky header--grey">
    @include('frontend.partials.nav._top')
    @include('frontend.partials.nav._sub')
    @include('frontend.partials.nav._main')
    @section('search')
        @include('frontend.partials.nav._search-row')
    @show
</header>


