<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function index()
    {
        return view('account.tokens.index');
    }
}
