<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $base_view = 'konten.backend.home.';

    public function __construct()
    {
    	view()->share('backend_home', true);
        view()->share('base_view', $this->base_view);
    }
    

    public function index()
    {
        return view($this->base_view.'index');
    }

    
}
