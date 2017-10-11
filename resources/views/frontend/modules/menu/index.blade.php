@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('account.user.menu') !!}
@endsection

@section('content')
    <section class="content content--fill top-null">
        <div class="col-lg-12">
            <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.edit_menus') }}</h2>
            <div class="divider divider--sm"></div>
            <div class="card card--form">
                <div class="divider divider--xs"></div>
                <div class="col-lg-3 col-lg-offset-9">
                    <a class="ui button" href="{{ route('account.menu.create') }}">
                        {{ trans('general.add_new_menu') }}
                    </a>
                </div>
                <table id="dataTable"
                       class="table table-striped table-hover table-condensed table-responsive table-high"
                       cellspacing="0" style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}; font-size: smaller !important;">
                    <thead>
                    <tr>
                        <th>{{ trans('general.id') }}</th>
                        <th>{{ trans('general.name') }}</th>
                        <th>{{ trans('general.active') }}</th>
                        <th>{{ trans('general.user') }}</th>
                        <th>{{ trans('general.services') }}</th>
                        <th>{{ trans('general.action') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>{{ trans('general.id') }}</th>
                        <th>{{ trans('general.name') }}</th>
                        <th>{{ trans('general.active') }}</th>
                        <th>{{ trans('general.user') }}</th>
                        <th>{{ trans('general.services') }}</th>
                        <th>{{ trans('general.action') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($elements as $element)
                        <tr class="{{ $element->active ? 'active' : 'danger'}}">
                            <td>{{ $element->id }}</td>
                            <td>{{ $element->name }}</td>
                            <td>
                                <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                            </td>
                            <td>{{ $element->user->name }}</td>
                            <td>
                                <ul>
                                    @foreach($element->services as $service)
                                        <li>{{ $service->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm btn-outline dropdown-toggle"
                                            data-toggle="dropdown"> {{ trans('general.actions') }}
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('account.menu.edit',$element->id) }}">
                                                <i class="icon edit"></i>{{ trans('general.edit') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('account.service.index',['menu_id' => $element->id]) }}">
                                                <i class="icon edit"></i>{{ trans('general.service_control') }}</a>
                                        </li>
                                        <li>
                                            <form method="post"
                                                  action="{{ route('account.menu.destroy',$element->id) }}">
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

