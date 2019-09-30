{{ Form::open(['method'=> 'get', 'id' =>  'pagination_number_rows_per_page']) }}
	<div id="div_pagination">
		<!-- Number of rows -->
		<div class="divnum_rows" title="{{ __('pagination.change_items_per_page') }}">
			<select name="_pagination_num_rows" class="ui dropdown">
				<option value="">{{ __('pagination.number_items') }}</option>
				@foreach($list_per_page as $number_of_items)
					<option value="{{ $number_of_items }}" {{ $number_of_items == $items_per_page ? 'selected="selected"' : '' }}>
						{{ $number_of_items }}
					</option>
				<@endforeach
			</select>
		</div>
	</div>
{{ Form::close() }}
