<?php $route = request()->route()->getName() ?>
<div class="col-lg-12 text-center">
    <div class="bs-wizard" style="border-bottom:0;">
        <div class="col-xs-4 bs-wizard-step complete">
            <div class="text-center bs-wizard-stepnum">Step 1</div>
            <div class="progress">
                <div class="progress-bar"></div>
            </div>
            <a href="{{ route('user.edit',auth()->user()->id) }}" class="bs-wizard-dot"></a>
            <div class="bs-wizard-info text-center">Register</div>
        </div>
        <div class="col-xs-4 bs-wizard-step complete">
            <div class="text-center bs-wizard-stepnum">Step 2</div>
            <div class="progress">
                <div class="progress-bar"></div>
            </div>
            <a href="{{ route('meta.create') }}" class="bs-wizard-dot"></a>
            <div class="bs-wizard-info text-center">Account Information
            </div>
        </div>


        <div class="col-xs-4 bs-wizard-step complete">
            <div class="text-center bs-wizard-stepnum">Step 3</div>
            <div class="progress">
                <div class="progress-bar"></div>
            </div>
            @if(auth()->user()->is)
                <a href="{{ route('item.create',['']) }}" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">
                    Products & Services
                </div>
            @else
                <a href="{{ route('announcement.create',['item' => 'announcement']) }}" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">
                    Create Announcement
                </div>
            @endif
        </div>
    </div>
</div>
