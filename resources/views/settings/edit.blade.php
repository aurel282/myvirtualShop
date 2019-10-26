@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('settings.edit.title')
        <span style="font-size: 14px;">
         - @lang('settings.edit.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('settings.edit.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('fixed_fee', trans('settings.edit.fixed_fee_label')) }}
            {{ Form::text('fixed_fee', $settings->fixed_fee, ['placeholder' => trans('settings.edit.fixed_fee')]) }}
        </div>
        <div class="field">
            {{ Form::label('variable_fee', trans('settings.edit.variable_fee_label')) }}
            {{ Form::text('variable_fee', $settings->variable_fee, ['placeholder' => trans('settings.edit.variable_fee')]) }}
        </div>
    </div>

    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
