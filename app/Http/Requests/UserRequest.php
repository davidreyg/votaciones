<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Http\Utils\APIRequest;
use Illuminate\Validation\Rule;

class UserRequest extends APIRequest
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
            'username'  => 'required|string',
            'email' => 'required|string|email',
            'password' => Rule::requiredIf($this->password !== null),
            // }),
            'company_id' => 'required|exists:companies,id',
            'employee_id' => 'required|exists:employees,id',
        ];
    }
}
