@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="userTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Active</th>
                <th>Featured</th>
                <th>Type</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Active</th>
                <th>Featured</th>
                <th>Type</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name }}</td>
                    <td>
                        <span class="label {{ $element->active ? 'label-success' : 'label-danger' }}">{{ $element->active  ? 'active' : 'N/A'}}</span>
                    </td>
                    <td>
                        <span class="label {{ $element->featured ? 'label-success' : 'label-danger' }}">{{ $element->featured  ? 'featured' : 'N/A'}}</span>
                    </td>
                    <td>
                        @if(!$element->roles->isEmpty())
                            <span class="label label-info">{{ $element->roles->first()->name }}</span>
                        @else
                            <span class="label label-warning">N/A</span>
                        @endif
                    </td>
                    <td>{{ $element->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                @if($element->active)
                                    <li>
                                        <a href="{{ route('backend.user.deactivate',$element->id) }}">
                                            <i class="fa fa-fw fa-times"></i> De-activate</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('backend.user.activate',$element->id) }}">
                                            <i class="fa fa-fw fa-check-circle"></i> Activate</a>
                                    </li>
                                @endif
                                <li class="divider"></li>
                                @if($element->featured)
                                    <li>
                                        <a href="{{ route('backend.user.feature.disable',$element->id) }}">
                                            <i class="fa fa-fw fa-times-circle fa-red"></i> disable featured</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('backend.user.feature.enable',$element->id) }}">
                                            <i class="fa fa-fw fa-check"></i> enable featured</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection