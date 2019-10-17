<!DOCTYPE html>
<html>

@include('layout.components.head')

<body style="background: white;" @yield('body_declaration')>
<!--[if lt IE 10]>
<p class="browsehappy">@lang('booking_create.ie_support.message')</p>
<![endif]-->
<style>
	[data-tooltip]:after {
		z-index: 999;
	}
	[data-tooltip]:before {
		z-index: 999;
	}
	.selection .dropdown.icon
	{
		color: #ed712a!important;
	}

	.ui.shape {
		width: 100% !important;
	}
	.ui.shape .sides {
		width: 100% !important;
	}
	.ui.labeled.icon.button.back-to-list>.icon, .ui.labeled.icon.buttons>.button>.icon {
		background-color: var(--main-color)!important;
	}
	.not-active {
		pointer-events: none;
		cursor: default;
		background: grey;
	}
	.ui.inverted.icon.header.block-dimmer {
		color: #ffffff;
		background: #545454d6;
		padding: 50px;
	}
	#daterange{
		min-width: 250px;
	}
	.grey-btn{
		box-shadow: 0 0 0 1px #767676 inset!important;
		color: #767676!important;
	}

	.container-table {
		padding: 20px;
	}

	@media screen and (max-width: 768px){
		.container-table {
			padding: 0;
		}
	}

	.ui.dividing.header{
		color: #ed712a;
		font-weight: 500;
	}
	.wrapper-calendar {
		background: #e8ecf2;
	}
	.not-menu main {
		width: 100%!important;
	}
	.not-menu main .main-calendar .calendar .calendar__header {
		width: calc(100vw - 59px)!important;
	}
	main {
		background: #e8ecf2;
		min-height: 100vh;
		height: 100%;
		width: calc(100vw - 240px);
	}
	.main-head th {
		padding: 1em .8em;
		font-weight: 500;
		background: #ed712a!important;
	}
	.header-status{
		position: absolute;
		justify-content: center;
		width: 100%;
		margin-top: -27px;
	}
	/*move start*/
	.subsection-title {
		color: #e7e7e7;
		text-decoration: underline;
	}
	.sub-menu .section-selector:checked~label {
		color: #e8ebf1;
		background-color: #636363;
		width: 100%;
		padding-top: 15px;
		margin-top: -14px;
		padding-bottom: 16px;
	}
	.team-box-list .team-choise {
		text-decoration: underline;
	}
	.no-line-heigth{
		line-height: initial!important;
	}


	/*move*/
	#leftNav>ul>li:first-child {
		background-color: #ed712a!important;
	}
	#leftNav {
		background-color: #ed712a;
	}
	.team-box-list .team-box-choise .team-choise-menu h2 {
		font-size: 26px;
	}
	#mainMenu{
		background: #35394a;
		background: -webkit-gradient(linear,left bottom,right top,color-stop(-80%,#ed712a),color-stop(53%,#3a3a3a));
		background: -webkit-linear-gradient(45deg,#ed712a -80%,#3a3a3a 53%);
		background: linear-gradient(45deg,#ed712a -80%,#3a3a3a 53%);
		border-top: 2px solid #ed712a;
	}
</style>
<style>
	.wrapper-calendar{
		touch-action: none;
	}
	.open-responsive {
		display: none;
	}
	@media screen and (max-width: 640px){
		.ui.booking-calendar {
			height: calc(100vh - 105px)!important;
		}
	}
	.container-table {
		padding: 75px;
	}
	#menu-auto-two{
		position: absolute;
		float: right;
		display: flex;
		flex-wrap: wrap;
		-ms-justify-content: flex-end;
		justify-content: flex-end;
	}
	#add_cost{
		position: absolute;
		right: 8px;
		top: 8px;
	}

</style>

<div class="wrapper" id="app">
	<div class="hero-outer">
		<div class="hero-inner">
			@if( config('app.env') != 'production' )
				<div class="ribbon-validation margin">
					<div class="ribbon top">
						<span><strong>This</strong> site is not</span>
					</div>
					<div class="ribbon bottom">
						<span><strong>production</strong></span>
					</div>
				</div>
			@endif


			{{-- Start - Navigation content --}}
			@section('navigation')
				<nav class="besaas-menu">
					@include('layout.components.personal_navigation')
					{!! $menuMain !!}
				</nav>
				<header>
					<button id="button-main-menu" type="button" class="button-main-menu style3 open"></button>
				</header>
			@show
			{{-- End - Navigation content--}}

			{{-- Start - Body content--}}
			<main style="@yield('main', 'padding: 15px;')">
				@yield('body')
			</main>
			{{-- End - Body content--}}

			@section('footer')
			@show
		</div>
	</div>
</div>
	{{--Start - Javascript layout content --}}
	@section('javascript_layout')
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
		@include('layout.components.errors')
		<script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/allDates.js') }}"></script>
		<script type="text/javascript" src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
	@show
	@section('javascript' )
	@show
	<script>
		var button = $(".button-main-menu.style3.open");
		var main = $("main");
		$('.ui.dropdown')
				.dropdown()
		;
		$('#search-select')
				.dropdown()
		;
	</script>
</body>
</html>
