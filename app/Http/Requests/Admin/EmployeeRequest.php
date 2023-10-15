<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $item = isset($this->employee) ? $this->employee : null;
        $status = $item ? "nullable" : "required";
        return [
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => $status . '|string',
            'manager_id' => 'required',
            'department_id' => 'required',
            'salary' => "required|numeric",
            'image' => $status . "|file",
        ];
    }
}
