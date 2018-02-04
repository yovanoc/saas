<?php

namespace App\Http\Controllers\Account\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionResumeController extends Controller
{
    public function index()
    {
        return view('account.subscription.resume.index');
    }

    public function store(Request $request)
    {
        $request->user()->subscription('main')->resume();

        return redirect()->route('account.index')->withSuccess('Your subscription has been resumed.');
    }
}
