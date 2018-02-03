<?php

namespace App\Models;

use App\Models\Traits\HasConfirmationTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasConfirmationTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasActivated()
    {
        return $this->activated;
    }

    public function hasNotActivated()
    {
        return !$this->hasActivated();
    }
}
