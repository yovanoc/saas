<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
    <a class="nav-link {{ return_if(on_page('account'), 'active') }}" href="{{ route("account.index") }}">Account overview</a>
    <a class="nav-link {{ return_if(on_page('account/profile'), 'active') }}" href="{{ route("account.profile.index") }}">Profile</a>
    <a class="nav-link {{ return_if(on_page('account/password'), 'active') }}" href="{{ route("account.password.index") }}">Change password</a>
    <a class="nav-link {{ return_if(on_page('account/deactivate'), 'active') }}" href="{{ route("account.deactivate.index") }}">Deactivate account</a>
    <a class="nav-link {{ return_if(on_page('account/twofactor'), 'active') }}" href="{{ route("account.twofactor.index") }}">Two factor authentication</a>
    <a class="nav-link {{ return_if(on_page('account/tokens'), 'active') }}" href="{{ route("account.tokens.index") }}">API Tokens</a>
</div>

@subscribed
    @notpiggybacksubscription
        <hr>
        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
            @subscriptionnotcancelled
                <a class="nav-link {{ return_if(on_page('account/subscription/swap'), 'active') }}" href="{{ route('account.subscription.swap.index') }}">Change plan</a>
                <a class="nav-link {{ return_if(on_page('account/subscription/cancel'), 'active') }}" href="{{ route('account.subscription.cancel.index') }}">Cancel subscription</a>
            @endsubscriptionnotcancelled
            @subscriptioncancelled
                <a class="nav-link {{ return_if(on_page('account/subscription/resume'), 'active') }}" href="{{ route('account.subscription.resume.index') }}">Resume subscription</a>
            @endsubscriptioncancelled
            <a class="nav-link {{ return_if(on_page('account/subscription/card'), 'active') }}" href="{{ route('account.subscription.card.index') }}">Update card</a>
            @teamsubscription
                <a class="nav-link {{ return_if(on_page('account/subscription/team'), 'active') }}" href="{{ route('account.subscription.team.index') }}">Manage Team</a>
            @endteamsubscription
        </div>
    @endnotpiggybacksubscription
@endsubscribed