<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class createUserRequest extends Request
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
            'nama'              => 'required',
            'email'             => 'required|email|unique:mst_users,email',
            'ref_user_level_id' => 'required',
            'password'          => 'required|confirmed',
            'mst_cabang_id'     => 'required_if:ref_user_level_id,2'
        ];
    }

    public function messages()
    {
        return [
            'mst_cabang_id.required_if' => 'kolom cabang wajib diisi jika level bukan administrator!',
        ];
    }

    

}
