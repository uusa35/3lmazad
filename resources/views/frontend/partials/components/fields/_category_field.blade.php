
<div class="ui floating dropdown category labeled icon button search-dropdown search-dropdown-category" id="category">
    <input name="" id="cat_input" value="0" type="hidden">
    <i class="filter icon"></i>
    <div class="default text">{{ trans('general.filter_by_category') }}</div>
    <div class="menu">
        @foreach($categories as $category)
            <div class="item" id="cat-{{ $category->id  }}" type="parent" parent_id="{{ $category->parent_id }}" parentId="{{ $category->id }}" data-text="{{ $category->name }}" data-value="{{ $category->id }}">
                <i class="icon {{ $category->icon }}"></i>
                <span class="text">{{ $category->name }}</span>
                <div class="menu">
                    @foreach($category->children as $sub)
                        <div class="item" id="cat-{{ $sub->id }}" type="sub" parentId="{{ $sub->parent_id}}" data-text="{{ $sub->name }}" data-value="{{ $sub->id }}">
                            <i class="icon {{ $sub->icon }}"></i>
                            <span class="text">{{ $sub->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>