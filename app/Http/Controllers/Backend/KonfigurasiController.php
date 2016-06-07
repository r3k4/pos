<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Contracts\SetupVariableRepoInterface;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    private $base_view = 'konten.backend.konfigurasi.';
    protected $sv;

    public function __construct(SetupVariableRepoInterface $sv)
    {
    	$this->sv = $sv;
    	view()->share('base_view', $this->base_view);
    	view()->share('backend_konfigurasi', true);
    }

    public function index()
    {
    	$sv = $this->sv;
    	return view($this->base_view.'index', compact('sv'));
    }
}
