@if(isset($elements))
    <div class="col-lg-10 pull-right">
        <ul class="pagination pull-right">
            {{ $elements->render() }}
        </ul>
    </div>
@endif