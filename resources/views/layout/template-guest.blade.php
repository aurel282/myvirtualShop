@extends('layout.template-base')

@section('main')margin-left:0; width: 100vw;@endsection
@section('body')
	@include('layout.components.flash-message')
@endsection

@section('navigation')
@endsection

@section('javascript_layout')
	@parent
	<script type="text/javascript" src="{{ asset('css/semantic/dist/semantic.min.js') }}"></script>
@endsection
