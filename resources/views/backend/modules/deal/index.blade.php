@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>ad_id</th>
                <th>price</th>
                <th>duration</th>
                <th>total</th>
                <th>valid</th>
                <th>plan type</th>
                <th>started at</th>
                <th>end at</th>
                <th>reference_id</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>ad_id</th>
                <th>price</th>
                <th>duration</th>
                <th>total</th>
                <th>valid</th>
                <th>plan type</th>
                <th>started at</th>
                <th>end at</th>
                <th>reference_id</th>

            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->ad_id }}</td>
                    <td>{{ $element->price }}</td>
                    <td>{{ $element->duration }}</td>
                    <td>{{ $element->total }}</td>
                    <td>
                        <span class="label {{ activeLabel($element->valid) }}">{{ activeText($element->valid) }}</span>
                    </td>
                    <td><span class="label label-warning">{{ $element->plan->name }}</span></td>
                    <td>{{ $element->startsAt }}</td>
                    <td>{{ $element->endsAt }}</td>
                    <td>{{ $element->reference_id }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection