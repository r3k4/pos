<?php

namespace App\Http\Requests\Profile;

use App\Http\Requests\Request;

class updateProfileRequest extends Request
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
        $mst_user_id =  $this->route('id');

        return [
            'email' => 'required|email|unique:mst_users,email,'.$mst_user_id,
            'nama'  => 'required',
            'password_baru'  => 'confirmed|required_with:password_baru',
            'password_baru_confirmation' => 'required_with:password_lama,password_baru'
        ];
    }
}
