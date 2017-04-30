@extends('backend.layouts.app')

@section('content')
    <div class="col-lg-12 col-lg-push-8" style="padding-bottom: 20px;">
        <a class="btn btn-info" href="{{ url()->previous() }}">back</a>
        <a class="btn btn-info" href="{{ route('backend.category.index',['type' => 0]) }}">Main Categories</a>
    </div>
    <div class="clearfix"></div>
    <div class="portlet-body">
        <table id="userTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Sub Categories</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Sub Categories</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name }}</td>
                    <td>{{ (!is_null($element->parent)) ? $element->parent->name : 'N/A'}}</td>
                    <td>
                        @if(!$element->children->isEmpty())
                            <ul>
                                @foreach($element->children as $child)
                                    <li>{{ $child->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="label label-info">no sub categories</span>
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
                                <li>
                                    <a href="{{ route('backend.category.edit',$element->id) }}">
                                        <i class="fa fa-fw fa-user"></i>edit</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.category.index',['type' => $element->id]) }}">
                                        <i class="fa fa-fw fa-user"></i>view sub-category</a>
                                </li>
                                @if($element->parent_id === 0)
                                    {{--@if($element->parent->name === 'product' || $element->parent->name === 'service')--}}
                                        <li>
                                            <a href="{{ route('backend.category.create',['parent_id' => $element->id]) }}">
                                                <i class="fa fa-fw fa-user"></i>assign sub-category</a>
                                        </li>
                                    {{--@endif--}}
                                @endif
                                <li>
                                    <form method="post" action="{{ route('backend.category.destroy',$element->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-danger">delete</button>
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