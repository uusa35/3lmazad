<div class="form-group" id="">
    <div class="col-lg-12">
        <label for="category_id" class="control-label col-sm-3">{{ trans("general.category") }}*</label>
        <div class="col-sm-9">
            <select id="category-create" name="parent" class="form-control tooltip-message"
                    data-content="{{ trans("message.parent_cat_ad_create") }}">
                <option value="0">{{ trans('message.choose_main_category') }}</option>
                @foreach($categories->where('parent_id',0) as $category)
                    {{ $selected = isset($element) && $element->category->parent()->first()->id && $element->category->parent()->first()->id == $category->id ? 'selected' : null }}
                    <option value="{{ $category->id }}" {{ $selected }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group hidden-xs" id="">
    <div class="col-lg-12">
        <label for="category_id" class="control-label col-sm-3">{{ trans("general.sub_category") }}*</label>
        <div class="col-sm-9">
            <select id="subCategories-create" name="category_id" class="form-control tooltip-message"
                    data-content="{{ trans("message.sub_cat_ad_create") }}">
                <option value="0">{{ trans('message.choose_sub_category') }}</option>
                @if(isset($element))
                    @foreach($element->category->parent->children as $category)
                        {{ $selected = $element->category_id == $category->id ? 'selected' : null }}
                        <option value="{{ $category->id }}" {{ $selected }}>{{ $category->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>