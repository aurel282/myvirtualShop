@extends('layout.template-base')

@section('body')
	<div class="container-table content-info">
		@include('layout.components.flash-message')
		@yield('adminHeader')
		<div class="ui segment marginTop-xxl content-info padding-xl " style="padding: 75px;">
			@section('containerContent')
				<div class="textAlign-right marginTop-xl">
					<a
						href="@yield('back_url', url()->previous())"
						class="ui left labeled icon button admin-bp-btn--info button"
					>
						<i class="left arrow icon"></i>
						@lang('form.back')
					</a>
					<button class="ui teal labeled icon button" type="submit" id="confirmButtonId">
						<i class="add icon"></i>
						@lang('form.confirm')
					</button>
				</div>
			@show
		</div>
	</div>
@endsection

@section('javascript_layout')
	@parent()
@endsection

@section('javascript')
	@parent()
@endsection
