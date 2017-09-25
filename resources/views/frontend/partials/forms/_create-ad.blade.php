<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <form class="form-horizontal" method="POST" id="ad_create"
              action="{{ route('ad.store') }}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="parent" id="parentCategory" value="null">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <!-- Text input http://getbootstrap.com/css/#forms -->
            <div class="form-group">
                <div class="col-lg-12">
                    <label for="title"
                           class="control-label col-sm-3">{{ trans('general.title') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="title" value="{{ old('title') }}"
                               placeholder="{{ trans('general.title') }}" type="text" required
                        >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="file"
                           class="control-label col-sm-3">{{ trans('general.image') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control tooltip-message" name="image"
                               placeholder="{{ trans('general.image') }}"
                               data-content="{{ trans('message.image_ad_create') }}"
                               type="file"
                               required
                        />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="file"
                           class="control-label col-sm-3">{{ trans('general.more_images') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control tooltip-message" name="images[]"
                               data-content="{!! trans('message.images_ad_create') !!}"
                               placeholder="images" type="file" multiple/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="body"
                           class="control-label col-sm-3">{{ trans('general.description') }}</label>
                    <div class="col-sm-9">
                <textarea class="form-control tooltip-message" name="description"
                          data-content="{!! trans('message.description_ad_create') !!}"
                          placeholder="{{ trans("general.description_ad_create") }}" maxlength="500"
                          aria-required="true"
                >{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="price"
                           class="control-label col-sm-3">{{ trans('general.price') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control tooltip-message" name="price" value="{{ old('price') }}"
                               data-content="{!! trans('message.price_ad_create') !!}"
                               placeholder="{{ trans('general.price') }}" type="number"
                               maxlength="4"
                        >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <label for="phone"
                           class="control-label col-sm-3">{{ trans('general.mobile') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control tooltip-message" name="mobile" value="{{ old('mobile') }}"
                               data-content="{!! trans('message.mobile_ad_create') !!}"
                               placeholder="{{ trans('general.mobile') }}"
                               type="number"
                               maxlength="10">
                    </div>
                </div>
            </div>

            @include('frontend.partials.components.create-ad-form._categories-dropdown')

            <div id="sub-fields-create">
                @foreach($fields->unique() as $field)
                    @include('frontend.partials.components.create-ad-form.'.$field->type)
                @endforeach
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="area_id" class="control-label col-sm-3">{{ trans('general.area') }}</label>
                    <div class="col-sm-9">
                        <select id="area_id" name="area_id" class="form-control">
                            <option value="">{{ trans('general.area') }}</option>
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
            <div class="col-lg-12">
                <h4>{{ trans('message.make_featured') }}</h4>
                <hr>
            </div>

            @foreach($plans as $plan)
                <div class="form-group">
                    <div class="col-lg-12 tooltip-message" data-content="">
                        <label for="plan_id" class="control-label col-sm-3">
                            {{ $plan->name }}
                        </label>
                        <div class="col-sm-1">
                            <input class="" name="plan_id" value="{{ $plan->id }}"
                                   type="radio" {{ !$plan->is_paid ? 'checked' : null }}>
                        </div>
                        <div class="help-block text-left">
                            {{ $plan->description  }}
                        </div>
                    </div>
                </div>
                @endforeach
                        <!-- Button http://getbootstrap.com/css/#buttons -->
                @include('frontend.partials.forms._btn-group')

        </form>
    </div>
</div>