@extends('layout.template-base')

@section('main')style="padding: 15px;" class="modal-main"@endsection

@section('body')
	@include('layout.components.flash-message')
@endsection

@section('javascript_layout')
	@parent()
	<script>
		function callbackFromModal(args)
		{
			@if( isset($callback) and $callback != null )
				var callback = parent.{{ $callback }};

				if( callback )
				{
					callback(args);
				}
				else
				{
					console.log('Callback {{ $callback }} not found!', args);
				}
			@else
				console.log('No callback!', args);
			@endif
		}
	</script>
@endsection

@section('personal_navigation')
@endsection

@section('javascript_personal_navigation')
@endsection

@section('navigation')
@endsection
