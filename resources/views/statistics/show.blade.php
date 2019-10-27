@extends('layout.template-show')

@section('headerTitle')
    <div class="header-info ui vertical stripe quote segment">
        <div class="ui equal width stackable internally celled grid">
            <div class="center aligned row">
                <div class="column">

                    <a href="{{ url()->previous() }}" class="ui left labeled icon button inverted admin-bp-btn--info button back-to-list" style="position: absolute; left: 0; top: 27px;">
                        <i style="color:#545454!important;" class="color-bg--success left arrow icon color" ></i>
                        @lang('statistics.show.back')
                    </a>
                    <p>
                        @lang('statistics.show.title')
                    </p>
                </div>
            </div>
        </div>
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
                                <i class="user icon" style="color:var(--main-color--light);"></i>
                                <div class="content">
                                    @lang('settings.show.information.title')
                                    <div class="sub header">@lang('settings.show.information.subtitle')</div>
                                </div>
                            </h2>
                        </div>
                        <div class="ui segment">
                            <div class="ui basic segment">
                                <div class="content">
                                    <div class="description">
                                        <p>
                                            <b>@lang('settings.show.information.fixed_fee'):</b>
                                            <b class="color-text--success">{{ $settings->fixed_fee }}</b>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <b>@lang('settings.show.information.variable_fee'):</b>
                                            <b class="color-text--success">{{ $settings->variable_fee }}</b>
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
