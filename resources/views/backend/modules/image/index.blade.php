@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                {{--<th>is_main</th>--}}
                <th>image</th>
                {{--<th>description_ar</th>--}}
                {{--<th>description_en</th>--}}
                <th>gallery type</th>
                <th>gallery type id</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                {{--<th>is_main</th>--}}
                <th>image</th>
                {{--<th>description_ar</th>--}}
                {{--<th>description_en</th>--}}
                <th>gallery type</th>
                <th>gallery type id</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td><img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}" alt=""
                             style="max-width: 100px; max-height: 100px;" class="img-responsive img-thumbnail"></td>
                    <td>
                        <span class="label label-default">{{ class_basename($element->gallery->galleryable_type) }}</span>
                    </td>
                    <td>{{ $element->gallery_id }}</td>
                    <td>{{ $element->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('backend.activation',['model' => 'gallery', 'id' => $element->id]) }}">
                                        <i class="fa fa-fw fa-user"></i>Deactivate Gallery</a>
                                </li>
                                <li>
                                    <form method="post" action="{{ route('backend.image.destroy',$element->id) }}"
                                          class="col-lg-12">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-outline btn-sm red">
                                            <i class="fa fa-remove"></i>delete image
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