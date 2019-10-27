@extends('layout.template-list')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('purchase.list.title')
        <span style="font-size: 14px;">
         - @lang('purchase.list.subtitle')
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
                            <input placeholder="{{trans('purchase.list.search.by_code')}}" name="product_code" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input placeholder="{{trans('purchase.list.search.by_name')}}" name="product_name" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="two wide field">
                        <button class="ui primary labeled icon button">
                            <i title="" class="search icon"></i>
                            @lang('purchase.list.search.search')
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('containerContent')
    <thead class="full-width">
    <tr class="main-head">
        <th style="width: 1px;">#</th>
        <th>@lang('purchase.list.code')</th>
        <th>@lang('purchase.list.name')</th>
        <th>@lang('purchase.list.bill')</th>
        <th style="width: 1px;">@lang('purchase.list.action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($purchases as $purchase)
        <tr>
            <td>
                {{ $purchase->id }}
            </td>
            <td>
                <a href="{{ route('product.show', $purchase->product) }}" >
                    {{ $purchase->product->code }}
                </a>
            </td>
            <td>
                {{ $purchase->product->name }}
            </td>
            <td>
                <a href="{{ route('bill.show', $purchase->bill) }}" >
                    {{ $purchase->bill->id }}
                </a>
            </td>
            <td>
                <a href="{{ route('bill.show', $purchase->bill->id) }}" class="ui inverted admin-bp-btn--success button small">
                    @lang('purchase.list.delete')
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot class="full-width">
    <tr>
        <th colspan="10">
            <div class="ui right floated pagination menu floated-pagination">
                {{ $purchases->links('vendor.pagination.semantic-ui') }}
            </div>
        </th>
    </tr>
    </tfoot>
@endsection

@section('javascript_layout')
    @parent
@endsection
