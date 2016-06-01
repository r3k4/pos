<?php

namespace App\Http\Requests\Pengeluaran;

use App\Http\Requests\Request;

class createPengeluaranRequest extends Request
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
            'jumlah'    => 'required',
            'biaya' => 'required',
            'mst_cabang_id' => 'required',
        ];
    }
}
