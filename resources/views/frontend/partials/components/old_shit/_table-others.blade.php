<table id="{{ $type.'Table' }}" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Body</th>
        <th>Active</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Body</th>
        <th>Active</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    </tfoot>
    <tbody>
    <?php $typeElement = str_plural($type); $elements = $element->$typeElement ?>
    @foreach($elements as $element)
        <tr>
            <td>{{ $element->id }}</td>
            <td><a href="{{ route($type.'.show',$element->id) }}">{{ $element->title }}</a></td>
            <td>{{ str_limit($element->body,30,'..') }}</td>
            <td><span class="label {{ $element->active  ? 'label-success' : 'label-danger'}}">Active Status</span>
            </td>
            <td>{{ $element->created_at->diffForHumans() }}</td>
            <td>
                <div class="dropdown"><a href="#" class="btn btn--wd btn-sm btn-green dropdown-toggle"
                                         data-toggle="dropdown">
                        <span class="icon icon-dots"></span>
                        Action
                    </a>
                    <ul class="dropdown-menu ul-row animated fadeIn" role="menu" style="z-index: 9999;">
                        <li class='li-col list-user-menu'>
                            <ul>
                                <li>
                                    <a href="{{ route($type.'.edit',$element->id).'?item='.$type }}">Edit</a>
                                </li>
                                <li>
                                    <a href="{{ route($type.'.show',$element->id).'?item='.$type }}">View</a>
                                </li>
                                <li>
                                    <form action="{{ route($type.'.destroy',$element->id).'?item='.$type }}"
                                          method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger text-danger">
                                            Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>