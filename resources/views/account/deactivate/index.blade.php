@extends('account.layouts.default')

@section('account.content')
    <div class="card card-default">
        <div class="card-body">
            <form action="{{ route('account.deactivate.store') }}" method="post">
                @csrf

                <div class="form-group row">
                    <label for="password_current" class="col-md-4 col-form-label text-md-right">Current password</label>

                    <div class="col-md-6">
                        <input id="password_current" type="password" class="form-control{{ $errors->has('password_current') ? ' is-invalid' : '' }}" name="password_current" required>

                        @if ($errors->has('password_current'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password_current') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                @subscriptionnotcancelled
                    <p>This will also cancel your active subscription.</p>
                @endsubscriptionnotcancelled

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-danger">
                            Deactivate account
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
