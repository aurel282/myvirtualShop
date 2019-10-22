@extends('layout.template-show')

@section('headerTitle')
    <div class="header-info ui vertical stripe quote segment">
        <div class="ui equal width stackable internally celled grid">
            <div class="center aligned row">
                <div class="column">

                    <a href="{{ url()->previous() }}" class="ui left labeled icon button inverted admin-bp-btn--info button back-to-list" style="position: absolute; left: 0; top: 27px;">
                        <i style="color:#545454!important;" class="color-bg--success left arrow icon color" ></i>
                        @lang('product.show.back')
                    </a>

                    <h3>
                        {{$product->name}}
                    </h3>
                    <p>
                        @lang('product.show.title') #{{$product->id}}
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
                    @lang('product.show.clear_bills')
                </a>
            <li class="navigation-item">
                <a href=# class="navigation-item-link">
                    <i title="" class="  sign layout   icon" style="color:var(--main-color);"></i>
                    @lang('product.show.delete')
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
                            <a href="{{ route('product.edit', $product) }}"
                               class="ui small basic right floated icon button"
                               data-tooltip="@lang('product.show.edit')"
                            >
                                <i class="edit icon" style="color:var(--main-color--light);"></i>
                            </a>
                            <h2 class="ui header" style="margin: 0;">
                                <i class="user icon" style="color:var(--main-color--light);"></i>
                                <div class="content">
                                    @lang('product.show.information.title')
                                    <div class="sub header">@lang('product.show.information.subtitle')</div>
                                </div>
                            </h2>
                        </div>
                        <div class="ui segment">
                            <div class="ui basic segment">
                                <div class="content">
                                    <div class="description">
                                        <p>
                                            <b>@lang('product.show.information.name'):</b>
                                            <b class="color-text--success">{{ $product->name }}</b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('product.show.information.description'):</b>
                                            <b class="color-text--success">{{ $product->description }}</b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('product.show.information.price_per_unity'):</b>
                                            <b class="color-text--success">{{ $product->price_per_unity }}</b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('product.show.information.quantity'):</b>
                                            <b class="color-text--success">{{ $product->quantity }}</b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('product.show.information.color'):</b>
                                            <b class="color-text--success">
                                                {{ $product->color }}
                                            </b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('product.show.information.brand'):</b>
                                            <b class="color-text--success">
                                                {{ $product->brand }}
                                            </b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('product.show.information.material'):</b>
                                            <b class="color-text--success">
                                                {{ $product->material }}
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
