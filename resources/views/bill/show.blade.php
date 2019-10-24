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
                <a href=# class="navigation-item-link">
                    <i title="" class="  list layout   icon" style="color:var(--main-color);"></i>
                    @lang('bill.show.clear_bills')
                </a>
            <li class="navigation-item">
                <a href=# class="navigation-item-link">
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
                                                <th>@lang('bill.show.purchases.id') </th>
                                                <th>@lang('bill.show.purchases.date')</th>
                                                <th>@lang('bill.show.purchases.total')</th>
                                                <th>@lang('bill.show.purchases.id') </th>
                                                <th>@lang('bill.show.purchases.date')</th>
                                                <th>@lang('bill.show.purchases.total')</th>
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

                                                </td>
                                                <td>
                                                    <a href="{{ route('bill.purchase.delete', [$bill, $purchase]) }}" class="ui inverted admin-bp-btn--success button
                                                    small">
                                                        <i class="barcode icon" style="color:var(--main-color--light);"></i>
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
                                            <b>@lang('bill.show.information.firstname'):</b>
                                            <b class="color-text--success">{{ $bill }}</b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('bill.show.information.phone'):</b>
                                            <b class="color-text--success">
                                                {{ $bill->phone }}
                                            </b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('bill.show.information.mobile'):</b>
                                            <b class="color-text--success">
                                                {{ $bill->mobile }}
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
