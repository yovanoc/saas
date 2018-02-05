@extends('account.layouts.default')

@section('account.content')
    <div class="card card-default">
        <div class="card-body">
            @if (auth()->user()->twoFactorEnabled())
                <p>Two factor authentication is enabled for your account.</p>

                <form action="{{ route('account.twofactor.destroy') }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-outline-dark">
                                Disable
                            </button>
                        </div>
                    </div>
                </form>
            @else
                @if (auth()->user()->twoFactorPendingVerification())
                    <form action="{{ route('account.twofactor.verify') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="token" class="col-md-4 col-form-label text-md-right">Verification token</label>

                            <div class="col-md-6">
                                <input id="token" type="number" class="form-control{{ $errors->has('token') ? ' is-invalid' : '' }}" name="token" required>

                                @if ($errors->has('token'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('token') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Verify
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <form action="{{ route('account.twofactor.destroy') }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-danger">
                                    Cancel verification
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <form action="{{ route('account.twofactor.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="dial_code" class="col-md-4 col-form-label text-md-right">Dialling code</label>

                            <div class="col-md-6">
                                <select name="dial_code" id="dial_code" class="form-control{{ $errors->has('dial_code') ? ' is-invalid' : '' }}">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->dial_code }}">{{ $country->name }} (+{{ $country->dial_code }})</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('dial_code'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dial_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="tel" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" required>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enable
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
            @endif
        </div>
    </div>
@endsection
