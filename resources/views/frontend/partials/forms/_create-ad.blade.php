<form class="form-horizontal" method="post"
      action="{{ action('Frontend\AdController@store') }}"
      enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="parent" id="parentCategory" value="null">
    <!-- Text input http://getbootstrap.com/css/#forms -->
    <div class="form-group">
        <div class="col-lg-12">
            <label for="title"
                   class="control-label col-sm-2">{{ title_case('title') }}</label>
            <div class="col-sm-5">
                <input class="form-control" name="title" placeholder="Add Your Title" type="text"
                       required>
            </div>
        </div>
    </div>

    @include('frontend.partials.components.fields._categories-dropdown')
    <div class="form-group">
        <div class="col-lg-12">
            <label for="file"
                   class="control-label col-sm-2">{{ title_case('image') }}</label>
            <div class="col-sm-5">
                <input class="form-control" name="image[]" placeholder="image" type="file" required/>
                <p class="help-block">Best Fit 800 x 1000</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-12">
            <label for="body"
                   class="control-label col-sm-2">{{ title_case('body') }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="body" placeholder="Text Maximum 500 words" maxlength="500"
                          required></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <label for="price"
                   class="control-label col-sm-2">{{ title_case('price') }}</label>
            <div class="col-sm-5">
                <input class="form-control" name="price" placeholder="Add Your Title" type="number"
                       required>
            </div>
        </div>
    </div>

    @foreach($categories as $category)
        <div class="col-lg-12 hidden" id="fields-{{ $category->id }}">
            <h1>{{ $category->name.'-'.$category->id }}</h1>
            @foreach($category->form->fields->chunk(4) as $group)
                @foreach($group as $field)
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="{{ $field->name }}"
                                       class="control-label col-sm-3">{{ $field->label }}</label>
                                <div class="col-sm-9">
                                    <input type="{{ $field->type }}" class="form-control" name="{{ $field->name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
        @endforeach

                <!-- Button http://getbootstrap.com/css/#buttons -->
        @include('frontend.partials.forms._btn-group')

</form>