@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('provider.edit.title')
        <span style="font-size: 14px;">
         - @lang('provider.edit.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('provider.edit.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('lastname', trans('provider.edit.name_label')) }}
            {{ Form::text('lastname', $provider->name , ['placeholder' => trans('provider.edit.name')]) }}
        </div>
        <div class="field required">
            {{ Form::label('firstname', trans('provider.edit.firstname_label')) }}
            {{ Form::text('firstname', $provider->firstname, ['placeholder' => trans('provider.edit.firstname')]) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="ten wide field required">
            {{ Form::label('email', trans('provider.edit.email_label')) }}
            {{ Form::text('email', $provider->email, ['placeholder' => trans('provider.edit.email')]) }}
        </div>
        <div class="six wide field required">
            {{ Form::label('language_code', trans('provider.edit.language_label')) }}
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
            {{ Form::label('phone_number', trans('provider.edit.phone_number_label')) }}
            {{ Form::text('phone_number',  $provider->phone, ['placeholder' => trans('provider.edit.phone_number')]) }}
        </div>
    </div>
    <div class="two fields">
        <div class="twelve wide field required">
            {{ Form::label('mobile_number', trans('provider.edit.mobile_number_label')) }}
            {{ Form::text('mobile_number',  $provider->mobile, ['placeholder' => trans('provider.edit.mobile_number')]) }}
        </div>
    </div>
    <div class="two fields">
        <div class="field required">
            {{ Form::label('address[street]', trans('provider.edit.address.street_label')) }}
            {{ Form::text('address[street]', $provider->address->street,  ['class'=>'', 'placeholder' => trans('provider.edit.street')]) }}
        </div>
        <div class="field required">
            {{ Form::label('address[number]', trans('provider.edit.address.number_label')) }}
            {{ Form::text('address[number]', $provider->address->number,  ['class'=>'', 'placeholder' => trans('provider.edit.address.number')]) }}
        </div>
    </div>
    <div class="three fields ">
        <div class="field required">
            {{ Form::label('address[city]', trans('provider.edit.address.city_label')) }}
            {{ Form::text('address[city]', $provider->address->city ,  ['class'=>'', 'placeholder' => trans('provider.edit.address.city_placeholder')]) }}
        </div>
        <div class="field required">
            {{ Form::label('address[zip_code]', trans('provider.edit.address.zip_code_label')) }}
            {{ Form::text('address[zip_code]', $provider->address->zip ,  ['class'=>'', 'placeholder' => trans('provider.edit.address.zip_code')]) }}
        </div>
        <div class="field required">
            <label>@lang('provider.edit.address.country_label')</label>
            <div class="ui fluid search selection dropdown">
                <input type="hidden" name="address[country]">
                <i class="dropdown icon"></i>
                <div class="default text">{{ $provider->address->country }}</div>
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
