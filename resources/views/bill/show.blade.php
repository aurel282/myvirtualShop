@extends('layout.template-show')

@section('headerTitle')
    <div class="header-info ui vertical stripe quote segment">
        <div class="ui equal width stackable internally celled grid">
            <div class="center aligned row">
                <div class="column">

                    <a href="{{ url()->previous() }}" class="ui left labeled icon button inverted admin-bp-btn--info button back-to-list" style="position: absolute; left: 0; top: 27px;">
                        <i style="color:#545454!important;" class="color-bg--success left arrow icon color" ></i>
                        @lang('bill.show.back')
                    </a>

                    <h3>
                        {{$bill->name}} {{$bill->firstname}}
                    </h3>
                    <p>
                        @lang('bill.show.title'){{$bill->id}}
                    </p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <ul class="header-navigation">
            <li class="navigation-item">
                <a href={{ route('bill.export', [$bill] )}} class="navigation-item-link">
                    <i title="" class="  list layout   icon" style="color:var(--main-color);"></i>
                    @lang('bill.show.export_csv')
                </a>
            <li class="navigation-item">
                <a href={{ route('bill.delete', [$bill] ) }} class="navigation-item-link">
                    <i title="" class="  sign layout   icon" style="color:var(--main-color);"></i>
                    @lang('bill.show.delete')
                </a>
            </li>

        </ul>
    </div>

@endsection

@section('adminContainer')
            <br/>
            <br/>
            <div class="ui stackable two column grid">
                <div class="column">
                    <div class="ui segments">
                        <div class="ui segment">
                            <a href="{{ route('bill.purchase.add', $bill) }}"
                               class="ui small basic right floated icon button"
                               data-tooltip="@lang('bill.show.purchases.add')"
                            >
                                <i class="add icon" style="color:var(--main-color--light);"></i>
                            </a>
                            <h2 class="ui header" style="margin: 0;">

                                <i class="star icon" style="color:var(--main-color--light);">
                                </i>

                                <div class="content">
                                    @lang('bill.show.purchases.title')
                                    <div class="sub header">
                                        @lang('bill.show.purchases.subtitle')
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
                                                <th>@lang('bill.show.purchases.code') </th>
                                                <th>@lang('bill.show.purchases.name')</th>
                                                <th>@lang('bill.show.purchases.description')</th>
                                                <th>@lang('bill.show.purchases.price') </th>
                                                <th>@lang('bill.show.purchases.quantity')</th>
                                                <th style="width: 1px;">@lang('bill.show.purchases.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bill->purchases as $purchase)
                                            <tr>
                                                <td>
                                                    # {{ $purchase->product->code }}
                                                </td>
                                                <td>
                                                    {{ $purchase->product->name }}
                                                </td>
                                                <td>
                                                    {{ $purchase->product->description }}
                                                </td>
                                                <td>
                                                    {{ $purchase->product->price_per_unity }}
                                                </td>
                                                <td>
                                                    {{ $purchase->quantity }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('bill.purchase.delete', [$bill, $purchase] ) }}" class="ui inverted admin-bp-btn--success button
                                                    small">
                                                        <i class="delete icon" style="color:var(--main-color--light);"></i>
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
                                <i class="user icon" style="color:var(--main-color--light);"></i>
                                <div class="content">
                                    @lang('bill.show.information.title')
                                    <div class="sub header">@lang('bill.show.information.subtitle')</div>
                                </div>
                            </h2>
                        </div>
                        <div class="ui segment">
                            <div class="ui basic segment">
                                <div class="content">
                                    <div class="description">
                                        <p>
                                            <b>@lang('bill.show.information.client_firstname'):</b>
                                            <b class="color-text--success">
                                                {{ $bill->client->firstname }}
                                            </b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('bill.show.information.client_lastname'):</b>
                                            <b class="color-text--success">
                                                {{ $bill->client->name }}
                                            </b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('bill.show.information.total_price'):</b>
                                            <b class="color-text--success">
                                                {{ $bill->total_price() }}
                                            </b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('bill.show.information.number_product'):</b>
                                            <b class="color-text--success">
                                                {{ $bill->number_product() }}
                                            </b>
                                        </p>
                                    </div>
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
