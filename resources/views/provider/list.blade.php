@extends('layout.template-list')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('provider.list.title')
        <span style="font-size: 14px;">
         - @lang('provider.list.sub_title')
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
                            <input placeholder={{trans('provider.list.search.by_id')}} name="provider_id" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input placeholder={{trans('provider.list.search.by_name')}} name="provider_name" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="two wide field">
                        <button class="ui primary labeled icon button">
                            <i title="" class="search icon"></i>
                            @lang('provider.list.search.search')
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
            <a href="{{ route('provider.create') }}" class="ui right floated small primary labeled icon button mobile-reset-float">
                <i class="add icon" style="color:white;"></i>
                @lang('provider.list.create_new')
            </a>
            <a href="{{ route('provider.import') }}" class="ui right floated small primary labeled icon button mobile-reset-float">
                <i class="add icon" style="color:white;"></i>
                @lang('provider.list.import_csv')
            </a>
        </th>
    </tr>
    <tr class="main-head">
        <th style="width: 1px;">#</th>
        <th>@lang('provider.list.name')</th>
        <th>@lang('provider.list.firstname')</th>
        <th>@lang('provider.list.email')</th>
        <th>@lang('provider.list.phone')</th>
        <th>@lang('provider.list.address')</th>
        <th style="width: 1px;">@lang('provider.list.action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($providers as $provider)
        <tr>
            <td>
                <a href="{{ route('provider.show', $provider->id) }}" >
                    # {{ $provider->id }}
                </a>
            </td>
            <td>{{ $provider->name }}</td>
            <td>
                {{ $provider->firstname }}
            </td>
            <td>
                {{ $provider->email }}
            </td>
            <td>
                {{ $provider->phone }}
            </td>
            <td>
                {{ $provider->address ? $provider->address->getFullyReadableAttribute() : 'No address' }}
            </td>
            <td>
                <a href="{{ route('provider.show', $provider->id) }}" class="ui inverted admin-bp-btn--success button small">
                    @lang('provider.list.show')
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
                {{ $providers->links('vendor.pagination.semantic-ui') }}
            </div>
        </th>
    </tr>
    </tfoot>
@endsection

@section('javascript_layout')
    @parent
@endsection
