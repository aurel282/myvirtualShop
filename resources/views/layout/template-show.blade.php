@extends('layout.template-base')

@section('body')

	@yield('headerTitle')


	<div class="content-info">
		@include('layout.components.flash-message')
		@yield('adminContainer')
	</div>
@endsection

@section('javascript_layout')
	@parent()
@endsection

@section('javascript')
	@parent()
@endsection
