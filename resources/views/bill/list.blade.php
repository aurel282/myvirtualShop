@extends('layout.template-list')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('bill.list.title')
        <span style="font-size: 14px;">
         - @lang('bill.list.subtitle')
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
                            <input placeholder="{{trans('bill.list.search.by_id')}}" name="bill_id" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input placeholder="{{trans('bill.list.search.by_client_name')}}" name="bill_client_name" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="two wide field">
                        <button class="ui primary labeled icon button">
                            <i title="" class="search icon"></i>
                            @lang('bill.list.search.search')
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

        </th>
    </tr>
    <tr class="main-head">
        <th style="width: 1px;">#</th>
        <th>@lang('bill.list.number_product')</th>
        <th>@lang('bill.list.total_price')</th>
        <th>@lang('bill.list.client_name')</th>
        <th>@lang('bill.list.isPaid')</th>
        <th style="width: 1px;">@lang('bill.list.action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bills as $bill)
        <tr>
            <td>
                <a href="{{ route('bill.show', $bill->id) }}" >
                    # {{ $bill->id }}
                </a>
            </td>
            <td>
                {{ $bill->number_product() }}
            </td>
            <td>
                {{ $bill->total_price() }}
            </td>
            <td>
                {{ $bill->client->name }}
            </td>
            <td>
                {{ $bill->isPaid }}
            </td>
            <td>
                <a href="{{ route('bill.show', $bill->id) }}" class="ui inverted admin-bp-btn--success button small">
                    @lang('bill.list.show')
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot class="full-width">
    <tr>
        <th colspan="10">
            <div class="ui right floated pagination menu floated-pagination">
                {{ $bills->links('vendor.pagination.semantic-ui') }}
            </div>
        </th>
    </tr>
    </tfoot>
@endsection

@section('javascript_layout')
    @parent
@endsection
