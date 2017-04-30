<div class="col-lg-6">
    <h1>{{ $heading }}</h1>
</div>
<div class="col-lg-6">
    <a class="btn btn--wd pull-right"
       href="{{ route($subItem.'.create',['item_id' => request()->item_id ]) }}">
        <span class="fa fa-fw fa-file-text"></span>{{ $heading }}</a>
    <a class="btn btn--wd pull-right" href="{{ route('account',['item' => session()->get('item')]) }}">
        <span class="fa fa-fw fa-arrow-left"></span>back</a>
</div>