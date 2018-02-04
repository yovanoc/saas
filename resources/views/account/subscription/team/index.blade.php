@extends('account.layouts.default')

@section('account.content')
    <div class="card card-default">
        <div class="card-body">
            <form action="{{ route('account.subscription.team.update') }}" method="post">
                @csrf
                @method('patch')

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Team Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $team->name) }}" required>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                               <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <br>

    <div class="card card-default">
        <div class="card-body">
            <div class="table-responsive">
                @if ($team->users->count())
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Member name</th>
                            <th>Member email</th>
                            <th>Added</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($team->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->pivot->created_at->toDateString() }}</td>
                                <td>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('remove-{{ $user->id }}').submit();">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>You've not added any team members yet.</p>
                @endif

                @foreach ($team->users as $user)
                    <form action="{{ route('account.subscription.team.member.destroy', $user) }}" method="POST" id="remove-{{ $user->id }}" class="hidden">
                        @csrf
                        @method('delete')
                    </form>
                @endforeach

                <form action="{{ route('account.subscription.team.member.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Add a member by email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Add member
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
