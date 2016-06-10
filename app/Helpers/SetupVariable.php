<?php 


if (! function_exists('setup_variable')) {

    /**
     * berfungsi sebagai pengisian value secara global
     * @param  [type]  $variable   [nama variable yg ada dlm db]
     * @param  boolean $empty_info [jika diisi false, maka pesan error saat variable tidak ditemukan akan dikosongkan]
     * @return [type]              [string]
     */
    function setup_variable($variable, $empty_info = true)
    {
        $app = app('App\Repositories\Contracts\SetupVariableRepoInterface');
        $obj = $app->getByVariable($variable);
        if(count($obj)>0){
            return $obj->value;         
        }
        if($empty_info = true){
            return '-error! variable tidak ditemukan-';
        }
        return '';
    }
}



if (! function_exists('fungsi')) {

    /**
     * obj dari helpers Fungsi.php
     * @return [type]    [obj]
     */
    function fungsi()
    {
        $app = app('fungsi');
        return $app;
    }
}
