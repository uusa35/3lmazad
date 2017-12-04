@extends('backend.layouts.app')

@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Edit User</span>
            </div>
        </div>
        <div class="portlet-body form">
            @include('backend.partials.forms._user-create')
        </div>
    </div>
@endsection
