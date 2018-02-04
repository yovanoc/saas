<?php

namespace App\Http\Requests\Account;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SubscriptionTeamMemberStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                Rule::exists('users', 'email')->whereNot('email', $this->user()->email),
            ],
        ];
    }
}
