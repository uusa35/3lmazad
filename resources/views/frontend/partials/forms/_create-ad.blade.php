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
                           class="control-label col-sm-3">{{ trans('general.title') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="title" value="{{ old('title') }}"
                               placeholder="{{ trans('general.title') }}" type="text"
                               required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="file"
                           class="control-label col-sm-3">{{ trans('general.image') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="image[]" placeholder="image" type="file" required multiple/>
                        <p class="help-block">Best Fit 800 x 1000</p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="body"
                           class="control-label col-sm-3">{{ trans('general.description') }}</label>
                    <div class="col-sm-9">
                <textarea class="form-control" name="description" placeholder="Text Maximum 500 words" maxlength="500"
                          required>{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <label for="price"
                           class="control-label col-sm-3">{{ trans('general.price') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="price" value="{{ old('price') }}"
                               placeholder="{{ trans('general.price') }}" type="number"
                               required maxlength="4">
                    </div>
                </div>
            </div>

            @include('frontend.partials.components.search-fields._categories-dropdown')

            @foreach($categories as $category)
                <div class="col-lg-12 hidden" id="fields-{{ $category->id }}">
                    @foreach($category->form->fields as $field)
                        @if($field->isMultiple)
                            @if(!$field->options->isEmpty() && !$field->is_modal)
                                @include('frontend.partials.components.fields.'.$field->type,['elements' => $field->options])
                            @elseif($field->is_modal)
                                @if(count($category[$field->group]) > 1)
                                    @include('frontend.partials.components.fields.'.$field->type,['elements' => $category[$field->group]])
                                @else
                                    @include('frontend.partials.components.fields.'.$field->type)
                                @endif
                            @endif
                        @else
                            @include('frontend.partials.components.fields.'.$field->type)
                        @endif
                    @endforeach
                </div>
            @endforeach

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="area_id" class="control-label col-sm-3">{{ trans('general.area') }}</label>
                    <div class="col-sm-9">
                        <select id="area_id" name="area_id" class="form-control">
                            <option value="area">{{ trans('general.area') }}</option>
                            @foreach($allAreas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="address"
                           class="control-label col-sm-3">{{ title_case('address') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="address" value="{{ old('address') }}"
                               placeholder="{{ trans('general.address') }}" type="text">
                    </div>
                </div>
            </div>
            <!-- Button http://getbootstrap.com/css/#buttons -->
            @include('frontend.partials.forms._btn-group')

        </form>
    </div>
</div>