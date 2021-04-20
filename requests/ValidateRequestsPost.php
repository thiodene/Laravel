<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

use Illuminate\Validation\Rule;

class ValidateRequestsPost extends FormRequest
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
        //dd(request());
        /*----------Base validation rules----------*/

        $rules = [
            'request_type'          => 'required',
            'requestor_name'        => 'required',
            'requestor_email'       => 'required|string|email|max:250',
            'requestor_team'        => 'required',
            'ministry'              => 'required',
            'project_name'          => 'required',
            'project_overview'      => 'required|max:1000',
            'delivery_date'         => 'required|date|after_or_equal:' . date("Y-m-d"),
            'creative_brief'        => 'required',
            'staff'                 => 'required',
            'works'                 => 'required',
            'languages'             => 'required',
            //'medias'                => 'required',
            //'other_language'        => 'required_if:languages.*,in_array:8003',
            //'languages.*'             => 'required',
            //'other_language'        => 'required|in:languages,8003',
            //'other_language'        => 'required_if:languages.*,8003',
            //'other_language'        => 'required_if:creative_brief,1',
        ];

        if (in_array('8003', request()->input('languages', []))) {
            $rules['other_language'] = 'required';
        }

        if (empty(request()->input('other_media'))){
            $rules['medias'] = 'required';
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
            'request_type.required'         => 'Type for this request is required.',
            'requestor_name.required'       => 'Requestor name for this request is required.',
            'requestor_email.required'      => 'Requestor email for this request is required.',
            'requestor_email.email'         => 'Requestor email for this request is not properly formatted.',
            'requestor_team.required'       => 'Requestor team for this request is required.',
            'ministry.required'             => 'Ministry for this request is required.',
            'project_name.required'         => 'Project name for this request is required.',
            'project_overview.required'     => 'Project overview for this request is required.',
            'delivery_date.required'        => 'Delivery date for this request is required.',
            'delivery_date.date'            => 'Delivery date for this request is not properly formatted.',
            'delivery_date.after_or_equal'  => 'Delivery date for this request must be in the future.',
            'staff.required'                => 'Creative Services Lead for this request is required.',
            'creative_brief.required'       => 'Creative brief acknowledgment for this request is required.',
            'works.required'                => 'Works selection for this request is required.',
            'medias.required'               => 'Output selection for this request is required.',
            'languages.required'            => 'Language required selection for this request is required.',
            'other_language.required'       => 'Other Language required if selected',
        ];

        return $messages;

    }

}
