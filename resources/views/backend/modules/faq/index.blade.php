@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>title_ar</th>
                <th>title_en</th>
                <th>description_ar</th>
                <th>description_en</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>title_ar</th>
                <th>title_en</th>
                <th>description_ar</th>
                <th>description_en</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ str_limit($element->title_ar,20,'..') }}</td>
                    <td>{{ str_limit($element->title_en,20,'..') }}</td>
                    <td>
                        {{ str_limit($element->body_ar,50,'..') }}
                    </td>
                    <td>
                        {{ str_limit($element->body_en,50,'..') }}
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
                                    <a href="{{ route('backend.faq.edit',$element->id) }}">
                                        <i class="fa fa-fw fa-user"></i>edit</a>
                                </li>
                                <li>
                                    <form method="post" action="{{ route('backend.faq.destroy',$element->id) }}" class="col-lg-12">
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