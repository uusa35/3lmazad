@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Active</th>
                <th>User Type</th>
                <th>Plan Type</th>
                <th>Created At</th>
                <th>End At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Active</th>
                <th>User Type</th>
                <th>Plan Type</th>
                <th>Created At</th>
                <th>End At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ str_limit($element->title,20) }}</td>
                    <td>
                        <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                    </td>
                    <td><span class="label label-warning">{{ $element->user->type }}</span></td>
                    @if(!$element->deals->isEmpty())
                        <td><span class="label label-default">{{ $element->deals->first()->plan->name }}</span></td>
                    @else
                        <td>no deal</td>
                    @endif
                    <td>{{ $element->created_at->diffForHumans() }}</td>
                    @if(!$element->deals->isEmpty())
                        <td>{{ $element->deals->first()->endsAt }}</td>
                    @else
                        <td>no deal</td>
                    @endif
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn green btn-xs btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('backend.activation',['model' => 'ad','id' => $element->id]) }}">
                                        <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.featured',['model' => 'ad','id' => $element->id]) }}">
                                        <i class="fa fa-fw fa-check-circle"></i> toggle featured</a>
                                </li>
                                <li>
                                    <a href="{{ route('ad.show',$element->id) }}">
                                        <i class="fa fa-fw fa-check-circle"></i> View Ad</a>
                                </li>
                                <li>
                                    <form method="post" action="{{ route('backend.ad.destroy',$element->id) }}"
                                          class="col-lg-12">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-outline btn-sm red">
                                            <i class="fa fa-remove"></i>delete ad
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