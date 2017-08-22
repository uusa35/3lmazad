<div class="ui floating dropdown category labeled icon button search-dropdown search-dropdown-category tooltip-message"
     data-inverted=""
     data-position="top center"
     data-tooltip="{{ trans('message.category_field') }}"
     id="category">
    <input name="" id="cat_input" value="0" type="hidden">
    <i class="filter icon"></i>
    <div class="default text">{{ trans('general.filter_by_category') }}</div>
    <div class="ui vertical menu">
        @foreach($categories->sortByDesc('order') as $category)
            <div class="item" id="cat-{{ $category->id  }}" data-type="parent"
                 parent_id="{{ $category->parent_id }}"
                 parentId="{{ $category->id }}" data-text="{{ $category->name }}" data-value="{{ $category->id }}">
                <i class="icon {{ $category->icon }}"></i>
                {{ $category->name }}
                @notmobile
                <div class="ui right pointing dropdown menu">
                    @foreach($category->children as $sub)
                        <div class="item" id="cat-{{ $sub->id }}" data-type="sub" parentId="{{ $sub->parent_id}}"
                             data-text="{{ $sub->name }}" data-value="{{ $sub->id }}">
                            <i class="icon {{ $sub->icon }}"></i>
                            <span class="text">{{ $sub->name }}</span>
                        </div>
                    @endforeach
                </div>
                @endnotmobile
            </div>
        @endforeach
    </div>
</div>