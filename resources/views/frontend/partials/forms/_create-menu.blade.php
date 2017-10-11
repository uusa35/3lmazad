<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <form class="form-horizontal" method="POST" id=""
              action="{{ route('account.menu.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <!-- Text input http://getbootstrap.com/css/#forms -->
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
                           class="control-label col-sm-3">{{ trans('general.name_en') }}*</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="name_en" value="{{ old('name_en') }}"
                               placeholder="{{ trans('general.name_en') }}" type="text" required
                        >
                    </div>
                </div>
            </div>

            <!-- Button http://getbootstrap.com/css/#buttons -->
            @include('frontend.partials.forms._btn-group')

        </form>
    </div>
</div>