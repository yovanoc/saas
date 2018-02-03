@extends('account.layouts.default')

@section('account.content')
    <div class="card card-default">
        <div class="card-header">Login</div>

        <div class="card-body">
            <form action="{{ route("account.password.store") }}" method="post">
                @csrf

                <div class="form-group row">
                    <label for="password_current" class="col-md-4 col-form-label text-md-right">Current password</label>

                    <div class="col-md-6">
                        <input id="password_current" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_current" required>

                        @if ($errors->has('password_current'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_current') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">New password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">New password again</label>

                    <div class="col-md-6">
                        <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Change password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
