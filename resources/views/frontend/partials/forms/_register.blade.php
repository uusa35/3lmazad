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


            <div class="form-group">
                <label for="avatar" class="col-md-4 control-label">{{ trans('general.avatar') }}</label>

                <div class="col-md-6">
                    <input id="avatar" type="file" class="form-control" name="avatar" required>
                </div>
            </div>

            <div class="form-group">
                <label for="area" class="col-md-4 control-label">{{ trans('general.area') }}</label>

                <div class="col-md-6">
                    {{ Form::select('area_id', $areas,0, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">{{ trans('general.mobile') }}</label>

                <div class="col-md-6">
                    <input id="mobile" type="text" class="form-control" name="mobile"
                           value="{{ old('mobile') }}" number autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="role_id" class="col-md-4 control-label">{{ trans('general.account_type') }}</label>

                <div class="col-md-3">
                    <div class="col-lg-1">
                        <input type="radio" class="" name="is_merchant" value="1">
                    </div>
                    <div class="col-lg-2">
                        <span>{{ trans('general.merchant') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-lg-1">
                        <input type="radio" class="" name="is_merchant" value="0" checked>
                    </div>
                    <div class="col-lg-2">
                        <span>{{ trans('general.regular_user') }}</span>
                    </div>
                </div>
            </div>

            <div class="form-group hidden" id="category-register">
                <label for="category_id" class="control-label col-sm-4">Choose Main Category</label>
                <div class="col-sm-6" id="categories">
                    <select name="category_id" class="form-control">
                        <option value="main category">Choose Main Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
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