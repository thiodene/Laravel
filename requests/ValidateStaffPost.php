<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ValidateStaffPost extends FormRequest
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
        // dd(request());
        /*----------Base validation rules----------*/

        // Editing
        if(isset($this->staff))
        {
            $rules = [
                'name'  => 'required|max:250',
                'email' => 'required|string|email|max:250|unique:staff,email,' . $this->staff->id,
            ];
        }
        else
        {
            $rules = [
                'name'  => 'required|max:250',
                'email' => 'required|string|email|max:250|unique:staff,email',
            ];
        }


        return $rules;

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        // $messages = array();

        $messages = [
            'name.required'     => 'Name for this staff member is required.',
            'email.required'    => 'Email for this staff member is required.',
            'unique.required'   => 'Unique email for this staff member is required.',
        ];

        return $messages;

    }

}
