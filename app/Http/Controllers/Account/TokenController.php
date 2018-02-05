<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function index()
    {
        return view('account.tokens.index');
    }
}
