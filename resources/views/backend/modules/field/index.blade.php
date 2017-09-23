@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>label_ar</th>
                <th>label_en</th>
                <th>icon</th>
                <th>type</th>
                <th>is_required</th>
                <th>is_modal</th>
                <th>coll_name</th>
                <th>options</th>
                <th>active</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>label_ar</th>
                <th>label_en</th>
                <th>icon</th>
                <th>type</th>
                <th>is_required</th>
                <th>is_modal</th>
                <th>coll_name</th>
                <th>options</th>
                <th>active</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name }}</td>
                    <td>{{ $element->label_ar }}</td>
                    <td>{{ $element->label_en }}</td>
                    <td>{{ $element->icon }}</td>
                    <td>{{ $element->type }}</td>
                    <td>
                        <span class="label {{ activeLabel($element->is_required) }}">R</span>
                    </td>
                    <td>
                        <span class="label {{ activeLabel($element->is_model) }}">M</span>
                    </td>
                    <td>{{ $element->collection_name }}</td>
                    <td>
                        <ul>
                            @foreach($element->options as $option)
                                <li>{{ $option->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <span class="label {{ activeLabel($element->active) }}">active</span>
                    </td>
                    <td>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('backend.field.edit',$element->id) }}">
                                        <i class="fa fa-fw fa-user"></i>edit</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.activation',['model' => 'field', 'id' => $element->id]) }}">
                                        <i class="fa fa-fw fa-user"></i>toggle activation</a>
                                </li>
                                @if(!$element->is_model)
                                    <li>
                                        <a href="{{ route('backend.option.create',['field_id' => $element->id]) }}">
                                            <i class="fa fa-fw fa-plus-cirlce"></i>assign options</a>
                                    </li>
                                @endif
                                <li>
                                    <form method="post" action="{{ route('backend.field.destroy',$element->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-outline btn-sm red">
                                            <i class="fa fa-remove"></i>delete field
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
    </div>
@endsection