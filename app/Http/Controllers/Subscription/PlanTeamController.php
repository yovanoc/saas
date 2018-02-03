<?php

namespace App\Http\Controllers\Subscription;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanTeamController extends Controller
{
    public function index()
    {
        $plans = Plan::active()->forTeams()->get();

        return view('subscription.plans.teams.index', compact('plans'));
    }
}
