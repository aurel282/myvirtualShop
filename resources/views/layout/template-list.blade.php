@extends('layout.template-base')

@php $_usePagination = isset($_usePagination) ? $_usePagination : true @endphp

@section('body')
	@include('layout.components.flash-message')
	<div class="container-table content-info">
		@yield('adminHeader')
			<div class="ui segment">
				<div class="ui fluid form">
					@yield('searchInfo')
					@yield('searchBar')
				</div>
			</div>
		@if($_usePagination)
			<div style="margin-bottom: 15px;">
				{{-- {{ $paginate_dropdown() }}--}}
			</div>
		@endif
		@if(isset($numberOfLines))
			<div class="color-text--success" style="margin-bottom: 15px;">
				{{-- {!! 'list.list.number_of_rows'|trans ({'number': $numberOfLines}) !!}--}}
			</div>
		@endif
		<div class="ui basic  marginTop-xl content-info ">
			<div class="ui segment">
				<table class="ui celled sortable single line table table-responsive">
					@section('containerContent')

					@show
				</table>
			</div>
		</div>
	</div>
@endsection

@section('javascript_layout')
	@parent()
@endsection

@section('javascript')
	@parent()

	<script type="text/javascript" src="{{ asset('js/script/sortable_list.js') }}"></script>

	<script>
		$(function() {

			$('table').tablesort();

			// Number of rows displayed by page selection
			$('select[name="_pagination_num_rows"]', '#pagination_number_rows_per_page').change(function () {
				//getting all the get vars from the previous url
				var items = location.search.substr(1).split("&");

				for (var index = 0; index < items.length; index++)
				{
					var varGet = items[index].split("=");

					var getInputNotAdd = [
						'_pagination_num_rows',
						'rows',
						'page'
					];

					var dateInput = [
						'daterangeStart',
						'daterangeEnd'
					];

					var allowed = getInputNotAdd.indexOf(varGet[0]);
					var dateFormat = dateInput.indexOf(varGet[0]);

					if (allowed === -1 && dateFormat === -1)
					{
						$('<input>').attr({
							type: 'hidden',
							name: varGet[0],
							value: varGet[1]
						}).appendTo('#pagination_number_rows_per_page');
					}
					else if (dateFormat !== -1)
					{
						$('<input>').attr({
							type: 'hidden',
							name: varGet[0],
							value: varGet[1].replace(/\+/g, ' ')
						}).appendTo('#pagination_number_rows_per_page');
					}
				}

				$('<input>').attr({
					type: 'hidden',
					name: 'page',
					value: 1
				}).appendTo('#pagination_number_rows_per_page');

				$('#pagination_number_rows_per_page').submit();
			});

			$('.js-action-checkbox').checkbox();

			var updateActionStatus = function () {
				$('#action_list .text .qty').text($('.list-selector:checked').length);
				if($('.list-selector:checked').length > 0)
				{
					$('.list-action').removeClass('disabled');
				}
				else
				{
					$('.list-action').addClass('disabled');
				}
			};

			var updateSelectAllStatus = function () {
				$('.select-all').prop('checked', $('.list-selector:checked').length !== 0);
			};

			var onSelectAll = function () {
				$('.list-selector, .select-all').prop('checked', $(this).prop('checked'));
				updateActionStatus();
			};

			$('.list-selector')
					.change(updateActionStatus)
					.change(updateSelectAllStatus);

			updateSelectAllStatus();

			$('.select-all').change(onSelectAll);

			$('.list-action').click(
					function (e) {
						e.preventDefault();

						var method = $(this).data('method') || 'post';

						var form = document.createElement('form');
						form.setAttribute('method', method);
						form.setAttribute('action', $(this).data('action'));
						form.setAttribute('style', 'display: none;');

						if (method !== 'get')
						{
							var csrf = document.createElement('input');
							csrf.setAttribute('name', '_token');
							csrf.setAttribute('value', '{{ csrf_token() }}');
							form.appendChild(csrf);
						}

						$('.list-selector:checked')
								.each(
										function (i, e) {
											var node = document.createElement('input');
											node.setAttribute('name', 'ids[]');
											node.setAttribute('value', $(e).data('id'));

											form.appendChild(node);
										}
								);

						document.body.appendChild(form);
						form.submit();
					}
			);

			$('.ui.dimmer')
					.dimmer({
						closable: false
					})
					.dimmer('show')
			;

			$('.ui.accordion').accordion();

			function forceDropdownHide() {
				$('#action_list').dropdown(
						{
							action: 'hide'
						}
				);
			}

			forceDropdownHide();

			var navTrigger = $('.cd-nav-trigger');
			var hasTransitions = $('.has-transitions');
			function openMenu(id)
			{
				var idFindTrigger = $('#' + id).find('.cd-nav-trigger');
				if(idFindTrigger.hasClass('menu-is-open'))
				{
					navTrigger.removeClass('menu-is-open');
					hasTransitions.removeClass('is-visible');
				}
				else
				{
					navTrigger.removeClass('menu-is-open');
					navTrigger.css({zIndex: 1});
					hasTransitions.removeClass('is-visible');
					idFindTrigger.addClass('menu-is-open');
					$('#'+id).find('#cd-main-nav ul').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend').addClass('is-visible');
					idFindTrigger.css({
						zIndex: idFindTrigger.hasClass('menu-is-open') ? 2 : 1
					})
				}
			}
		});
	</script>
@endsection
