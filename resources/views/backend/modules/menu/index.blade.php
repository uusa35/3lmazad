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
                <th>user id</th>
                <th>active</th>
                <th>services</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>name_ar</th>
                <th>name_en</th>
                <th>user</th>
                <th>active</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name_ar }}</td>
                    <td>{{ $element->user_id }}</td>
                    <td>
                        <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                    </td>
                    <td>
                        <h5>Services : </h5>
                        <ul>
                            @foreach($element->services as $service)
                                <li>{{ $service->name_ar }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn green btn-xs btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <form method="post"
                                          action="{{ route('backend.menu.destroy',$element->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-outline btn-sm red">
                                            <i class="fa fa-remove"></i> delete menu
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ route('backend.activation',['model' => 'menu','id' => $element->id]) }}">
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