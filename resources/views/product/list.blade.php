@extends('layout.template-list')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('product.list.title')
        <span style="font-size: 14px;">
         - @lang('product.list.subtitle')
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
                            <input placeholder="{{trans('product.list.search.by_name')}}" name="product_name" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input placeholder="{{trans('product.list.search.by_code')}}" name="product_code" type="text" value="">
                            <i title="" class="search icon" style="color:#ed712a;"></i>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="two wide field">
                        <button class="ui primary labeled icon button">
                            <i title="" class="search icon"></i>
                            @lang('product.list.search.search')
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
            <a href="{{ route('product.create') }}" class="ui right floated small primary labeled icon button mobile-reset-float">
                <i class="add icon" style="color:white;"></i>
                @lang('client.list.create_new')
            </a>
        </th>
    </tr>
    <tr class="main-head">
        <th style="width: 1px;">#</th>
        <th>@lang('product.list.name')</th>
        <th>@lang('product.list.firstname')</th>
        <th>@lang('product.list.email')</th>
        <th>@lang('product.list.phone')</th>
        <th>@lang('product.list.address')</th>
        <th style="width: 1px;">@lang('product.list.action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>
                <a href="{{ route('product.show', $product->id) }}" >
                    # {{ $product->id }}
                </a>
            </td>
            <td>{{ $product->name }}</td>
            <td>
                {{ $product->firstname }}
            </td>
            <td>
                {{ $product->email }}
            </td>
            <td>
                {{ $product->phone }}
            </td>
            <td>
                {{ $product->address ? $product->address->getFullyReadableAttribute() : 'No address' }}
            </td>
            <td>
                <a href="{{ route('product.show', $product->id) }}" class="ui inverted admin-bp-btn--success button small">
                    @lang('product.list.show')
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
                {{ $products->links('vendor.pagination.semantic-ui') }}
            </div>
        </th>
    </tr>
    </tfoot>
@endsection

@section('javascript_layout')
    @parent
@endsection
