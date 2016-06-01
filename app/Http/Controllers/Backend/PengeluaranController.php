<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Pengeluaran\createPengeluaranRequest;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
use App\Repositories\Contracts\Mst\PengeluaranRepoInterface;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{

    private $base_view = 'konten.backend.pengeluaran.';

    protected $pengeluaran;
    protected $cabang;


    public function __construct(PengeluaranRepoInterface $pengeluaran,
                                CabangRepoInterface $cabang
                                ){
        $this->cabang = $cabang;
        $this->pengeluaran = $pengeluaran;
        view()->share('backend_pengeluaran', true);
        view()->share('base_view', $this->base_view);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_bln = $request->get('getByBln');
        $filter_tgl = $request->get('getByTgl');
        if($filter_bln){
              $pengeluaran = $this->pengeluaran->getByBln(10, $filter_bln);  
        }elseif($filter_tgl){
              $pengeluaran = $this->pengeluaran->getByTgl(10, $filter_tgl);  
        }else{
            // get pengeluaran hari ini
            $filter = [['tgl_pengeluaran', '=', date('Y-m-d')]];  
            $pengeluaran = $this->pengeluaran->all(10, $filter);          
        }
        
        $pengeluaran_home = true;
        $vars = compact('pengeluaran', 'pengeluaran_home');
        return view($this->base_view.'index', $vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabang = $this->cabang->getAllDropdown('cabang');
        $vars = compact('cabang');
        return view($this->base_view.'popup.create', $vars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createPengeluaranRequest $request)
    {
        return $this->pengeluaran->create($request->except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengeluaran = $this->pengeluaran->find($id);
        $vars = compact('pengeluaran');
        return view($this->base_view.'popup.show', $vars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengeluaran = $this->pengeluaran->find($id);
        $cabang = $this->cabang->getAllDropdown('cabang');
        $this->authorize('updatePengeluaran', $pengeluaran); 

        $vars = compact('pengeluaran', 'cabang');
        return view($this->base_view.'popup.edit', $vars);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengeluaran = $this->pengeluaran->find($id);
        $this->authorize('updatePengeluaran', $pengeluaran); 

        $this->pengeluaran->update($id, $request->except('_token'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $pengeluaran = $this->pengeluaran->find($id);

         // set authorization 
         $this->authorize('destroyPengeluaran', $pengeluaran); 

         // do delete
         $this->pengeluaran->delete($id);
    }


 

 

}
