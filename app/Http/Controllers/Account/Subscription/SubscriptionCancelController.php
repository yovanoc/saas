<?php

namespace App\Http\Controllers\Account\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionCancelController extends Controller
{
    public function index()
    {
        return view('account.subscription.cancel.index');
    }

    public function store(Request $request)
    {
        $request->user()->subscription('main')->cancel();

        return redirect()->route('account.index')->withSuccess('Your subscription has been cancelled.');
    }
}
