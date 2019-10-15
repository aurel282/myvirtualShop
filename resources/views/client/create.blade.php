@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('client.create.title')
        <span style="font-size: 14px;">
         - @lang('client.create.sub_title')
    </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <label><i class="user icon" style="color: #ed712a;"></i>@lang('client.create.sub_title')</label>
            <div class="sub header">@lang('client.create.help')</div>
        </div>
    </h2>
    <br />
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('lastname', trans('client.create.user_name_label')) }}
            {{ Form::text('lastname', null, ['placeholder' => trans('client.create.user_name')]) }}
        </div>
        <div class="field required">
            {{ Form::label('firstname', trans('client.create.user_firstname_label')) }}
            {{ Form::text('firstname', null, ['placeholder' => trans('client.create.user_firstname')]) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="ten wide field required">
            {{ Form::label('email', trans('client.create.user_email_label')) }}
            {{ Form::text('email', null, ['placeholder' => trans('client.create.user_email')]) }}
        </div>
        <div class="six wide field required">
            {{ Form::label('language_code', trans('client.create.user_language_label')) }}
            {{ Form::select('language_code', $languages,['class' => 'ui fluid normal dropdown']) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="four wide field required">
            {{ Form::label('prefix', trans('client.create.user_tel_prefix_label')) }}
            {{ Form::select('prefix', [
                    '+32' => 'Belgium (+32)',
					'+33' => 'France (+33)',
					'Other Countries' =>
					$countries
            ], null, ['class' => 'ui fluid normal dropdown']) }}
        </div>
        <div class="twelve wide field required">
            {{ Form::label('number', trans('client.create.user_tel_number_label')) }}
            {{ Form::text('number', null, ['placeholder' => trans('client.create.user_tel_number')]) }}
        </div>
    </div>
    <div class="two fields">
        <div class="four wide field required">
            {{ Form::label('prefix', trans('client.create.user_tel_prefix_label')) }}
            {{ Form::select('prefix', [
                    '+32' => 'Belgium (+32)',
					'+33' => 'France (+33)',
					'Other Countries' =>
					$countries
            ], null, ['class' => 'ui fluid normal dropdown']) }}
        </div>
        <div class="twelve wide field required">
            {{ Form::label('number', trans('client.create.user_tel_number_label')) }}
            {{ Form::text('number', null, ['placeholder' => trans('client.create.user_tel_number')]) }}
        </div>
        <div class="field required">
            <label>@lang('client.create.address_label')</label>
            <div class="fields">
                <div class="twelve wide field required">
                    {{ Form::text('address[street]', '',  ['class'=>'', 'placeholder' => trans('client.create.address_placeholder')]) }}
                </div>
                <div class="four wide field required">
                    {{ Form::text('address[number]', '',  ['class'=>'', 'placeholder' => trans('client.create.parking_address.placeholder_two')]) }}
                </div>
            </div>
        </div>
        <div class="three fields ">
            <div class="field required">
                <label>@lang('client.create.city_label')</label>
                <div class="field">
                    {{ Form::text('address[city]', '',  ['class'=>'', 'placeholder' => trans('client.create.parking_city.placeholder')]) }}
                </div>
            </div>
            <div class="field required">
                <label>@lang('client.create.parking_zip_code.label')</label>
                <div class="field">
                    {{ Form::text('address[zip_code]', '',  ['class'=>'', 'placeholder' => trans('client.create.parking_zip_code.placeholder')]) }}
                </div>
            </div>
            <div class="field required">
                <label>@lang('client.create.parking_country.label')</label>
                <div class="ui fluid search selection dropdown">
                    <input type="hidden" name="parking_address[country]">
                    <i class="dropdown icon"></i>
                    <div class="default text">@lang('client.create.parking_country.default_select')</div>
                    <div class="menu">
                        <div class="item" data-value="be"><i class="be flag"></i>Belgium</div>
                        <div class="item" data-value="fr"><i class="fr flag"></i>France</div>
                        <div class="item" data-value="nl"><i class="nl flag"></i>Netherlands</div>
                        <div class="item" data-value="lu"><i class="lu flag"></i>Luxembourg</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2 class="ui dividing header">@lang('client.create.title')
        <span style="font-size: 14px;">
            - @lang('client.create.sub_title')
        </span>
    </h2>

    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
