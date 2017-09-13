<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}"
              enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">{{ trans('general.name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">{{ trans('general.email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">{{ trans('general.password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm"
                       class="col-md-4 control-label">{{ trans('general.confirm_password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control"
                           name="password_confirmation" required>
                </div>
            </div>


            <div class="form-group hidden">
                <label for="avatar" class="col-md-4 control-label">{{ trans('general.avatar') }}</label>

                <div class="col-md-6">
                    <input id="avatar" type="file" class="form-control" name="avatar">
                </div>
            </div>

            <div class="form-group hidden">
                <label for="area" class="col-md-4 control-label">{{ trans('general.area') }}</label>

                <div class="col-md-6">
                    {{ Form::select('area_id', $areas,0, ['class' => 'form-control','id' => 'area']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">{{ trans('general.mobile') }}</label>

                <div class="col-md-6">
                    <input id="mobile" type="text" class="form-control" name="mobile"
                           value="{{ old('mobile') }}" number autofocus>
                </div>
            </div>

            <div class="form-group hidden">
                <label for="role_id" class="col-md-4 control-label">{{ trans('general.account_type') }}</label>

                <div class="col-md-4">
                    <div class="col-lg-1">
                        <input type="radio" class="" name="is_merchant" value="1" disabled>
                    </div>
                    <div class="col-lg-3">
                        <span>{{ trans('general.merchant') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-lg-1">
                        <input type="radio" class="" name="is_merchant" value="0" checked>
                    </div>
                    <div class="col-lg-3">
                        <span>{{ trans('general.regular_user') }}</span>
                    </div>
                </div>
            </div>

            <div class="form-group hidden merchant-group" id="group-register">
                <label for="category_id" class="control-label col-sm-4">{{ trans('general.choose_group') }}</label>
                <div class="col-sm-6" id="categories">
                    <select name="group_id" class="form-control">
                        <option value="">{{ trans('general.choose_group') }}</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group hidden merchant-group {{ $errors->has('address') ? ' has-error' : '' }}" id="address" >
                <label for="name" class="col-md-4 control-label">{{ trans('general.address') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="address"
                           value="{{ old('address') }}" autofocus>

                    @if ($errors->has('address'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group hidden merchant-group" id="phone">
                <label for="name" class="col-md-4 control-label">{{ trans('general.office_phone') }}</label>

                <div class="col-md-6">
                    <input id="mobile" type="text" class="form-control" name="phone"
                           value="{{ old('phone') }}" number autofocus>
                </div>
            </div>

            <div class="form-group hidden merchant-group {{ $errors->has('timing') ? ' has-error' : '' }}" id="timing" >
                <label for="name" class="col-md-4 control-label">{{ trans('general.timing') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="timing" placeholder="{{ trans('message.timing') }}"
                           value="{{ old('timing') }}" autofocus>

                    <span class="help-block">{{ trans("message.timing") }}</span>
                    @if ($errors->has('timing'))
                        <span class="help-block">{{ trans("message.timing") }}<strong>{{ $errors->first('timing') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="form-group hidden">
                <label for="description" class="col-md-4 control-label">{{ trans('general.brief') }}</label>

                <div class="col-md-6">
            <textarea type="text" class="form-control" name="description" aria-multiline="true"
                      maxlength="1000"></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 pull-right">
                    <button type="submit" class="btn btn--wd">
                        {{ trans('general.register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>