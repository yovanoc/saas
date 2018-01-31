<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('account.profile.index');
    }

    public function update()
    {
    }
}
