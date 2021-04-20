<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ValidateMinistryPost extends FormRequest
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
        if(isset($this->ministry))
        {
            $rules = [
                'name'      => 'required|max:250|unique:ministries,name,' . $this->ministry->id,
                'acronym'   => 'required|string|max:10|unique:ministries,acronym,' . $this->ministry->id,
            ];
        }
        else
        {
            $rules = [
                'name'      => 'required|max:250|unique:ministries,name',
                'acronym'   => 'required|string|max:10|unique:ministries,acronym',
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
            'name.required'     => 'Name for ministry is required.',
            'acronym.required'  => 'Acronym for this ministry is required.',
            'name.unique'       => 'Unique name for this ministry is required.',
            'acronym.unique'    => 'Unique acronym for this ministry is required.',
        ];

        return $messages;

    }

}
