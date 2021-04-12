<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMemberRequest extends FormRequest
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
            'firstname' => 'required|max:255',
            'tussenvoegsel' => 'max:255',
            'lastname' => 'required|max:255',
            'email' => 'email|max:255',
            'username' => 'required|unique:members,username|max:255',
            'dateofbirth' => 'required|date'
        ];
    }
}
