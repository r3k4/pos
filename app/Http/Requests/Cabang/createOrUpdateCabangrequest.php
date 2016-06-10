<?php

namespace App\Http\Requests\Cabang;

use App\Http\Requests\Request;

class createOrUpdateCabangrequest extends Request
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
            'nama'          => 'required',
            'kode_cabang'   => 'required',
            'alamat'        => 'required',         
        ];
    }
}
