<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Monthly',
                'slug' => 'monthly',
                'gateway_id' => 'month_6',
                'price' => 6.00,
                'active' => true,
                'teams_enabled' => false,
                'teams_limit' => null,
            ],
            [
                'name' => 'Yearly',
                'slug' => 'yearly',
                'gateway_id' => 'year_60',
                'price' => 60.00,
                'active' => true,
                'teams_enabled' => false,
                'teams_limit' => null,
            ],
            [
                'name' => 'Monthly for 10 users',
                'slug' => 'monthly-for-10-users',
                'gateway_id' => 'team_month_55',
                'price' => 55.00,
                'active' => true,
                'teams_enabled' => true,
                'teams_limit' => 10,
            ],
        ];

        Plan::insert($plans);
    }
}
