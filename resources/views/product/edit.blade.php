@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('product.edit.title')
        <span style="font-size: 14px;">
         - @lang('product.edit.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('product.edit.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('name', trans('product.edit.name_label')) }}
            {{ Form::text('name', $product->name, ['placeholder' => trans('product.edit.name')]) }}
        </div>
        <div class="field required">
            {{ Form::label('description', trans('product.edit.description_label')) }}
            {{ Form::text('description', $product->description, ['placeholder' => trans('product.edit.description')]) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="ten wide field required">
            {{ Form::label('quantity', trans('product.edit.quantity_label')) }}
            {{ Form::text('quantity', $product->quantity, ['placeholder' => trans('product.edit.quantity')]) }}
        </div>
        <div class="twelve wide field required">
            {{ Form::label('price_per_unity', trans('product.edit.price_per_unity_label')) }}
            {{ Form::text('price_per_unity', $product->price_per_unity, ['placeholder' => trans('product.edit.price_per_unity_number')]) }}
        </div>
    </div>

    <div class="three fields">
        <div class="ten wide field required">
            {{ Form::label('color', trans('product.edit.color_label')) }}
            {{ Form::text('color', $product->color, ['placeholder' => trans('product.edit.color')]) }}
        </div>
        <div class="twelve wide field required">
            {{ Form::label('brand', trans('product.edit.brand_label')) }}
            {{ Form::text('brand', $product->brand, ['placeholder' => trans('product.edit.brand_number')]) }}
        </div>
        <div class="twelve wide field required">
            {{ Form::label('material', trans('product.edit.material_label')) }}
            {{ Form::text('material', $product->material, ['placeholder' => trans('product.edit.material_number')]) }}
        </div>
    </div>

    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
