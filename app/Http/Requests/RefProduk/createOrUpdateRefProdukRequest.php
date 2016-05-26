<?php

namespace App\Http\Requests\RefProduk;

use App\Http\Requests\Request;

class createOrUpdateRefProdukRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->ref_user_level_id != 1){
            return false;
        }
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
            'nama'  => 'required'
        ];
    }
}
