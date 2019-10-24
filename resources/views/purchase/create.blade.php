@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('purchase.create.title')
        <span style="font-size: 14px;">
         - @lang('purchase.create.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('purchase.create.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('code', trans('purchase.create.code_label')) }}
            {{ Form::text('code', null, ['placeholder' => trans('purchase.create.code'), 'autofocus'=>'autofocus', 'autocomplete' => 'off']) }}
        </div>
        <div class="field required">
            {{ Form::label('quantity', trans('purchase.create.quantity_label')) }}
            {{ Form::text('quantity', 1, ['placeholder' => trans('purchase.create.quantity')]) }}
        </div>
    </div>

    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
