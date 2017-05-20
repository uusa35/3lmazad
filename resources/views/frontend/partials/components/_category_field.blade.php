<div class="ui dropdown category button search-dropdown search-dropdown-category" id="category">
    <input name="cat" id="cat_input" value="0" type="hidden">
    <i class="icon filter"></i>
    <div class="default text">{{ trans('general.filter_by_category') }}</div>
    <i class="angle {{ app()->isLocal('ar') ? 'left' : 'right' }} icon"></i>
    <div class="menu">
        @foreach($categories as $category)
            <div class="item category_type" data-text="{{ $category->name }}" data-value="{{ $category->id }}" type="main">
                <i class="icon {{ $category->icon }}"></i>
                <span class="text">{{ $category->name }}</span>
                <div class="menu">
                    @foreach($category->children as $sub)
                        <div class="item category_type" type="sub" data-text={{ $sub->name }} data-value="{{ $sub->id }}">
                            <i class="icon {{ $sub->icon }}"></i>
                            <span class="text">{{ $sub->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>