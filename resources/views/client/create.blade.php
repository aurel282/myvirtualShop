@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('client.create.title')
        <span style="font-size: 14px;">
         - @lang('client.create.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('client.create.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('lastname', trans('client.create.name_label')) }}
            {{ Form::text('lastname', null, ['placeholder' => trans('client.create.name')]) }}
        </div>
        <div class="field required">
            {{ Form::label('firstname', trans('client.create.firstname_label')) }}
            {{ Form::text('firstname', null, ['placeholder' => trans('client.create.firstname')]) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="ten wide field">
            {{ Form::label('email', trans('client.create.email_label')) }}
            {{ Form::text('email', null, ['placeholder' => trans('client.create.email')]) }}
        </div>
        <div class="six wide field">
            {{ Form::label('language_code', trans('client.create.language_label')) }}
            {{ Form::select('language_code', [
                    'FR' => 'FR',
					'NL' => 'NL',
					'En' => 'EN',
            ],['class' => 'ui fluid normal dropdown']) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="twelve wide field">
            {{ Form::label('phone_number', trans('client.create.phone_number_label')) }}
            {{ Form::text('phone_number', null, ['placeholder' => trans('client.create.phone_number')]) }}
        </div>
    </div>
    <div class="two fields">
        <div class="twelve wide field">
            {{ Form::label('mobile_number', trans('client.create.mobile_number_label')) }}
            {{ Form::text('mobile_number', null, ['placeholder' => trans('client.create.mobile_number')]) }}
        </div>
    </div>
    <div class="two fields">
        <div class="field">
            {{ Form::label('address[street]', trans('client.create.address.street_label')) }}
            {{ Form::text('address[street]', '',  ['class'=>'', 'placeholder' => trans('client.create.address.street')]) }}
        </div>
        <div class="field">
            {{ Form::label('address[number]', trans('client.create.address.number_label')) }}
            {{ Form::text('address[number]', '',  ['class'=>'', 'placeholder' => trans('client.create.address.number')]) }}
        </div>
    </div>
    <div class="three fields ">
        <div class="field">
            {{ Form::label('address[city]', trans('client.create.address.city_label')) }}
            {{ Form::text('address[city]', '',  ['class'=>'', 'placeholder' => trans('client.create.address.city')]) }}
        </div>
        <div class="field">
            {{ Form::label('address[zip_code]', trans('client.create.address.zip_code_label')) }}
            {{ Form::text('address[zip_code]', '',  ['class'=>'', 'placeholder' => trans('client.create.address.zip_code')]) }}
        </div>
        <div class="field">
            <label>@lang('client.create.address.country_label')</label>
            <div class="ui fluid search selection dropdown">
                <input type="hidden" name="address[country]">
                <i class="dropdown icon"></i>
                <div class="default text">@lang('client.create.address.country')</div>
                <div class="menu">
                    <div class="item" data-value="be"><i class="be flag"></i>Belgium</div>
                    <div class="item" data-value="fr"><i class="fr flag"></i>France</div>
                    <div class="item" data-value="nl"><i class="nl flag"></i>Netherlands</div>
                    <div class="item" data-value="lu"><i class="lu flag"></i>Luxembourg</div>
                </div>
            </div>
        </div>
    </div>

    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
