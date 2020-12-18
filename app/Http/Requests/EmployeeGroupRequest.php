<?php

namespace App\Http\Requests;

use App\Http\Utils\APIRequest;

class EmployeeGroupRequest extends APIRequest
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
            'name' => 'required',
            'description' => 'required',
            'employee_group' => 'array|min:1|required',
            'employee_group.*.charge_id' => 'required|exists:charges,id',
            'employee_group.*.employee_id' => 'required|exists:employees,id',
        ];
    }
}
