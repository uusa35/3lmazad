<div class="row">
    <div class="col-lg-10 col-lg-{{ app()->isLocale('ar') ? 'pull' : 'push' }}-1">
        <form class="form-horizontal" method="POST" id="ad_create"
              action="{{ route('ad.update',$element->id) }}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="panel panel-checkout" role="tablist">
                <div class="panel-heading active" role="tab">
                    <h4 class="panel-title"><a role="button" data-toggle="collapse" href="#collapseOne">
                            {{ trans('general.required_date') }}
                        </a></h4>
                    <div class="panel-heading__number">1.</div>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" name="parent" id="parentCategory" value="null">
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <!-- Text input http://getbootstrap.com/css/#forms -->
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="title"
                                               class="control-label col-sm-3">{{ trans('general.title') }}</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="title" value="{{ $element->title }}"
                                                   placeholder="{{ trans('general.title') }}" type="text"
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
                                                   type="file"/>
                                        </div>
                                    </div>
                                </div>

                                @include('frontend.partials.components.create-ad-form._categories-dropdown')

                                <div id="sub-fields-create">
                                    @foreach($fields->unique() as $field)
                                        @include('frontend.partials.components.create-ad-form.'.$field->type)
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-checkout" role="tablist">
                <div class="panel-heading active" role="tab">
                    <h4 class="panel-title"><a role="button" data-toggle="collapse" href="#collapseTow">
                            {{ trans('general.not_required_date') }}
                        </a></h4>
                    <div class="panel-heading__number">1.</div>
                </div>
                <div id="collapseTow" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">

                                {{--<div class="form-group">--}}
                                    {{--<div class="col-lg-12">--}}
                                        {{--<label for="area_id" class="control-label col-sm-3">{{ trans('general.area') }}--}}
                                            {{--*</label>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<select id="areas" name="area_id" class="form-control">--}}
                                                {{--<option value="">{{ trans('general.area') }}</option>--}}
                                                {{--@foreach($allAreas as $area)--}}
                                                    {{--<option value="{{ $area->id }}" {{ $area->id === $element->area_id ? 'selected' : null }}>{{ $area->name }}</option>--}}
                                                {{--@endforeach--}}

                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<div class="col-lg-12">--}}
                                        {{--<label for="city_id" class="control-label col-sm-3">{{ trans('general.city') }}--}}
                                            {{--*</label>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<select id="cities" name="city_id" class="form-control">--}}
                                                {{--<option value="">{{ trans('general.city') }}</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}


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
                >{{ $element->meta->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="price"
                                               class="control-label col-sm-3">{{ trans('general.price') }}</label>
                                        <div class="col-sm-9">
                                            <input class="form-control tooltip-message" name="price"
                                                   value="{{ round($element->price) }}"
                                                   data-content="{!! trans('message.price_ad_create') !!}"
                                                   placeholder="{{ $element->price }}" type="number"
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
                                            <input class="form-control tooltip-message" name="mobile"
                                                   value="{{ $element->meta->mobile }}"
                                                   data-content="{!! trans('message.mobile_ad_create') !!}"
                                                   placeholder="{{ trans('general.mobile') }}"
                                                   type="number"
                                                   maxlength="10">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="address"
                                               class="control-label col-sm-3">{{ title_case('address') }}</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="address"
                                                   value="{{ $element->meta->address }}"
                                                   placeholder="{{ trans('general.address') }}" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Button http://getbootstrap.com/css/#buttons -->
            @include('frontend.partials.forms._btn-group')

        </form>
    </div>
</div>