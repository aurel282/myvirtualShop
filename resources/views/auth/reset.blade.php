@extends('layout.template-guest')

@yield('navigation')

@section('body')
	<div class="ui equal width stackable internally celled grid">
		<div class="center aligned row">
			<div class="column">
				<div class="ui text container-login-title">
					<h1 class="ui inverted header" style="color:var(--main-color);">
						@lang('auth.title')
					</h1>
					<h2>@lang('auth.subtitle')</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="container-login" data-column="3">
		<div class="container-login-column">
			<div class="container-login-user" style="cursor: default;">
				<div class="container-login-user__avatar">
					<i class="lock icon huge"></i>
				</div>
				<div class="container-login-user__name">@lang('auth.login')</div>
				<div class="ui basic segment">
					{{Form::open(['class' => 'ui form'])}}
					<div class="field">
						<label for="username">@lang('auth.email')</label>
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input type="email" name="email" id="username" required autofocus>
						</div>
					</div>
					<div class="field">
						<a href="{{ route('admin.login') }}">@lang('auth.login')</a>
					</div>
					<button type="submit" class="ui blue submit button">
						@lang('auth.reset-password.button')
					</button>

					<button type="button" onclick="javascript:history.go(-2)" class="ui secondary button">
						@lang('auth.reset-password.go_back')
					</button>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
