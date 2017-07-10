@extends('frontend.layouts.app')

@section('top')
    <section class="content content--fill top-null">
        <div class="container">
            <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.edit_user') }}</h2>
            <h6 class="text-uppercase text-center">{{ trans('message.edit_user') }}</h6>
            {{--            @include('frontend.partials.components._steps-process')--}}
            <div class="divider divider--sm"></div>
            <div class="col-md-12">
                <div class="card card--form">
                    <div class="divider divider--xs"></div>
                    <table id="adsTable" class="table table-striped table-hover table-condensed table-responsive"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th style="width: 50%;">{{ trans('general.title') }}</th>
                            <th>{{ trans('general.price') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.featured') }}</th>
                            <th>{{ trans('general.is_sold') }}</th>
                            <th>{{ trans('general.expired') }}</th>
                            <th>{{ trans('general.category_id') }}</th>
                            <th>{{ trans('general.created_at') }}</th>
                            <th>{{ trans('general.end_at') }}</th>
                            <th>{{ trans('general.action') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.title') }}</th>
                            <th>{{ trans('general.price') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.featured') }}</th>
                            <th>{{ trans('general.is_sold') }}</th>
                            <th>{{ trans('general.expired') }}</th>
                            <th>{{ trans('general.category_id') }}</th>
                            <th>{{ trans('general.created_at') }}</th>
                            <th>{{ trans('general.end_at') }}</th>
                            <th>{{ trans('general.action') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr class="{{ $element->active ? 'active' : 'danger'}}">
                                <td>{{ $element->id }}</td>
                                <td><a href="{{ route('ad.show',$element->id) }}">{{ str_limit($element->title,20)}}</a>
                                </td>
                                <td>{{ $element->price }}</td>
                                <td>
                                    <span class="label label-xs label-{{ $element->active ? 'info' : 'danger' }}">{{ $element->active ? trans('general.active') : trans('general.not_active')}}</span>
                                </td>
                                <td>
                                    <span class="label label-xs label-{{ $element->featured ? 'success' : 'default' }}">{{ $element->featured ? trans('general.featured') : trans('general.not_featured')}}</span>
                                </td>
                                <td>
                                    <span class="label label-xs label-{{ $element->is_sold ? 'success' : 'default' }}">{{ $element->is_sold ? trans('general.sold') : trans('general.not_sold')}}</span>
                                </td>
                                <td>
                                    <span class="label label-xs label-{{ $element->isExpired ? 'danger' : 'info' }}">{{ $element->isExpired ? trans('general.expired') : trans('general.not_expired')}}</span>
                                </td>
                                <td>{{ $element->categoryName }}</td>
                                <td>{{ date('Y-m-d') }}</td>
                                <td>{{ $element->endDate }}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> {{ trans('general.actions') }}
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('ad.edit',$element->id) }}">
                                                    <i class="icon edit"></i>{{ trans('general.edit') }}</a>
                                            </li>
                                            @if(!$element->isExpired)
                                                <li>
                                                    <a href="{{ route('user.ad.republish',$element->id) }}">
                                                        <i class="icon refresh"></i>{{ trans('general.republish') }}</a>
                                                </li>
                                            @endif
                                            <li>
                                                <form method="post" action="{{ route('ad.destroy',$element->id) }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <button type="submit" class="btn btn-sm btn-default"
                                                            style="padding: 0px; border: none; width: 100%; text-align: {{ app()->isLocale('ar') ? 'right' : 'left'}};">
                                                        <i class="icon remove"></i>
                                                        {{ trans('general.delete') }}
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
            </div>
            <div class="divider divider--xl"></div>
        </div>
    </section>
@endsection

