<?php

namespace App\Http\Requests\Produk;

use App\Http\Requests\Request;

class createOrUpdateProdukRequest extends Request
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
            'nama'  => 'required', 
            'ref_produk_id' => 'required',
            'mst_cabang_id' => 'required'
        ];
    }
}
