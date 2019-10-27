@extends('layout.template-show')

@section('headerTitle')
    <div class="header-info ui vertical stripe quote segment">
        <div class="ui equal width stackable internally celled grid">
            <div class="center aligned row">
                <div class="column">
                    <a href="{{ url()->previous() }}" class="ui left labeled icon button inverted admin-bp-btn--info button back-to-list" style="position: absolute; left: 0; top: 27px;">
                        <i style="color:#545454!important;" class="color-bg--success left arrow icon color" ></i>
                        @lang('provider.show.back')
                    </a>

                    <h3>
                        {{$provider->name}} {{$provider->firstname}}
                    </h3>
                    <p>
                        @lang('provider.show.title'){{$provider->id}}
                    </p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <ul class="header-navigation">
            <li class="navigation-item">
                <a href={{ route('provider.cloture', [$provider]) }} class="navigation-item-link">
                    <i title="" class="  list layout   icon" style="color:var(--main-color);"></i>
                    @lang('provider.show.export_cloture')
                </a>
            <li class="navigation-item">
                <a href=# class="navigation-item-link">
                    <i title="" class="  sign layout   icon" style="color:var(--main-color);"></i>
                    @lang('provider.show.delete')
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
                            <a href="{{ route('product.create', $provider) }}"
                               class="ui small basic right floated icon button"
                               data-tooltip="@lang('provider.product.add')"
                            >
                                <i class="add icon" style="color:var(--main-color--light);"></i>
                            </a>
                            <a href="{{ route('product.import', $provider) }}"
                               class="ui small basic right floated icon button"
                               data-tooltip="@lang('provider.product.import')"
                            >
                                <i class="download icon" style="color:var(--main-color--light);"></i>
                            </a>
                            <a href="{{ route('product.bulk_delete', $provider) }}"
                               class="ui small basic right floated icon button"
                               data-tooltip="@lang('provider.product.delete_all')"
                            >
                                <i class="trash icon" style="color:var(--main-color--light);"></i>
                            </a>
                            <a href="{{ route('product.export_all', $provider) }}"
                               class="ui small basic right floated icon button"
                               data-tooltip="@lang('provider.product.export_all')"
                            >
                                <i class="barcode icon" style="color:var(--main-color--light);"></i>
                            </a>
                            <h2 class="ui header" style="margin: 0;">
                                <i class="star icon" style="color:var(--main-color--light);">
                                </i>

                                <div class="content">
                                    @lang('provider.show.product.title')
                                    <div class="sub header">
                                        @lang('provider.show.product.subtitle')
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
                                                <th>@lang('provider.show.product.id') </th>
                                                <th>@lang('provider.show.product.name')</th>
                                                <th>@lang('provider.show.product.quantity')</th>
                                                <th>@lang('provider.show.product.price_per_unity')</th>
                                                <th style="width: 1px;">@lang('provider.show.product.action')</th>
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
                                                <td>
                                                    <a href="{{ route('product.provider.edit', [$provider->id, $product->id]) }}" class="ui inverted admin-bp-btn--success button
                                                    small">
                                                        @lang('provider.show.product.edit')
                                                    </a>
                                                    <a href="{{ route('product.provider.delete', [$provider->id, $product->id]) }}" class="ui inverted admin-bp-btn--success button
                                                    small">
                                                        @lang('provider.show.product.delete')
                                                    </a>
                                                    <a href="{{ route('product.export_one', [$product->id]) }}" class="ui inverted admin-bp-btn--success button
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
                            <a href="{{ route('provider.edit', $provider) }}"
                               class="ui small basic right floated icon button"
                               data-tooltip="@lang('provider.show.edit')"
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
                                    <div class="description">
                                        <p>
                                            <b>@lang('provider.show.information.number_products'):</b>
                                            <b class="color-text--success">
                                                {{ $provider->number_products() }}
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
