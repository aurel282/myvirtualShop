@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('client.edit.title')
        <span style="font-size: 14px;">
         - @lang('client.edit.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('client.edit.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('lastname', trans('client.edit.name_label')) }}
            {{ Form::text('lastname', $client->name , ['placeholder' => trans('client.edit.name')]) }}
        </div>
        <div class="field required">
            {{ Form::label('firstname', trans('client.edit.firstname_label')) }}
            {{ Form::text('firstname', $client->firstname, ['placeholder' => trans('client.edit.firstname')]) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="ten wide field required">
            {{ Form::label('email', trans('client.edit.email_label')) }}
            {{ Form::text('email', $client->email, ['placeholder' => trans('client.edit.email')]) }}
        </div>
        <div class="six wide field required">
            {{ Form::label('language_code', trans('client.edit.language_label')) }}
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
            {{ Form::label('phone_number', trans('client.edit.phone_number_label')) }}
            {{ Form::text('phone_number',  $client->phone, ['placeholder' => trans('client.edit.phone_number')]) }}
        </div>
    </div>
    <div class="two fields">
        <div class="twelve wide field required">
            {{ Form::label('mobile_number', trans('client.edit.mobile_number_label')) }}
            {{ Form::text('mobile_number',  $client->mobile, ['placeholder' => trans('client.edit.mobile_number')]) }}
        </div>
    </div>
    <div class="two fields">
        <div class="field required">
            {{ Form::label('address[street]', trans('client.edit.address.street_label')) }}
            {{ Form::text('address[street]', $client->address->street,  ['class'=>'', 'placeholder' => trans('client.edit.address_placeholder')]) }}
        </div>
        <div class="field required">
            {{ Form::label('address[number]', trans('client.edit.address.number_label')) }}
            {{ Form::text('address[number]', $client->address->number,  ['class'=>'', 'placeholder' => trans('client.edit.address.placeholder_two')]) }}
        </div>
    </div>
    <div class="three fields ">
        <div class="field required">
            {{ Form::label('address[city]', trans('client.edit.address.city_label')) }}
            {{ Form::text('address[city]', $client->address->city ,  ['class'=>'', 'placeholder' => trans('client.edit.address.city_placeholder')]) }}
        </div>
        <div class="field required">
            {{ Form::label('address[zip_code]', trans('client.edit.address.zip_code_label')) }}
            {{ Form::text('address[zip_code]', $client->address->zip ,  ['class'=>'', 'placeholder' => trans('client.edit.address.zip_code_placeholder')]) }}
        </div>
        <div class="field required">
            <label>@lang('client.edit.country.label')</label>
            <div class="ui fluid search selection dropdown">
                <input type="hidden" name="address[country]">
                <i class="dropdown icon"></i>
                <div class="default text">{{ $client->address->country }}</div>
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
