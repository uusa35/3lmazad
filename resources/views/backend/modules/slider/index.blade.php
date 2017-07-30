@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="userTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>title</th>
                <th>url</th>
                <th>order</th>
                <th>image</th>
                <th>active</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>title</th>
                <th>url</th>
                <th>order</th>
                <th>active</th>
                <th>image</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ str_limit($element->title,20,'..') }}</td>
                    <td>
                        {{ str_limit($element->url,20,'..') }}
                    </td>
                    <td>{{ $element->order }}</td>
                    <td>
                        <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}" alt=""
                             class="img-responsive" style="max-height: 80px; max-width:100px;">
                    </td>
                    <td><span class="label {{ $element->active ? 'label-success' : 'label-danger' }}">
                            {{ $element->active ? 'active' : 'N/A' }}
                        </span>
                    </td>
                    <td>{{ $element->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('backend.slider.edit',$element->id) }}">
                                        <i class="fa fa-fw fa-user"></i>edit</a>
                                </li>
                                <li>
                                    <form method="post" action="{{ route('backend.slider.destroy',$element->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-outline btn-sm red">
                                            <i class="fa fa-remove"></i>delete
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