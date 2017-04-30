<div class="form-group">
    <div class="col-md-6 pull-left">
        <a href="{{ route('account',['item' => session()->get('item')]) }}" class="btn btn--wd btn-blue">
            skip
        </a>
    </div>
    <div class="col-md-6 pull-right">
        <button type="submit" class="btn btn--wd">
            next
        </button>
    </div>
</div>