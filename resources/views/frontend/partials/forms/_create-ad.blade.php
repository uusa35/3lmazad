<div class="row">
    <div class="col-lg-10 col-lg-push-1">
        <form class="form-horizontal" method="post"
              action="{{ action('Frontend\AdController@store') }}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="parent" id="parentCategory" value="null">
            <!-- Text input http://getbootstrap.com/css/#forms -->
            <div class="form-group">
                <div class="col-lg-12">
                    <label for="title"
                           class="control-label col-sm-3">{{ title_case('title') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="title" placeholder="Add Your Title" type="text"
                               required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="file"
                           class="control-label col-sm-3">{{ title_case('image') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="image[]" placeholder="image" type="file" required/>
                        <p class="help-block">Best Fit 800 x 1000</p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="body"
                           class="control-label col-sm-3">{{ title_case('body') }}</label>
                    <div class="col-sm-9">
                <textarea class="form-control" name="body" placeholder="Text Maximum 500 words" maxlength="500"
                          required></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <label for="price"
                           class="control-label col-sm-3">{{ title_case('price') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="price" placeholder="Add Your Title" type="number"
                               required>
                    </div>
                </div>
            </div>

            @include('frontend.partials.components.search-fields._categories-dropdown')

            @foreach($categories as $category)
                <div class="col-lg-12 hidden" id="fields-{{ $category->id }}">
                    {{--<h1>{{ $category->name.'-'.$category->id }}</h1>--}}
                    @foreach($category->form->fields as $field)
                        @if(view()->exists('frontend.partials.components.ad-create-fields.'.$field->name))
                            @include('frontend.partials.components.ad-create-fields.'.$field->name)
                        @endif
                    @endforeach
                </div>
                @endforeach

                @include('frontend.partials.components.ad-create-fields.area_id')
                @include('frontend.partials.components.ad-create-fields.address')
                        <!-- Button http://getbootstrap.com/css/#buttons -->
                @include('frontend.partials.forms._btn-group')

        </form>
    </div>
</div>