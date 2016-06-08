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

    /**
     * menampilkan halaman utama konfigurasi
     * @return view
     */
    public function index()
    {
    	$sv = $this->sv;
        $vars = compact('sv');
    	return view($this->base_view.'index', $vars);
    }


    /**
     * update variable konfigurasi utama
     * @param  Request $request  
     * @return string            
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nama_aplikasi' => 'required',
            'backup_db' => 'required',
            'jam_backup'    => 'required|date_format:H:i',
        ]);

        $this->sv->updateByVariable('nama_aplikasi', $request->nama_aplikasi);
        $this->sv->updateByVariable('backup_db', $request->backup_db);
        $this->sv->updateByVariable('jam_backup', $request->jam_backup);

        return 'ok';

    }


 
}
