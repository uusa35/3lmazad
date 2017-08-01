@extends('backend.layouts.app')

@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Options</span>
            </div>
        </div>
        <div class="portlet-body form">
            <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>name_ar</th>
                    <th>name_en</th>
                    <th>value</th>
                    <th>field_id</th>
                    <th>active</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>name_ar</th>
                    <th>name_en</th>
                    <th>value</th>
                    <th>field_id</th>
                    <th>active</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($elements as $element)
                    <tr>
                        <td>{{ $element->id }}</td>
                        <td>{{ $element->name_ar }}</td>
                        <td>{{ $element->name_en }}</td>
                        <td>{{ $element->value }}</td>
                        <td>{{ $element->fieldName }}</td>
                        <td><span class="label label-lg {{ activeLabel($element->active) }}">active</span></td>
                        <td>{{ $element->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="btn-group pull-right">
                                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                        data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="{{ route('backend.option.edit',$element->id) }}">
                                            <i class="fa fa-fw fa-user"></i>edit</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('backend.activation',['model' => 'option', 'id' => $element]) }}">
                                            <i class="fa fa-fw fa-user"></i>toggle activation</a>
                                    </li>
                                    {{--<li>--}}
                                    {{--<form method="post"--}}
                                    {{--action="{{ route('backend.aboutus.destroy',$element->id) }}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input type="hidden" name="_method" value="delete"/>--}}
                                    {{--<button type="submit" class="btn btn-outline btn-sm red">--}}
                                    {{--<i class="fa fa-remove"></i>delete element--}}
                                    {{--</button>--}}
                                    {{--</form>--}}
                                    {{--</li>--}}

                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection