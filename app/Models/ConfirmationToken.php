<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmationToken extends Model
{
    public $timestamps = false;

    protected $dates = [
        'expires_at'
    ];

    protected $fillable = [
        'token',
        'expires_at'
    ];

    protected static function boot()
    {
        static::creating(function ($token) {
            optional($token->user->confirmationToken)->delete();
        });
    }

    public function getRouteKeyName()
    {
        return 'token';
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function hasExpired()
    {
        return $this->freshTimestamp()->gt($this->expires_at);
    }
}
