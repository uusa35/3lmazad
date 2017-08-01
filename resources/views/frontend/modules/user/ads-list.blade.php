@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('user.account.ads') !!}
@endsection

@section('top')
    <section class="content content--fill top-null">
        <div class="col-lg-12">
            <h2 class="h-pad-sm text-uppercase text-center">{{ trans('general.edit_user') }}</h2>
            <h6 class="text-uppercase text-center">{{ trans('message.edit_user') }}</h6>
            {{--            @include('frontend.partials.components._steps-process')--}}
            <div class="divider divider--sm"></div>
            <div class="card card--form">
                <div class="divider divider--xs"></div>
                <table id="dataTable" class="table table-striped table-hover table-condensed table-responsive table-high"
                       cellspacing="0" style="font-size: x-small !important;">
                    <thead>
                    <tr>
                        <th>{{ trans('general.id') }}</th>
                        <th>{{ trans('general.image') }}</th>
                        <th>{{ trans('general.title') }}</th>
                        <th>{{ trans('general.price') }}</th>
                        <th>{{ trans('general.is_sold') }}</th>
                        <th>{{ trans('general.expired') }}</th>
                        <th>{{ trans('general.action') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>{{ trans('general.id') }}</th>
                        <th>{{ trans('general.image') }}</th>
                        <th>{{ trans('general.title') }}</th>
                        <th>{{ trans('general.price') }}</th>
                        <th>{{ trans('general.is_sold') }}</th>
                        <th>{{ trans('general.expired') }}</th>
                        <th>{{ trans('general.action') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($elements as $element)
                        <tr class="{{ $element->active ? 'active' : 'danger'}}">
                            <td>{{ $element->id }}</td>
                            <td class="text-center"><img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                                     style="max-width: 90px; height: auto;" alt=""></td>
                            <td class="text-justify">
                                <div style="min-height: 150px; overflow:auto; min-width: 300px; font-size: smaller;">
                                    <a href="{{ route('ad.show',$element->id) }}">{{ str_limit($element->title,35)}}</a>
                                    <hr>
                                    <span style="display: block;">{{ trans('general.category') }}
                                        : {{ $element->categoryName }}</span>
                                    <span style="display: block;">{{ trans('general.created_at') }}
                                        : {{ $element->createdDate }}</span>
                                    <span style="display: block;">{{ trans('general.expires_in') }}
                                        : {{ $element->deals->first()->endDate }}</span>
                                    <span style="display: block; margin-bottom: 10px;">{{ trans('general.active') }} :
                                        <span class="label label-xs label-{{ $element->active ? 'info' : 'danger' }}">
                                        {{ $element->active ? trans('general.active') : trans('general.not_active')}}
                                        </span>
                                     </span>
                                    <span style="display: block;">{{ trans('general.featured') }} :
                                        <span class="label label-xs label-{{ $element->featured ? 'info' : 'warning' }}">
                                        {{ $element->featured ? trans('general.featured') : trans('general.not_featured')}}
                                        </span>
                                     </span>
                                </div>
                            </td>
                            <td>{{ $element->price }}</td>
                            <td>
                                <span class="label label-xs label-{{ $element->is_sold ? 'success' : 'default' }}">{{ $element->is_sold ? trans('general.sold') : trans('general.not_sold')}}</span>
                            </td>
                            <td>
                                <span class="label label-xs label-{{ $element->isExpired ? 'danger' : 'info' }}">{{ $element->isExpired ? trans('general.expired') : trans('general.not_expired')}}</span>
                            </td>
                            <td>
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                            data-toggle="dropdown"> {{ trans('general.actions') }}
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        @if($element->active)
                                            <li>
                                                <a href="{{ route('ad.edit',$element->id) }}">
                                                    <i class="icon edit"></i>{{ trans('general.edit') }}</a>
                                            </li>
                                        @endif
                                        @if($element->isExpired)
                                            <li>
                                                <a href="{{ route('user.account.ad.republish',$element->id) }}">
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

            <div class="divider divider--xl"></div>
        </div>
    </section>
@endsection

