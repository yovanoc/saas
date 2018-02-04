@extends('account.layouts.default')

@section('account.content')
    <div class="card card-default">
        <div class="card-body">
            <form action="{{ route('account.subscription.cancel.store') }}" method="post">
                @csrf

                <p>Confirm your subscription cancellation.</p>

                <div class="form-group row mb-0">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-outline-danger">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
