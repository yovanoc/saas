<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
    <a class="nav-link {{ return_if(on_page('account'), 'active') }}" href="{{ route("account.index") }}">Account overview</a>
    <a class="nav-link {{ return_if(on_page('account/profile'), 'active') }}" href="{{ route("account.profile.index") }}">Profile</a>
    <a class="nav-link {{ return_if(on_page('account/password'), 'active') }}" href="{{ route("account.password.index") }}">Change password</a>
</div>