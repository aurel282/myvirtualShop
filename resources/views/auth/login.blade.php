@extends('layout.template-guest')

@yield('navigation')
@section('body_declaration')class="login-page"@endsection
@section('body')

	<div class="ui" style="display: flex; height: 100vh; justify-content: center; align-items: center;">>
		<div class="ui two column very relaxed middle aligned center aligned grid doubling stackable " style="width: 100vw; -webkit-box-pack: space-around; -ms-flex-pack: space-around; justify-content: space-around;">
			<div class="column block login-block" style="max-width: 600px;">

				<h2 style="color: #ed712a;">
					<img src="{{ asset('img/logo_bepark/logo.png')}}" class="image" alt="BePark"/> @lang('auth.title')
				</h2>

				<form class="ui large form" method="POST">
					{{ csrf_field()}}
					<div class="ui stacked segment" style="padding-top: 2.5em; padding-bottom: 3em;">
						<div class="field">
							<div class="ui left icon input">
								<i class="user icon" style="color:currentColor;"></i>
								<input type="text" name="email" id="username" value="{{ old('username')}}" placeholder="@lang('auth.email')" required autofocus>
							</div>
						</div>
						<div class="field">
							<div class="ui left icon input">
								<i class="lock icon" style="color:currentColor;"></i>
								<input type="password" name="password" id="password" placeholder="@lang('auth.password')">
							</div>
						</div>

						<div class="field">
							<button type="submit" class="ui blue fluid large submit button">
								Login
							</button>
						</div>

						<div class="field">
							<div class="ui checkbox">
								<input id="remember" name="remember" type="checkbox" checked >
								<label for="remember">@lang('auth.remember')</label>
							</div>
						</div>

						<div class="ui">
							<a href="reset-my-password">@lang('auth.reset_link')</a>
						</div>

					</div>

					<div class="ui error message"></div>

				</form>

				<div class="ui message">
					Do. Or do not. There is no try.
				</div>

			</div>
		</div>
	</div>
@endsection
