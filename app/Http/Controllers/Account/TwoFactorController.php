<?php

namespace App\Http\Controllers\Account;

use App\Models\Country;
use App\TwoFactor\TwoFactor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TwoFactor\TwoFactorStoreRequest;
use App\Http\Requests\TwoFactor\TwoFactorVerifyRequest;

class TwoFactorController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return view('account.twofactor.index', compact('countries'));
    }

    public function store(TwoFactorStoreRequest $request, TwoFactor $twoFactor)
    {
        $user = $request->user();

        $user->twoFactor()->create([
            'phone' => $request->phone_number,
            'dial_code' => $request->dial_code,
        ]);

        if ($response = $twoFactor->register($user)) {
            $user->twoFactor()->update([
                'identifier' => $response->user->id,
            ]);
        }

        return back();
    }

    public function verify(TwoFactorVerifyRequest $request)
    {
        $request->user()->twoFactor()->update([
            'verified' => true,
        ]);

        return back();
    }

    public function destroy(Request $request, TwoFactor $twoFactor)
    {
        $user = $request->user();

        if ($twoFactor->delete($user)) {
            $user->twoFactor()->delete();
        }

        return back();
    }
}
