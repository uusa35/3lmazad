@extends('backend.layouts.app')

@section('styles')
    @parent
    <link rel="stylesheet" href="http://bgrins.github.io/spectrum/spectrum.css">
@endsection

@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Edit Color</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post" action="{{ route('backend.color.update',$element->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name Ar</label>
                        <div class="col-md-10">
                            <input type="text" name="name_ar" value="{{ $element->name_ar }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name En</label>
                        <div class="col-md-10">
                            <input type="text" name="name_en" value="{{ $element->name_en }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="color">color code:
                        </label>
                        <div class="col-md-10">
                            <input type='text' disabled id="colorCode" class="form-control" value="{{ $element->code }}" required/>
                            <input type='color' name="code" id="customColor" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Order</label>
                        <div class="col-md-10">
                            <input type="text" name="order" value="{{ $element->order }}" class="form-control"
                                   placeholder="Enter text" required>
                        </div>
                    </div>

                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="http://bgrins.github.io/spectrum/spectrum.js"></script>
    <script>
        let code = $('#colorCode').attr('value');
        if(code.length > 0) {
            var oldColor = code;
        }
        $("#customColor").spectrum({
            color: oldColor,
            showInput: true,
            className: "full-spectrum",
            showInitial: true,
            showPalette: true,
            showSelectionPalette: true,
            maxSelectionSize: 10,
            preferredFormat: "hex",
            localStorageKey: "spectrum.demo",
            move: function(color) {

            },
            show: function() {

            },
            beforeShow: function() {

            },
            hide: function() {

            },
            change: function(color) {
                $('#colorCode').attr('value', color.toString());
            },
        });
    </script>
@endsection