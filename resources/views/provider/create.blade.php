@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('provider.create.title')
        <span style="font-size: 14px;">
         - @lang('provider.create.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('provider.create.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('lastname', trans('provider.create.name_label')) }}
            {{ Form::text('lastname', null, ['placeholder' => trans('provider.create.name')]) }}
        </div>
        <div class="field required">
            {{ Form::label('firstname', trans('provider.create.firstname_label')) }}
            {{ Form::text('firstname', null, ['placeholder' => trans('provider.create.firstname')]) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="ten wide field required">
            {{ Form::label('email', trans('provider.create.email_label')) }}
            {{ Form::text('email', null, ['placeholder' => trans('provider.create.email')]) }}
        </div>
        <div class="six wide field required">
            {{ Form::label('language_code', trans('provider.create.language_label')) }}
            {{ Form::select('language_code', [
                    'FR' => 'FR',
					'NL' => 'NL',
					'En' => 'EN',
            ],['class' => 'ui fluid normal dropdown']) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="twelve wide field required">
            {{ Form::label('phone_number', trans('provider.create.phone_number_label')) }}
            {{ Form::text('phone_number', null, ['placeholder' => trans('provider.create.phone_number')]) }}
        </div>
    </div>
    <div class="two fields">
        <div class="twelve wide field required">
            {{ Form::label('mobile_number', trans('provider.create.mobile_number_label')) }}
            {{ Form::text('mobile_number', null, ['placeholder' => trans('provider.create.mobile_number')]) }}
        </div>
    </div>
    <div class="two fields">
        <div class="field required">
            {{ Form::label('address[street]', trans('provider.create.address.street_label')) }}
            {{ Form::text('address[street]', '',  ['class'=>'', 'placeholder' => trans('provider.create.address_placeholder')]) }}
        </div>
        <div class="field required">
            {{ Form::label('address[number]', trans('provider.create.address.number_label')) }}
            {{ Form::text('address[number]', '',  ['class'=>'', 'placeholder' => trans('provider.create.address.placeholder_two')]) }}
        </div>
    </div>
    <div class="three fields ">
        <div class="field required">
            {{ Form::label('address[city]', trans('provider.create.address.city_label')) }}
            {{ Form::text('address[city]', '',  ['class'=>'', 'placeholder' => trans('provider.create.address.city_placeholder')]) }}
        </div>
        <div class="field required">
            {{ Form::label('address[zip_code]', trans('provider.create.address.zip_code_label')) }}
            {{ Form::text('address[zip_code]', '',  ['class'=>'', 'placeholder' => trans('provider.create.address.zip_code_placeholder')]) }}
        </div>
        <div class="field required">
            <label>@lang('provider.create.country.label')</label>
            <div class="ui fluid search selection dropdown">
                <input type="hidden" name="address[country]">
                <i class="dropdown icon"></i>
                <div class="default text">@lang('provider.create.address.country.default_select')</div>
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
