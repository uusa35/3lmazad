<section class="content content--fill top-null">
    <div class="container">
        <h2 class="h-pad-sm text-uppercase text-center">{{ $heading }}</h2>
        <div class="divider divider--sm"></div>
        <div class="col-lg-12">
            <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
                <div class="card card--form">
                    <div class="divider divider--xs"></div>
                    @include($form)
                    <div class="card--form__footer btn--with-icon"><a
                                href="{{ route('account',['item' => session()->get('item')]) }}">
                            <span class="fa fa-fw fa-arrow-circle-left fa-sm"></span>Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider divider--xl"></div>
    </div>
</section>