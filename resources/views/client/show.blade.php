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
                        {{$client->name}} {{$client->firstname}}
                    </h3>
                    <p>
                        @lang('client.show.title'){{$client->id}}
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
                    TODO Navigation 1
                </a>
            <li class="navigation-item">
                <a href=# class="navigation-item-link">
                    <i title="" class="  sign layout   icon" style="color:var(--main-color);"></i>
                    TODO Navigation 2
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
                                                <th>@lang('client.show.bills.id') </th>
                                                <th>@lang('client.show.bills.date')</th>
                                                <th>@lang('client.show.bills.total')</th>
                                                <th style="width: 1px;">@lang('client.show.bills.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($client->bills as $bill)
                                            <tr>
                                                <td>
                                                    # {{ $bill->id }}
                                                </td>
                                                <td>
                                                    {{ $bill->date }}
                                                </td>
                                                <td>

                                                </td>
                                                <td>

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

                </div>
            </div>
@endsection

@section('javascript_layout')
    @parent
    <script>

    </script>
@endsection
