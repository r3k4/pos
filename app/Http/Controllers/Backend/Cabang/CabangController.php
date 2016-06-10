<?php

namespace App\Http\Controllers\Backend\Cabang;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Cabang\createOrUpdateCabangrequest;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
use Illuminate\Http\Request;

class CabangController extends Controller
{

	private $base_view = 'konten.backend.cabang.';
	protected $cabang;
    
   	public function __construct(CabangRepoInterface $cabang){
    	$this->cabang = $cabang;
    	view()->share('backend_cabang', true);
    	view()->share('base_view', $this->base_view);
   	}
    

	public function index()
	{
		$cabang = $this->cabang->all(10);
		$vars = compact('cabang');
		return view($this->base_view.'index', $vars);	
	}

	public function create()
	{
		return view($this->base_view.'popup.create');
	}

	public function store(createOrUpdateCabangrequest $request)
	{
		return $this->cabang->create($request->except('_token'));
	}

	public function show($id)
	{
		$cabang = $this->cabang->find($id);
		$vars = compact('cabang');
		return view($this->base_view.'popup.show', $vars);
	}

	public function edit($id)
	{
		$cabang = $this->cabang->find($id);
		$vars = compact('cabang');
		return view($this->base_view.'popup.edit', $vars);
	}

	public function update(createOrUpdateCabangrequest $request)
	{
		$u = $this->cabang->update($request->id, $request->except(['_token', 'id']));
		return $u;
	}


	public function delete(Request $request)
	{
		return $this->cabang->delete($request->id);
	}
    
    
    
}
