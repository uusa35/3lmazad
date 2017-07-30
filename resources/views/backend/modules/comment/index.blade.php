@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="aboutusTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>user</th>
                <th>body</th>
                <th>modal_id</th>
                <th>modal_type</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>user</th>
                <th>body</th>
                <th>modal_id</th>
                <th>modal_type</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->user->name }}</td>
                    <td>{!! $element->body !!}</td>
                    <td>{{ $element->commentable_id }}</td>
                    <td>{{ $element->commentable_type }}</td>
                    <td>{{ $element->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('backend.activation',['modal' => 'user', 'id' => $element->user_id]) }}">
                                        <i class="fa fa-fw fa-user"></i>Deactivate User</a>
                                </li>
                                <li>
                                    <form method="post" action="{{ route('backend.comment.destroy',$element->id) }}"
                                          class="col-lg-12">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-outline btn-sm red">
                                            <i class="fa fa-remove"></i>delete comment
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