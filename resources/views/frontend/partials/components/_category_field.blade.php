<div class="ui dropdown category button search-dropdown search-dropdown-category" id="test">
    <input name="category_id" type="hidden">
    <i class="filter icon"></i>
    <div class="default text">{{ trans('general.filter_by_category') }}</div>
    <i class="angle {{ app()->isLocal('ar') ? 'left' : 'right' }} icon"></i>
    <div class="menu">
        @foreach($categories as $category)
            <div class="item" data-text="{{ $category->name }}" data-value="{{ $category->id }}">
                <i class="{{ $category->icon }}icon"></i>
                <span class="text">{{ $category->name }}</span>
                <div class="menu">
                    @foreach($category->children as $sub)
                        <div class="item" data-text="{{ $sub->name }}" data-value="{{ $sub->id }}">
                            <i class="{{ $sub->icon }} icon"></i>
                            <span class="text">{{ $sub->name }}</span>
                        </div>
                        <div class="menu">
                            @foreach($sub->children as $child)
                                <div class="item" data-text="{{ $child->name }}" data-value="{{ $child->id }}">
                                    <i class="icon {{ $child->icon }}"></i>
                                    <span class="text">{{ $child->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>