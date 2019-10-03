@extends('layout.template-list')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('client.list.title')
        <span style="font-size: 14px;">
         - @lang('client.list.sub_title')
    </span>
    </h2>
@endsection

@section('searchBar')
    <div class="ui fluid form">
        <form method="GET" accept-charset="UTF-8" _lpchecked="1">
            <div class="ui form">
                <div class="five fields">
                    <div class="field">
                        <div class="ui left icon input">
                            <input placeholder={{trans('client.list.search.by_id')}} name="organisation_id" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input placeholder={{trans('client.list.search.by_name')}} name="organisation_name" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="two wide field">
                        <button class="ui primary labeled icon button">
                            <i title="" class="search icon"></i>
                            @lang('client.list.search.search')
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('containerContent')
    <thead class="full-width">
    <tr style="background: #f9fafb;" class="no-sort">
        <th colspan="7" style="background: #f9fafb!important;" class="no-sort">
            <a href="{{ route('admin.organisation_creation_steps.step_01_organisation') }}" class="ui right floated small primary labeled icon button mobile-reset-float">
                <i class="add icon" style="color:white;"></i>
                @lang('client.list.create_new')
            </a>
        </th>
    </tr>
    <tr class="main-head">
        <th style="width: 1px;">#</th>
        <th>@lang('client.list.name')</th>
        <th>@lang('client.list.firstname')</th>
        <th>@lang('client.list.email')</th>
        <th>@lang('client.list.phone')</th>
        <th>@lang('client.list.address')</th>
        <th style="width: 1px;">@lang('organisation.list.action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>
                <a href="{{ route('client.show', $client->id) }}" >
                    # {{ $organisation->id }}
                </a>
            </td>
            <td>{{ $organisation->name }}</td>
            <td data-tooltip="
                        @foreach($organisation->tenants as $tenant)
            {{$tenant->parking->getName('en')}} •
                        @endforeach
                "
            >
                <b style="color:#ed712a;">{{count($client->tenants)}} </b>@lang('client.list.parkings')
            </td>
            <td data-tooltip="
                    @foreach($organisation->fleet_managers as $fleet_manager)
            {{$fleet_manager->user->lastname}} •
                    @endforeach
                "
            >
                <b style="color:#ed712a;">{{count($organisation->fleet_managers)}} </b>@lang('organisation.list.fleet_manager')FleetManager(s)
            </td>
            <td>
                <a href="{{ route('admin.profile.list', ['organisation' => $client->id ]) }}" >
                    {{$client->number_of_users}} @lang('client.list.users')
                </a>
            </td>
            <td>
                @if($organisation->logo_url)
                    <img width="50px" src="{{ $organisation->logo_url }}" alt="logo_{{ $client->name }}">
                @else
                    -
                @endif
            </td>
            <td>
                <a href="{{ route('client.show', $organisation->id) }}" class="ui inverted admin-bp-btn--success button small">
                    @lang('client.list.show')
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot class="full-width">
    <tr>
        <th>
            <div class="ui checkbox js-action-checkbox">
                <label></label>
                <input type="checkbox" class="select-all">
            </div>
        </th>
        <th colspan="10">
            <div class="ui right floated pagination menu floated-pagination">
                {{ $organisations->links('vendor.pagination.semantic-ui') }}
            </div>
        </th>
    </tr>
    </tfoot>
@endsection

@section('javascript_layout')
    @parent
@endsection
