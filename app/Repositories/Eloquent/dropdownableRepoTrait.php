<?php 

namespace App\Repositories\Eloquent;

trait dropdownableRepoTrait {



 
    public function getAllDropdown($nama_pilihan = '')
    {
        $data = ['' => '-pilih '.$nama_pilihan.'-'];
        foreach ($this->all() as $list) {
            $data[$list->id] = $list->nama;
        }

        return $data;
    }
 


}