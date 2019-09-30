

{{--{% block menu_user_block %}--}}
{{--	{% set organisationSelectionService = App.make('\\App\\Services\\OrganisationSelector') %}--}}
{{--	{% set current = organisationSelectionService.selected %}--}}
{{--	<style>--}}
{{--		/* /!\ Don't move from here - START /!\ */--}}
{{--		:root {--}}
{{--			--main-color: {{ 'colors_main'|setting }};--}}
{{--			--main-color--light: {{ 'colors_light'|setting }};--}}
{{--			--main-color--very-light: var(--main-color--light);--}}
{{--			--main-color--menu: var(--main-color);--}}
{{--		}--}}

{{--		/* /!\ Don't move from here - END  /!\ */--}}
{{--	</style>--}}
{{--	<div class="personal_navigation">--}}
{{--		{% if canImpersonate is defined and canImpersonate == true %}--}}
{{--		<div class="impersonate">--}}
{{--			{% if isImpersonated == false %}--}}
{{--				{{ Form.open({route: 'impersonate', enctype: 'multipart/form-data', class: 'ui form'}) }}--}}
{{--				<label>{{ 'auth.impersonate.enter_email'| trans }}</label>--}}
{{--				{{ Form.text('impersonate_email', '',{class: 'ui input'}) }}--}}
{{--				{{ Form.close() }}--}}
{{--			{% endif %}--}}
{{--			{% if isImpersonated == true %}--}}
{{--				<a href="/leave-impersonate">--}}
{{--					<label>{{ 'auth.impersonate.leave_impersonation'| trans }}</label>--}}
{{--				</a>--}}
{{--			{% endif %}--}}
{{--		</div>--}}
{{--		{% endif %}--}}

{{--		{% if organisationSelectionService.availableOrganisations|length > 1 %}--}}
{{--		<div class="select_organisation">--}}
{{--			<p>{{ 'navigation.personal.switch_organisation'|trans }}</p>--}}
{{--			{% for organisation in organisationSelectionService.availableOrganisations %}--}}
{{--				<a--}}
{{--					class="team-choise-menu {% if organisation.id == current.id %} selected {% endif %}"--}}
{{--					href="{{ route('set_organisation', [organisation.id]) }}"--}}
{{--				>--}}
{{--					<h2 class="name" style="font-size: 18px; font-weight: 500;">{{ organisation.name }}</h2>--}}
{{--				</a>--}}
{{--			{% endfor %}--}}
{{--		</div>--}}
{{--		{% endif %}--}}

{{--		<div class="perso_footer">--}}
{{--			{# Start - Personal Menu #}--}}
{{--			{% if registeredProfile.id is defined %}--}}
{{--				<a href="{{ route('profiles.show_profile', registeredProfile.id) }}" class="team-choise-menu">--}}
{{--					{{ misc.iconFA('user', { 'color' : 'var(--main-color--light)'}) }}--}}
{{--					{{ 'profiles.my_profile'|trans }}--}}
{{--				</a>--}}
{{--			{% endif %}--}}
{{--		</div>--}}
{{--		<div class="perso_footer" style="border: none;">--}}
{{--			<a href="/logout" class="team-choise-menu">--}}
{{--				{{ misc.iconFA('remove', { 'color' : 'var(--main-color--light)'}) }} {{ 'auth.logout'|trans }}--}}
{{--			</a>--}}
{{--			{# End - Personal Menu #}--}}
{{--		</div>--}}

{{--	</div>--}}
{{--{% endblock %}--}}
