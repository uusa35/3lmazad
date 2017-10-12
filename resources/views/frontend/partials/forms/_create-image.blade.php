<div class="row">
    <div class="col-lg-10 col-lg-{{ app()->isLocale('ar') ? 'pull' : 'push' }}-1">
        <form class="form-horizontal" method="POST"
              action="{{ route('account.image.store') }}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="remaining" value="{{ $countImages }}">
            <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
            <!-- Text input http://getbootstrap.com/css/#forms -->
            <div class="form-group">
                <div class="col-lg-12">
                    <label for="file"
                           class="control-label col-sm-3">{{ trans('general.image') }}</label>
                    <div class="col-sm-9">
                        <input class="form-control tooltip-message" name="image"
                               data-content="{!! trans('message.image_create') !!}"
                               placeholder="image" type="file" multiple/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">{{ trans('general.description_ar') }}</label>
                <div class="col-md-9">
                    <input type="text" name="description_ar" value="{{ old('description_ar') }}" class="form-control"
                           placeholder="Enter text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">{{ trans('general.description_en') }}</label>
                <div class="col-md-9">
                    <input type="text" name="description_en" value="{{ old('description_en') }}" class="form-control"
                           placeholder="Enter text">
                </div>
            </div>

            @include('frontend.partials.forms._btn-group')

        </form>
    </div>
</div>