<div class="dropdown"><a href="#" class="btn btn--wd btn-sm btn-green dropdown-toggle"
                         data-toggle="dropdown">
        <span class="icon icon-dots"></span>
        Action
    </a>
    <ul class="dropdown-menu ul-row animated fadeIn" role="menu" style="z-index: 9999;">
        <li class='li-col list-user-menu'>
            <ul>
                <li>
                    <a href="{{ route($subItem.'.edit',['id' => $element->id, 'item_id' => request()->item_id]) }}">edit</a>
                </li>
                <li>
                    <form action="{{ route($subItem.'.destroy',$element->id)}}"
                          method="post">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="item_id" value="{{ request()->item_id}}">
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