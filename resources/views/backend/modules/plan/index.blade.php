@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>name_ar</th>
                <th>name_en</th>
                <th>duration</th>
                <th>price</th>
                <th>sale_price</th>
                <th>on_sale</th>
                <th>active</th>
                <th>description_ar</th>
                <th>description_en</th>
                <th>is_paid</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>name_ar</th>
                <th>name_en</th>
                <th>duration</th>
                <th>price</th>
                <th>sale_price</th>
                <th>on_sale</th>
                <th>active</th>
                <th>description_ar</th>
                <th>description_en</th>
                <th>is_paid</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name_ar }}</td>
                    <td>{{ $element->name_en }}</td>
                    <td>{{ $element->duration }}</td>
                    <td>{{ $element->price}}</td>
                    <td>{{ $element->sale_price }}</td>
                    <td>
                        <span class="label {{ activeLabel($element->on_sale) }}">{{ activeText($element->on_sale) }}</span>
                    </td>
                    <td>
                        <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                    </td>
                    <td>{{ str_limit($element->description_ar,15,'..') }}</td>
                    <td>{{ str_limit($element->description_en,15,'..') }}</td>
                    <td>
                        <span class="label {{ activeLabel($element->is_paid) }}">{{ activeText($element->is_paid) }}</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn green btn-xs btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('backend.plan.edit',$element->id) }}">
                                        <i class="fa fa-fw fa-check-circle"></i> edit plan</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.activation',['model' => 'plan','id' => $element->id]) }}">
                                        <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection