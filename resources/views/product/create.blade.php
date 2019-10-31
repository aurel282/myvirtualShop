@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('product.create.title')
        <span style="font-size: 14px;">
         - @lang('product.create.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('product.create.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('name', trans('product.create.name_label')) }}
            {{ Form::text('name', null, ['placeholder' => trans('product.create.name')]) }}
        </div>
        <div class="field">
            {{ Form::label('description', trans('product.create.description_label')) }}
            {{ Form::text('description', '', ['placeholder' => trans('product.create.description')]) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="ten wide field required">
            {{ Form::label('quantity', trans('product.create.quantity_label')) }}
            {{ Form::text('quantity', 1, ['placeholder' => trans('product.create.quantity')]) }}
        </div>
        <div class="twelve wide field required">
            {{ Form::label('price_per_unity', trans('product.create.price_per_unity_label')) }}
            {{ Form::text('price_per_unity', null, ['placeholder' => trans('product.create.price_per_unity_number')]) }}
        </div>
    </div>
    <div class="three fields">
        <div class="ten wide field">
            {{ Form::label('color', trans('product.create.color_label')) }}
            {{ Form::text('color', '', ['placeholder' => trans('product.create.color')]) }}
        </div>
        <div class="twelve wide field">
            {{ Form::label('brand', trans('product.create.brand_label')) }}
            {{ Form::text('brand', '', ['placeholder' => trans('product.create.brand')]) }}
        </div>
        <div class="twelve wide field">
            {{ Form::label('material', trans('product.create.material_label')) }}
            {{ Form::text('material', '', ['placeholder' => trans('product.create.material')]) }}
        </div>
    </div>
    <div class="twelve wide field">
        {{ Form::label('print_code', trans('product.create.print_code_label')) }}
        {{ Form::checkbox('print_code', '') }}
    </div>


    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
