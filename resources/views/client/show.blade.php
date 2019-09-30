@extends('layout.template-show')

@section('headerTitle')
    <div class="header-info ui vertical stripe quote segment">
        <div class="ui equal width stackable internally celled grid">
            <div class="center aligned row">
                <div class="column">

                    <a href="{{ url()->previous() }}" class="ui left labeled icon button inverted admin-bp-btn--info button back-to-list" style="position: absolute; left: 0; top: 27px;">
                        <i style="color:#545454!important;" class="color-bg--success left arrow icon color" ></i>
                        @lang('organisation.show.back')
                    </a>

                    <h3>
                        {{$organisation->name}}
                    </h3>
                    <p>
                        @lang('organisation.show.title'){{$organisation->id}}
                    </p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <ul class="header-navigation">
            <li class="navigation-item">
                <a href=# class="navigation-item-link">
                    <i title="" class="  list layout   icon" style="color:var(--main-color);"></i>
                    TODO Navigation 1
                </a>
            <li class="navigation-item">
                <a href=# class="navigation-item-link">
                    <i title="" class="  sign layout   icon" style="color:var(--main-color);"></i>
                    TODO Navigation 2
                </a>
            </li>

        </ul>
    </div>

@endsection

@section('adminContainer')
            <br/>
            <div class="ui clearing segment">
                <div class="d-flex header-status">
                    <span class=" ui orange label">@lang('organisation.show.organisation_activated')Organisation activated</span>
                </div>
                <div class="ui fluid form">
                </div>
            </div>
            <div class="overlay" style=" top: 80px; right: 10px; z-index: 10;">
                <div class="ui labeled icon flex items-center justify-center menu" style="width: 100%; justify-content: center">
                    @if ($organisation_status['organisation'])
                        <div style="border-left: 1px solid #ebebeb;">
                            <a class="item" style="padding: 16px;">
                                <i class="check icon" style="color: #ed712a; font-size: 20px; margin-bottom: 5px;"></i>
                                @lang('organisation.show.check.organisation')
                            </a>
                        </div>
                    @else
                        <div>
                            <a class="item" style="padding: 16px;">
                                <i class="exclamation triangle icon" style="color: #FF0000; font-size: 20px; margin-bottom: 5px;"></i>
                                @lang('organisation.show.check.organisation')
                            </a>
                        </div>
                    @endif

                    @if ($organisation_status['parking'])
                        <div data-tooltip="{{trans('organisation.show.check.parking_ok')}}">
                            <a class="item" style="padding: 16px;" href="{{ route('admin.organisation_creation_steps.step_02_parking', ['organisation' => $organisation])}}">
                                <i class="check icon" style="color: #ed712a; font-size: 20px; margin-bottom: 5px;"></i>
                                @lang('organisation.show.check.parking')
                            </a>
                        </div>
                    @else
                        <div data-tooltip="{{trans('organisation.show.check.parking_ko')}}">
                            <a class="item" style="padding: 16px;" href="{{ route('admin.organisation_creation_steps.step_02_parking', ['organisation' => $organisation])}}">
                                <i class="exclamation triangle icon" style="color: #FF0000; font-size: 20px; margin-bottom: 5px;"></i>
                                @lang('organisation.show.check.parking')
                            </a>
                        </div>
                    @endif

                    @if ($organisation_status['fleetmanager'])
                        <div data-tooltip="{{trans('organisation.show.check.user_ok')}}">
                            <a class="item" style="padding: 16px;" href="{{ route('admin.organisation_creation_steps.step_03_user', ['organisation' => $organisation])}}">
                                <i class="check icon" style="color: #ed712a; font-size: 20px; margin-bottom: 5px;"></i>
                                @lang('organisation.show.check.fleetmanager')
                            </a>
                        </div>
                    @else
                        <div data-tooltip="{{trans('organisation.show.check.user_ko')}}">
                            <a class="item" style="padding: 16px;" href="{{ route('admin.organisation_creation_steps.step_03_user', ['organisation' => $organisation])}}">
                                <i class="exclamation triangle icon" style="color: #FF0000; font-size: 20px; margin-bottom: 5px;"></i>
                                @lang('organisation.show.check.fleetmanager')
                            </a>
                        </div>
                    @endif

                    @if ($organisation_status['access'])
                        <div data-tooltip="{{trans('organisation.show.check.access_ok')}}">
                            <a class="item" style="padding: 16px;" href="{{ route('admin.organisation_creation_steps.step_04_access', ['organisation' => $organisation])}}">
                                <i class="check icon" style="color: #ed712a; font-size: 20px; margin-bottom: 5px;"></i>
                                @lang('organisation.show.check.access')
                            </a>
                        </div>
                    @else
                        <div data-tooltip="{{trans('organisation.show.check.access_ko')}}">
                            <a class="item" style="padding: 16px;"  href="{{ route('admin.organisation_creation_steps.step_04_access', ['organisation' => $organisation])}}">
                                <i class="exclamation triangle icon" style="color: #FF0000; font-size: 20px; margin-bottom: 5px;"></i>
                                @lang('organisation.show.check.access')
                            </a>
                        </div>
                    @endif

                    @if ($organisation_status['gates'])
                        <div data-tooltip="{{trans('organisation.show.check.gate_ok')}}">
                            <a class="item" style="padding: 16px;" href="{{ route('admin.organisation_creation_steps.step_05_gate', ['organisation' => $organisation])}}">
                                <i class="check icon" style="color: #ed712a; font-size: 20px; margin-bottom: 5px;"></i>
                                @lang('organisation.show.check.gates')
                            </a>
                        </div>
                    @else
                        <div data-tooltip="{{trans('organisation.show.check.gate_ko')}}">
                            <a class="item" style="padding: 16px;"  href="{{ route('admin.organisation_creation_steps.step_05_gate', ['organisation' => $organisation])}}">
                                <i class="exclamation triangle icon" style="color: #FF0000; font-size: 20px; margin-bottom: 5px;"></i>
                                @lang('organisation.show.check.gates')
                            </a>
                        </div>
                    @endif



                </div>
            </div>
            <br/>
            <div class="ui stackable two column grid">
                <div class="column">
                    <div class="ui segments">
                        <div class="ui segment">
                            <h2 class="ui header" style="margin: 0;">

                                <i class="star icon" style="color:var(--main-color--light);">
                                </i>

                                <div class="content">
                                    @lang('organisation.show.fleetmanagers')
                                    <div class="sub header">
                                        @lang('organisation.show.organisation_fleetmanagers')
                                    </div>
                                </div>
                            </h2>
                        </div>

                        <div class="ui segment">
                            <div class="ui basic segment">
                                <div class="content">
                                    <table class="ui celled table">
                                        <thead class="full-width">
                                            <tr class="main-head">
                                                <th>@lang('organisation.show.profil_id') </th>
                                                <th>@lang('organisation.show.name')</th>
                                                <th>@lang('organisation.show.parking')</th>
                                                <th style="width: 1px;">@lang('organisation.show.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($profiles as $profile)
                                            <tr>
                                                <td>
                                                    # {{ $profile->id }}
                                                </td>
                                                <td>
                                                    {{ $profile->user->getFullNameAttribute() }}
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach($profile->company_fleet_manager_parking()->get() as $fleet_manager)
                                                            <li>{{$fleet_manager->parking->getName('en')}}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="{{ $url_besaas }}/impersonate?impersonate_email={{ $profile->emailMain->first()->email }}" target="_besaas" class="ui labeled icon button tiny inverted admin-bp-btn--info button ">
                                                        <i class="user icon" style="background-color:#ed702b!important;"> </i> @lang('organisation.show.impersonate')
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui segments">
                        <div class="ui segment">
                            <h2 class="ui header" style="margin: 0;">

                                <i class="product hunt icon" style="color:var(--main-color--light);">
                                </i>

                                <div class="content">
                                    @lang('organisation.show.parkings')
                                    <div class="sub header">
                                        @lang('organisation.show.organisation_parkings')
                                    </div>
                                </div>
                            </h2>
                        </div>
                        <div class="ui segment">
                            <div class="ui basic segment">
                                <div class="content">
                                    <table class="ui celled table">
                                        <thead class="full-width">
                                        <tr class="main-head">
                                            <th>@lang('organisation.show.parking_id') </th>
                                            <th>@lang('organisation.show.parking_name')</th>
                                            <th style=" width: 150px;">@lang('organisation.show.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($organisation->tenants->groupBy('parking_id') as $tenant)
                                            @foreach($tenant->first()->parking->gates as $gate)
                                                @php
                                                    switch ($gate->kind)
                                                    {
                                                        case 'in':
                                                            $gateIn = $gate->id;
                                                        case 'out':
                                                            $gateOut = $gate->id;
                                                        case 'pedestrian':
                                                            $gatePedestrian = $gate->id;
                                                    }
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td rowspan="3">
                                                    # {{ $tenant->first()->parking->id }}
                                                </td>
                                                <td rowspan="3" style="border-right: 1px solid #e8e9e9!important;">
                                                    {{ $tenant->first()->parking->getName('en') }}
                                                </td>
                                                <td class="right aligned" style="border-left: none;">
                                                    <a href="{{ route('admin.parkings.get_open_gate', ['parkings' => $tenant->first()->parking, 'gate' => $gateIn]) }}" class="ui inverted admin-bp-btn--success button small">
                                                        Open IN
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="right aligned">
                                                    <a href="{{ route('admin.parkings.get_open_gate', ['parkings' => $tenant->first()->parking, 'gate' => $gateOut]) }}" class="ui inverted admin-bp-btn--success button small">
                                                        Open OUT
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="right aligned">
                                                    <a href="{{ route('admin.parkings.get_open_gate', ['parkings' => $tenant->first()->parking, 'gate' => $gatePedestrian]) }}" class="ui inverted admin-bp-btn--success button small">
                                                        Open PEDES.
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('javascript_layout')
    @parent
    <script>

    </script>
@endsection
