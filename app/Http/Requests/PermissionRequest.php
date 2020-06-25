<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        $id = $this->segment(4);
        
        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255', "unique:permissions,name,{$id},id"],
            'label' => ['required', 'string', 'min:15', 'max:255']
        ];

        return $rules;
    }
}
