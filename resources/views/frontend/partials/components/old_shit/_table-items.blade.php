<table id="{{ $type.'Table' }}" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Category</th>
        <th>type</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Category</th>
        <th>type</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($element->items->where('type', $type) as $element)
        <tr>
            <td>{{ $element->id }}</td>
            <td>{{ $element->name }}</td>
            <td>
                @if(!is_null($element->category_id))
                    {{ $element->category->name }}
                @else
                    no cat.
                @endif
            </td>
            <td>
                {{ $element->type }}
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
                                    <a href="{{ route('item.edit',$element->id).'?item='.$type }}">Edit</a>
                                </li>
                                <li>
                                    <a href="{{ route('certificate.index',['item_id' => $element->id,'item' => $type]) }}">Certificates</a>
                                </li>
                                <li>
                                    <a href="{{ route('qualification.index',['item_id' => $element->id,'item' => $type]) }}">Qualifications</a>
                                </li>
                                <li>
                                    <a href="{{ route('experience.index',['item_id' => $element->id,'item' => $type]) }}">Experiences</a>
                                </li>
                                <li>
                                    <a href="{{ route('agency.index',['item_id' => $element->id,'item' => $type]) }}">Agencies</a>
                                </li>
                                <li>
                                    <form action="{{ route('item.destroy',$element->id).'?item='.$type }}"
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