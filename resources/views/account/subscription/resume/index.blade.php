@extends('account.layouts.default')

@section('account.content')
    <div class="card card-default">
        <div class="card-body">
            <form action="{{ route('account.subscription.resume.store') }}" method="post">
                @csrf

                <p>Confirm to resume your subscription.</p>

                <div class="form-group row mb-0">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-outline-warning">
                            Resume
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
