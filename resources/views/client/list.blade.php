@extends('layout.template-list')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('client.list.title')
        <span style="font-size: 14px;">
         - @lang('client.list.subtitle')
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
                            <input placeholder="{{trans('client.list.search.by_id')}}" name="client_id" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input placeholder="{{trans('client.list.search.by_name')}}" name="client_name" type="text" value="">
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
            <a href="{{ route('client.create') }}" class="ui right floated small primary labeled icon button mobile-reset-float">
                <i class="add icon" style="color:white;"></i>
                @lang('client.list.create_new')
            </a>
            <!--
            <a href="{{-- route('client.import') --}}" class="ui right floated small primary labeled icon button mobile-reset-float">
                <i class="add icon" style="color:white;"></i>
                @lang('client.list.import_csv')
            </a>
            -->
        </th>
    </tr>
    <tr class="main-head">
        <th style="width: 1px;">#</th>
        <th>@lang('client.list.name')</th>
        <th>@lang('client.list.firstname')</th>
        <th>@lang('client.list.email')</th>
        <th>@lang('client.list.phone')</th>
        <th>@lang('client.list.address')</th>
        <th style="width: 1px;">@lang('client.list.action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>
                <a href="{{ route('client.show', $client->id) }}" >
                    # {{ $client->id }}
                </a>
            </td>
            <td>{{ $client->name }}</td>
            <td>
                {{ $client->firstname }}
            </td>
            <td>
                {{ $client->email }}
            </td>
            <td>
                {{ $client->phone }}
            </td>
            <td>
                {{ $client->address ? $client->address->getFullyReadableAttribute() : 'No address' }}
            </td>
            <td>
                <a href="{{ route('client.show', $client->id) }}" class="ui inverted admin-bp-btn--success button small">
                    @lang('client.list.show')
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot class="full-width">
    <tr>
        <th colspan="10">
            <div class="ui right floated pagination menu floated-pagination">
                {{ $clients->links('vendor.pagination.semantic-ui') }}
            </div>
        </th>
    </tr>
    </tfoot>
@endsection

@section('javascript_layout')
    @parent
@endsection
