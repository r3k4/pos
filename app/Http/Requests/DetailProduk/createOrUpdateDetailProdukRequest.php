<?php

namespace App\Http\Requests\DetailProduk;

use App\Http\Requests\Request;

class createOrUpdateDetailProdukRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->ref_user_level_id == 1){
            return true;
        }
        return false;
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
            'harga_beli'    => 'required',
            'harga_jual'    => 'required',
            'mst_cabang_id' => 'required',
            'stok_barang'   => 'required',
        ];
    }
}
