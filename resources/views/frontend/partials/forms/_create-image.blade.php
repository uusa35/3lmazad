<div class="row">
    <div class="col-lg-10 col-lg-{{ app()->isLocale('ar') ? 'pull' : 'push' }}-1">
        <form class="form-horizontal" method="POST"
              action="{{ route('image.store') }}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="remaining" value="{{ $countImages }}">
            <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
            <!-- Text input http://getbootstrap.com/css/#forms -->
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

            @include('frontend.partials.forms._btn-group')

        </form>
    </div>
</div>