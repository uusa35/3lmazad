<div class="panel-group" id="sitemap">
    <div class="panel panel-default" role="tablist">
        @foreach($element->menus as $menu)
            @if(!$menu->services->isEmpty())
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title"><a role="button" data-toggle="collapse" href="#menu-{{ $menu->id }}">
                            {{ $menu->name }} </a>
                    </h4>
                </div>
                <div id="menu-{{ $menu->id }}"
                     class="panel-collapse collapse {{ $element->menus->first()->id == $menu->id ? 'in' : null }}"
                     role="tabpanel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col hidden-xs" class="hidden-xs">{{ trans('general.image') }}</th>
                                        <th scope="col">{{ trans('general.service_name') }}</th>
                                        <th scope="col">{{ trans('general.service_time') }}</th>
                                        <th scope="col">{{ trans('general.price') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menu->services as $service)
                                        <tr>
                                            <td class="hidden-xs"><img src="{{ asset('storage/uploads/images/thumbnail/'.$service->image) }}" class="img-responsive" style="max-height: 60px;" alt=""></td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->timing }}</td>
                                            <td>{{ $service->price }} {{ trans('general.kd') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>