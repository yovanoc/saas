<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Plan extends Model
{
    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', true);
    }

    public function scopeForUsers(Builder $builder)
    {
        return $builder->where('teams_enabled', false);
    }

    public function scopeForTeams(Builder $builder)
    {
        return $builder->where('teams_enabled', true);
    }
}
