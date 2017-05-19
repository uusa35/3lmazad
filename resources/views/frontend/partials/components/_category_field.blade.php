<div class="ui dropdown button category_search_field" id="category">
    <i class="filter icon"></i>
    <span class="text">{{ trans('general.filter_by_category') }}</span>
    <i class="angle {{ app()->isLocal('ar') ? 'right' : 'left' }} icon"></i>
    <div class="menu">
        <div class="item category" value="1">
            <span class="text">Category 1</span>
        </div>
        <div class="item">
            <i class="folder icon"></i>
            <span class="text">Cars</span>
            <div class="menu">
                <div class="item">
                    <i class="folder icon"></i>
                    <span class="text">Cars For Sale</span>
                </div>
                <div class="item">Item 2B</div>
                <div class="item">Item 2C</div>
            </div>
        </div>
        <div class="item">
            <i class="dropdown icon"></i>
            <span class="text">Category 2</span>
            <div class="menu">
                <div class="item">Item 2A</div>
                <div class="item">Item 2B</div>
                <div class="item">Item 2C</div>
            </div>
        </div>
        <div class="item">
            <i class="dropdown icon"></i>
            <span class="text">Category 3</span>
            <div class="menu">
                <div class="item">Item 3A</div>
                <div class="item">Item 3B</div>
                <div class="item">Item 3C</div>
            </div>
        </div>
    </div>
</div>