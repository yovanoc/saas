<?php

namespace App\Http\Controllers\Auth;

use App\Models\ConfirmationToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ActivationController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware(['confirmation_token.expired:/']);
    }

    public function activate(ConfirmationToken $token, Request $request)
    {
        $token->user->update([
           'activated' => true,
        ]);

        $token->delete();

        Auth::loginUsingId($token->user->id);

        return redirect()->intended($this->redirectPath())->withSuccess('You are now signed in.');
    }

    protected function redirectPath()
    {
        return $this->redirectTo;
    }
}
