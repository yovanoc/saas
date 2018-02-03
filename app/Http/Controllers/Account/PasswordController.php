<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Account\PasswordUpdated;
use App\Http\Requests\Account\PasswordStoreRequest;

class PasswordController extends Controller
{
    public function index()
    {
        return view('account.password.index');
    }

    public function store(PasswordStoreRequest $request)
    {
        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);

        Mail::to($request->user())->send(new PasswordUpdated());

        return redirect()->route('account.index')->withSuccess('Password updated.');
    }
}
