<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class UpdateMemberRequest extends FormRequest
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
     * 'username' => [ValidationRule::unique('members')->ignore($this->id), 'required'],
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|max:255',
            'tussenvoegsel' => 'max:255',
            'lastname' => 'required|max:255',
            'email' => 'email|max:255',
            'username' => 'required|unique:members,username,'.$this->id,
            'dateofbirth' => 'required|date'
        ];
    }
}
