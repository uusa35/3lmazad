@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('cart') !!}
@endsection

@section('content')
    <section class="content">
        <div class="container">
            <h2 class="text-uppercase">{{ trans('general.cart') }}</h2>
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="panel-group" id="checkout">
                        <div class="panel panel-checkout" role="tablist">
                            <div class="panel-heading active" role="tab">
                                <h4 class="panel-title"><a role="button" data-toggle="collapse" href="#collapseOne">
                                        {{ trans('general.user_registered') }}
                                    </a></h4>
                                <div class="panel-heading__number">1.</div>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h6 class="text-uppercase" style="margin: 10px;">
                                                <strong>
                                                    {{ trans('message.you_r_registered_with_name') }}
                                                </strong>
                                            </h6>
                                            <div class="ui grid" style="border: 1px solid lightgrey; border-radius: 10px;">
                                                <div class="wide center column">
                                                    <div class="ui items">
                                                        <div class="item">
                                                            <div class="ui small image">
                                                                <img src="{{ asset('storage/uploads/images/thumbnail/'.$user->avatar) }}">
                                                            </div>
                                                            <div class="content">
                                                                <h3>{{ trans('general.my_account') }} : {{ $user->name }}</h3>
                                                                <div class="meta">
                                                                    <p>
                                                                        <span class="date">{{ trans('general.email')}} :</span>
                                                                        <span class="date">{{  $user->email }}</span>
                                                                    </p>
                                                                    <p>
                                                                        <span class="date">{{ trans('general.mobile')}} :</span>
                                                                        <span class="date">{{  $user->mobile }}</span>
                                                                    </p>
                                                                    <p>
                                                                        <span class="date">{{ trans('general.account_type')}} :</span>
                                                                        <span class="date">{{  $user->isMerchant ? trans('general.merchant') : trans('general.user') }}</span>
                                                                    </p>
                                                                    <p>
                                                                        <span class="date">{{ trans('general.area')}} :</span>
                                                                        <span class="date">{{  $user->areaName }}</span>
                                                                    </p>
                                                                    <p>
                                                                        <span class="date">{{ trans('general.country')}} :</span>
                                                                        <span class="date">{{  $user->countryName }}</span>
                                                                    </p>
                                                                    @if($user->isMerchant)
                                                                        <p>
                                                                            <span class="date">{{ trans('general.category')}} :</span>
                                                                            <span class="date">{{  $user->group->name }}</span>
                                                                        </p>
                                                                    @endif
                                                                </div>
                                                                <div class="description">
                                                                    <p></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-checkout" role="tablist">
                            <div class="panel-heading active" role="tab">
                                <h4 class="panel-title"><a role="button" data-toggle="collapse" href="#collapseTwo">
                                        {{ trans('general.billing_information') }}*
                                    </a></h4>
                                <div class="panel-heading__number">2.</div>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel">
                                <div class="panel-body">
                                    <h1>{{ trans('ad_targeted') }}</h1>
                                    <div class="col-lg-6">
                                        <p>
                                            {{ trans('general.payment_plan') }} : {{ $plan->name }}
                                        </p>
                                    </div>
                                    <div class="col-lg-4" style="height: 10% !important">
                                        @include('frontend.partials.components.product_widget-hover',['element' => $product])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-checkout" role="tablist">
                            <div class="panel-heading active" role="tab">
                                <h4 class="panel-title"><a role="button" data-toggle="collapse" href="#collapseThree">
                                    {{ trans('general.billing_information') }}
                                    </a></h4>
                                <div class="panel-heading__number">3.</div>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel">
                                <div class="panel-body">
                                    <p>
                                        Email
                                        Floor
                                        Gender
                                        ID
                                        Mobile
                                        Name
                                        Nationality
                                        Street
                                        Area
                                        CivilID
                                        Building
                                        Apartment
                                        DOB
                                        {{ trans('message.address_hints') }}
                                    </p>
                                    <hr>
                                    <form class="form-horizontal" method="POST" id=""
                                          action="{{ route('cart.customer') }}"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <!-- Text input http://getbootstrap.com/css/#forms -->
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <label for="title"
                                                       class="control-label col-sm-4">{{ trans('general.title') }}*</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="title" value="{{ old('title') }}"
                                                           placeholder="{{ trans('general.title') }}" type="text" required
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="title"
                                                       class="control-label col-sm-4">{{ trans('general.title') }}*</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="title" value="{{ old('title') }}"
                                                           placeholder="{{ trans('general.title') }}" type="text" required
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label for="title"
                                                       class="control-label col-sm-2">{{ trans('general.title') }}*</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="title" value="{{ old('title') }}"
                                                           placeholder="{{ trans('general.title') }}" type="text" required
                                                    >
                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-checkout" role="tablist">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title"><a role="button" data-toggle="collapse" href="#collapseFour">SHIPPING
                                        METHOD</a></h4>
                                <div class="panel-heading__number">4.</div>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel">
                                <div class="panel-body">
                                    <p>Populo concludaturque sit cu, his erat viderer ea. Eum ea enim malorum verterem,
                                        enim perfecto platonem cum no. Hinc corpora id quo, has justo electram
                                        consequuntur ex. Mei detraxit recteque scriptorem in, mei populo tractatos cu,
                                        et mei idque quidam expetenda. Eripuit persequeris ut cum. Ei novum inciderint
                                        his, ex insolens suavitate per. Habemus fuisset quaestio ius cu.</p>
                                    <p>Aliquip facilis reformidans no ius, maiorum evertitur te vix, cu sit causae
                                        vituperata. Id vel nusquam volumus officiis. No vim tota recusabo, sed ei
                                        antiopam praesent. Ut utinam noster delectus vim, ex velit mazim eum. Nam ea
                                        commune convenire, et nam quodsi ullamcorper. </p>
                                </div>
                            </div>
                        </div>
                        <div class="divider divider--sm"></div>
                        @include('frontend.partials.forms._btn-group')
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <h4 class="font1 text-uppercase">{{ trans('checkout_progress') }}</h4>
                    <ul class="category-list">
                        <li><a href="#">{{ trans('general.clear_cart') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection