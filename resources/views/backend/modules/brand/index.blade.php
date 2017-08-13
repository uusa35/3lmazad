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
                <th>image</th>
                <th>category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>name_ar</th>
                <th>name_en</th>
                <th>image</th>
                <th>category</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name_ar}}</td>
                    <td>{{ $element->name_en}}</td>
                    <td>
                        <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                             class="img-responsive" style="max-width: 120px;" alt="">
                    </td>
                    <td>{{ !is_null($element->category_id) ? $element->category->name : null}}</td>
                    <td>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('backend.brand.edit',$element->id) }}">
                                        <i class="fa fa-fw fa-user"></i>edit</a>
                                </li>
                                <li>
                                    <form method="post" action="{{ route('backend.brand.destroy',$element->id) }}">
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