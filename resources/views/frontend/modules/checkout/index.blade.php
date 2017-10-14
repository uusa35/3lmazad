@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('checkout') !!}
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
                                            <div class="ui grid"
                                                 style="border: 1px solid lightgrey; border-radius: 10px;">
                                                <div class="wide center column">
                                                    <div class="ui items">
                                                        <div class="item">
                                                            <div class="ui small image">
                                                                <img src="{{ asset('storage/uploads/images/thumbnail/'.$user->avatar) }}">
                                                            </div>
                                                            <div class="content">
                                                                <h3>{{ trans('general.my_account') }}
                                                                    : {{ $user->name }}</h3>
                                                                <div class="meta">
                                                                    <p>
                                                                        <span class="date">{{ trans('general.email')}}
                                                                            :</span>
                                                                        <span class="date">{{  $user->email }}</span>
                                                                    </p>
                                                                    <p>
                                                                        <span class="date">{{ trans('general.mobile')}}
                                                                            :</span>
                                                                        <span class="date">{{  $user->mobile }}</span>
                                                                    </p>
                                                                    <p>
                                                                        <span class="date">{{ trans('general.account_type')}}
                                                                            :</span>
                                                                        <span class="date">{{  $user->isMerchant ? trans('general.merchant') : trans('general.user') }}</span>
                                                                    </p>
                                                                    <p>
                                                                        <span class="date">{{ trans('general.area')}}
                                                                            :</span>
                                                                        <span class="date">{{  $user->areaName }}</span>
                                                                    </p>
                                                                    <p>
                                                                        <span class="date">{{ trans('general.country')}}
                                                                            :</span>
                                                                        <span class="date">{{  $user->countryName }}</span>
                                                                    </p>
                                                                    @if($user->isMerchant)
                                                                        <p>
                                                                            <span class="date">{{ trans('general.category')}}
                                                                                :</span>
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
                                    <div class="col-lg-4" style="width: 25% !important">
                                        @include('frontend.partials.components.product_widget-hover',['element' => $product])
                                    </div>
                                    <div class="col-lg-8">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">{{ trans('general.plan_name') }}</th>
                                                <th scope="col">{{ trans('general.plan_price') }}</th>
                                                <th scope="col">{{ trans('general.plan_duration') }}</th>
                                                <th scope="col">{{ trans('general.total') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{ $plan->name }}</td>
                                                <td>{{ $plan->on_sale ? $plan->sale_price : $plan->price }}</td>
                                                <td>{{ $plan->duration }} {{ trans('general.days') }}</td>
                                                <td>{{ session()->get('totalPrice') }} {{ trans('general.kd') }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-checkout" role="tablist">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title"><a role="button" data-toggle="collapse" href="#collapseFour">
                                        {{ trans('general.payment_hints') }}
                                    </a></h4>
                                <div class="panel-heading__number">4.</div>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel">
                                <div class="panel-body">
                                    <p>{{ trans('message.payment_hints') }}</p>
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
                                        {{ trans('message.address_hints') }}
                                    </p>
                                    <hr>
                                    <form class="form-horizontal" method="POST" id=""
                                          action="{{ route('cart.customer') }}"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label for="name"
                                                       class="control-label col-sm-2">{{ trans('general.name') }}
                                                    *</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="name" value="{{ $user->name }}"
                                                           placeholder="{{ trans('general.title') }}" type="text"
                                                           required disabled
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label for="email"
                                                       class="control-label col-sm-2">{{ trans('general.email') }}
                                                    *</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="email" value="{{ $user->email }}"
                                                           placeholder="{{ trans('general.email') }}" type="text"
                                                           required disabled
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <label for="floor"
                                                       class="control-label col-sm-4">{{ trans('general.floor') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="floor" value="{{ old("floor") }}"
                                                           placeholder="{{ trans('general.floor') }}" type="text"
                                                           disabled
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="building"
                                                       class="control-label col-sm-4">{{ trans('general.building') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="building"
                                                           value="{{ old('building') }}"
                                                           placeholder="{{ trans('general.building') }}" type="text"
                                                           disabled
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <label for="street"
                                                       class="control-label col-sm-4">{{ trans('general.street') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="street"
                                                           value="{{ $customer['Street'] }}"
                                                           placeholder="{{ trans('general.street') }}" type="text"
                                                           disabled
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="area"
                                                       class="control-label col-sm-4">{{ trans('general.area') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="area" value="{{ old('area') }}"
                                                           placeholder="{{ trans('general.area') }}" type="text"
                                                           disabled
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <label for="dob"
                                                       class="control-label col-sm-4">{{ trans('general.dob') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="dob" value="{{ old('dob') }}"
                                                           placeholder="{{ trans('general.dob') }}" type="text" disabled
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="apartment"
                                                       class="control-label col-sm-4">{{ trans('general.apartment') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="apartment"
                                                           value="{{ old('apartment') }}"
                                                           placeholder="{{ trans('general.apartment') }}" type="text"
                                                           disabled
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <label for="gender"
                                                       class="control-label col-sm-4">{{ trans('general.gender') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="gender"
                                                           value="{{ old('gender') }}"
                                                           placeholder="{{ trans('general.floor') }}" type="text"
                                                           disabled
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="nationality"
                                                       class="control-label col-sm-4">{{ trans('general.nationality') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="nationality"
                                                           value="{{ old('nationality') }}"
                                                           placeholder="{{ trans('general.nationality') }}" type="text"
                                                           disabled
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <label for="civil_id"
                                                       class="control-label col-sm-4">{{ trans('general.civil_id') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="civil_id"
                                                           value="{{ old('civil_id') }}"
                                                           placeholder="{{ trans('general.civil_id') }}" type="text"
                                                           disabled
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="mobile"
                                                       class="control-label col-sm-4">{{ trans('general.mobile') }}</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="mobile"
                                                           value="{{ $user->mobile }}"
                                                           placeholder="{{ trans('general.mobile') }}" type="text"
                                                           disabled
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider divider--sm"></div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <a href="{{ route('plan.index') }}" class="btn btn--wd btn-red">
                                                    {{ trans('general.back') }}
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{ route('payment.create',['dealId'=> $deal->id]) }}"
                                                   class="btn btn--wd">{{ trans('general.pay') }}</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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