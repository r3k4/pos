<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    private $base_view = 'konten.backend.log.';

    public function __construct()
    {
    	view()->share('backend_log', true);
    	view()->share('base_view', $this->base_view);
    }


    public function index()
    {
    	$file = \File::get(storage_path('logs/laravel.log'));
    	return view($this->base_view.'index', compact('file'));
    }


    public function clear_log()
    {
    	$myfile = fopen(storage_path('logs/laravel.log'), "w")  or die("Unable to open file!");
    	$txt = "";
    	fwrite($myfile, $txt);
    	return 'ok';
    }

}
