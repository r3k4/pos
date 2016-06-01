<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Contracts\Mst\PengeluaranRepoInterface;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{

    private $base_view = 'konten.backend.pengeluaran.';

    protected $pengeluaran;


    public function __construct(PengeluaranRepoInterface $pengeluaran)
    {
        $this->pengeluaran = $pengeluaran;
        view()->share('backend_pengeluaran', true);
        view()->share('base_view', $this->base_view);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get pengeluaran hari ini
        $filter = [['tgl_pengeluaran', '=', date('Y-m-d')]];
        $pengeluaran = $this->pengeluaran->all(10, $filter);
        $vars = compact('pengeluaran');
        return view($this->base_view.'index', $vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->base_view.'popup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createPengeluaranRequest $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
