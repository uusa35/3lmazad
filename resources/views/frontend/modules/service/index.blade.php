@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('account.user.menu.service') !!}
@endsection

@section('content')
    <section class="content content--fill top-null">
        <div class="col-lg-12">
            <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.edit_menus') }}</h2>
            <div class="divider divider--sm"></div>
            <div class="card card--form">
                <div class="divider divider--xs"></div>
                <div class="col-lg-3 col-lg-offset-9">
                    <a class="ui button" href="{{ route('account.service.create',['menu_id' => request()->menu_id]) }}">
                        {{ trans('general.add_new_menu') }}
                    </a>
                </div>
                <table id="dataTable"
                       class="table table-striped table-hover table-condensed table-responsive table-high"
                       cellspacing="0" style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}; font-size: smaller !important;">
                    <thead>
                    <tr>
                        <th>{{ trans('general.id') }}</th>
                        <th>{{ trans('general.image') }}</th>
                        <th>{{ trans('general.name_ar') }}</th>
                        <th>{{ trans('general.name_en') }}</th>
                        <th>{{ trans('general.price') }}</th>
                        <th>{{ trans('general.timing') }}</th>
                        <th>{{ trans('general.menu_id') }}</th>
                        <th>{{ trans('general.action') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>{{ trans('general.id') }}</th>
                        <th>{{ trans('general.image') }}</th>
                        <th>{{ trans('general.name_ar') }}</th>
                        <th>{{ trans('general.name_en') }}</th>
                        <th>{{ trans('general.price') }}</th>
                        <th>{{ trans('general.timing') }}</th>
                        <th>{{ trans('general.menu_id') }}</th>
                        <th>{{ trans('general.action') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($elements as $element)
                        <tr>
                            <td>{{ $element->id }}</td>
                            <td><img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}" alt="" style="max-height: 50px;"></td>
                            <td>{{ $element->name_ar }}</td>
                            <td>{{ $element->name_en }}</td>
                            <td>{{ $element->price }}</td>
                            <td>{{ $element->timing }}</td>
                            <td>{{ $element->menu->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm btn-outline dropdown-toggle"
                                            data-toggle="dropdown"> {{ trans('general.actions') }}
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('account.service.edit',$element->id) }}">
                                                <i class="icon edit"></i>{{ trans('general.edit') }}</a>
                                        </li>
                                        <li>
                                            <form method="post"
                                                  action="{{ route('account.service.destroy',$element->id) }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="delete"/>
                                                <button type="submit" class="btn btn-outline btn-sm red">
                                                    <i class="fa fa-remove"></i>{{ trans('general.delete') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="card--form__footer btn--with-icon"><a href="{{ route('home') }}">
                        <span class="fa fa-fw fa-arrow-circle-left fa-sm"></span>{{ trans('general.back') }}
                    </a>
                </div>
            </div>

            <div class="divider divider--xl"></div>
        </div>
    </section>
@endsection

