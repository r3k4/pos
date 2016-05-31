<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class updateUserRequest extends Request
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
        $mst_user_id =  $this->route('mst_user_id');
        
        return [
            'nama'  => 'required',
            'ref_user_level_id' => 'required',
            'email' => 'required|email|unique:mst_users,email,'.$mst_user_id,
        ];
    }
}
