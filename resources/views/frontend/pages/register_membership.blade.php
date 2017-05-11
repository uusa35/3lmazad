@extends('frontend.layouts.app')

@section('content'))
<div class="col-lg-8 col-lg-push-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                <h1>{{ ucwords(ucwords(trans('general.register_membership'))) }}</h1>
            </div>
        </div>
        <div class="panel-body">
            {{ Form::open(['route' => 'register.membership','method' => 'post', 'class' => 'form-horizontal']) }}
            <div class="form-group">
                <div class="col-lg-4">
                    <label for="name">{{ ucwords(trans('general.name')) }}</label>
                    {{ Form::text('name',null,['class' => 'form-control','required']) }}
                </div>
                <div class="col-lg-3">
                    <label for="country">{{ ucwords(trans('general.country')) }}</label>
                    {{ Form::select('country',config('app.countriesList'),'Kuwait',['class' => 'form-control','required']) }}
                </div>
                <div class="col-lg-4 col-lg-push-1">
                    <label for="email">{{ ucwords(trans('general.email')) }}</label>
                    {{ Form::text('email',null, ['class' => 'form-control','required','email']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                    <label for="address">{{ ucwords(trans('general.address')) }}</label>
                    {{ Form::text('address',null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4">
                    <label for="phone">{{ ucwords(trans('general.phone')) }}</label>
                    {{ Form::text('phone',null, ['class' => 'form-control text-center','required','number', 'placeholder' => '00965 - 0000000']) }}
                </div>
                <div class="col-lg-4">
                    <label for="id">{{ ucwords(trans('general.id')) }}</label>
                    {{ Form::text('id',null, ['class' => 'form-control','required','placeholder' => 'civil Id or Passport No.']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                    <label for="date_attendance">{{ ucwords(trans('general.date_of_attendance')) }}</label>
                    {{ Form::text('date_attendance',null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4">
                    <label for="graduation_year">{{ ucwords(trans('general.graduation_year')) }}</label>
                    {{ Form::text('graduation_year',null, ['class' => 'form-control','required']) }}
                </div>
                <div class="col-lg-4">
                    <label for="training_center">{{ ucwords(trans('general.training_center')) }}</label>
                    {{ Form::text('training_center',null, ['class' => 'form-control','required']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                    <label for="membership_type">{{ ucwords(trans('general.membership_type')) }}</label></br>
                    {{ Form::select('membership_type',[ trans('general.membership_type') ,'IBNLP' => 'IBNLP', 'IBH' => 'IBH'],null, ['class' => 'form-control','id' => 'membership_type']) }}
                </div>
                <div class="col-lg-1" id="IBNLP" style="display: none;">
                    <img src="{{ asset('images/IBNLP_en.png') }}" alt="" class="img-responsive">
                </div>
                <div class="col-lg-1" id="IBH" style="display: none;">
                    <img src="{{ asset('images/IBH_en.png') }}" alt="" class="img-responsive">
                </div>
            </div>
            <div class="form-group col-lg-1 col-lg-push-10">
                {{ Form::submit(ucwords(trans('general.send_info')),['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @parent
    <script type="application/javascript">
        $(document).ready(function () {
            $('#membership_type').on('change', function () {
                var element = $(this).val();
                if (element === 'IBH') {
                    $('#IBH').css('display', 'inline');
                    $('#IBNLP').css('display', 'none');

                }
                else if (element === 'IBNLP') {
                    $('#IBH').css('display', 'none');
                    $('#IBNLP').css('display', 'inline');
                }
                else {
                    $('#IBH').css('display', 'none');
                    $('#IBNLP').css('display', 'none');
                }

            });
        });
    </script>
@endsection