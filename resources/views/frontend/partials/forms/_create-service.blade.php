<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <form class="form-horizontal" method="POST" id=""
              action="{{ route('account.service.store') }}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="menu_id" value="{{ request()->menu_id }}">
            <div class="form-group">
                <div class="col-lg-12">
                    <label for="title"
                           class="control-label col-sm-3">{{ trans('general.name_ar') }}*</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="name_ar" value="{{ old('name_ar') }}"
                               placeholder="{{ trans('general.name_ar') }}" type="text" required
                        >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <label for="title"
                           class="control-label col-sm-3">{{ trans('general.name_en') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="name_en" value="{{ old('name_en') }}"
                               placeholder="{{ trans('general.name_en') }}" type="text"
                        >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="file"
                           class="control-label col-sm-3">{{ trans('general.image') }} 300x300</label>
                    <div class="col-sm-9">
                        <input class="form-control tooltip-message" name="image"
                               placeholder="{{ trans('general.image') }}"
                               data-content="{{ trans('message.image_ad_create') }}"
                               type="file"
                        />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="price"
                           class="control-label col-sm-3">{{ trans('general.price') }}*</label>
                    <div class="col-sm-9">
                        <input class="form-control tooltip-message" name="price" value="{{ old('price') }}"
                               data-content="{!! trans('message.price_ad_create') !!}"
                               placeholder="{{ trans('general.price') }}" type="number"
                               required
                               maxlength="4"
                        >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="phone"
                           class="control-label col-sm-3">{{ trans('general.timing') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control tooltip-message" name="timing" value="{{ old('timing') }}"
                               data-content="{!! trans('message.mobile_ad_create') !!}"
                               placeholder="{{ trans('general.timing') }}"
                               type="text">
                    </div>
                </div>
            </div>

            @include('frontend.partials.forms._btn-group')

        </form>
    </div>
</div>