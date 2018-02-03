@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('account.layouts.partials._navigation')
        </div>
        <div class="col-md-9">
            @yield('account.content')
        </div>
    </div>
</div>
@endsection
