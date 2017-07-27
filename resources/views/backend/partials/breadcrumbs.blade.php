<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Dashboard</span>
        </li>
    </ul>
</div>
<h3 class="page-title title text-capitalize">
    @section('title')
        {{ Route::currentRouteName() }} {{ (!is_null(request()->has('type'))) ? request()->type : null }}
    @show
</h3>