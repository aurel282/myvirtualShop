@extends('layout.template-list')

@section('personal_navigation')
@endsection

@section('navigation')
@endsection

@section('main')style="margin-left: 0; width: 100%;" class="modal-main"@endsection

@section('headerTitle')
@endsection

@section('Search')
@endsection

@section('containerContent')
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

@section('javascript')
@endsection
