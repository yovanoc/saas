<?php

namespace App\Rules;

use App\Models\User;
use App\TwoFactor\TwoFactor;
use Illuminate\Contracts\Validation\Rule;

class ValidTwoFactorToken implements Rule
{
    protected $user;

    protected $twoFactor;

    /**
     * Create a new rule instance.
     *
     * @param User $user
     * @param TwoFactor $twoFactor
     */
    public function __construct(User $user, TwoFactor $twoFactor)
    {
        $this->user = $user;
        $this->twoFactor = $twoFactor;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->twoFactor->validateToken($this->user, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid two factor token.';
    }
}
