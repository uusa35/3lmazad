<div class="form-group" id="">
    <div class="col-lg-12">
        <label for="category_id" class="control-label col-sm-3">{{ trans("general.category") }}</label>
        <div class="col-sm-9" id="categories">
            <select id="mainCategory" name="main_cat_id" class="form-control">
                <option value="main category">{{ trans('message.choose_main_category') }}</option>
                @foreach($categories->where('parent_id',0) as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group" id="">
    <div class="col-lg-12">
        <label for="category_id" class="control-label col-sm-3">{{ trans("general.sub_category") }}</label>
        <div class="col-sm-9" id="categories">
            <select id="subCategories" name="category_id" class="form-control">
                <option value="null">{{ trans('message.choose_sub_category') }}</option>
            </select>
        </div>
    </div>
</div>