@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>abuser name</th>
                <th>abuser id</th>
                <th>reporter name</th>
                <th>reporter id</th>
                <th>ad_id</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>abuser</th>
                <th>reporter</th>
                <th>ad_id</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->abuser->name }}</td>
                    <td>{{ $element->abuser->id }}</td>
                    <td>{{ $element->reporter->name }}</td>
                    <td>{{ $element->reporter->id}}</td>
                    <td>{{ $element->ad_id }}</td>
                    <td>{{ $element->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('backend.activation',['model' => 'ad', 'id' => $element->ad_id]) }}">
                                        <i class="fa fa-fw fa-user"></i>Deactivate Ad</a>
                                </li>
                                <li>
                                    <a href="{{ route('ad.show',$element->ad_id) }}">
                                        <i class="fa fa-fw fa-user"></i>View Ad</a>
                                </li>
                                <li>
                                    <form method="post" action="{{ route('backend.abuse.destroy',$element->id) }}"
                                          class="col-lg-12">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-outline btn-sm red">
                                            <i class="fa fa-remove"></i>delete report
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