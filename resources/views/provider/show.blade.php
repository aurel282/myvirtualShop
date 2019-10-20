@extends('layout.template-show')

@section('headerTitle')
    <div class="header-info ui vertical stripe quote segment">
        <div class="ui equal width stackable internally celled grid">
            <div class="center aligned row">
                <div class="column">

                    <a href="{{ url()->previous() }}" class="ui left labeled icon button inverted admin-bp-btn--info button back-to-list" style="position: absolute; left: 0; top: 27px;">
                        <i style="color:#545454!important;" class="color-bg--success left arrow icon color" ></i>
                        @lang('client.show.back')
                    </a>

                    <h3>
                        {{$provider->name}} {{$provider->firstname}}
                    </h3>
                    <p>
                        @lang('client.show.title'){{$provider->id}}
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
                    @lang('client.show.clear_bills')
                </a>
            <li class="navigation-item">
                <a href=# class="navigation-item-link">
                    <i title="" class="  sign layout   icon" style="color:var(--main-color);"></i>
                    @lang('client.show.delete')
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
                            <h2 class="ui header" style="margin: 0;">

                                <i class="star icon" style="color:var(--main-color--light);">
                                </i>

                                <div class="content">
                                    @lang('client.show.bills.title')
                                    <div class="sub header">
                                        @lang('client.show.bills.subtitle')
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
                                                <th>@lang('provider.show.bills.id') </th>
                                                <th>@lang('provider.show.bills.date')</th>
                                                <th>@lang('provider.show.bills.total')</th>
                                                <th style="width: 1px;">@lang('provider.show.bills.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($provider->products as $product)
                                            <tr>
                                                <td>
                                                    # {{ $product->id }}
                                                </td>
                                                <td>
                                                    {{ $product->name }}
                                                </td>
                                                <td>
                                                    {{ $product->quantity }}
                                                </td>
                                                <td>
                                                    {{ $product->price_per_unity }}€
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
                            <a href="{{ route('provider.edit', $provider) }}"
                               class="ui small basic right floated icon button"
                               data-tooltip="@lang('client.show.edit')"
                            >
                                <i class="edit icon" style="color:var(--main-color--light);"></i>
                            </a>
                            <h2 class="ui header" style="margin: 0;">
                                <i class="user icon" style="color:var(--main-color--light);"></i>
                                <div class="content">
                                    @lang('provider.show.information.title')
                                    <div class="sub header">@lang('provider.show.information.subtitle')</div>
                                </div>
                            </h2>
                        </div>
                        <div class="ui segment">
                            <div class="ui basic segment">
                                <div class="content">
                                    <div class="description">
                                        <p>
                                            <b>@lang('provider.show.information.firstname'):</b>
                                            <b class="color-text--success">{{ $provider->firstname }}</b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('provider.show.information.lastname'):</b>
                                            <b class="color-text--success">{{ $provider->name }}</b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('provider.show.information.email'):</b>
                                            <b class="color-text--success">{{ $provider->email }}</b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('provider.show.information.address'):</b>
                                            <b class="color-text--success">{{ $provider->address->getFullyReadableAttribute() }}</b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('provider.show.information.phone'):</b>
                                            <b class="color-text--success">
                                                {{ $provider->phone }}
                                            </b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('provider.show.information.mobile'):</b>
                                            <b class="color-text--success">
                                                {{ $provider->mobile }}
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
