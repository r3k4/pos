<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\User\createUserRequest;
use App\Http\Requests\User\updateUserRequest;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
use App\Repositories\Contracts\Mst\UserRepoInterface;
use App\Repositories\Contracts\Ref\UserLevelRepoInterface;
use Illuminate\Http\Request;



class UserController extends Controller
{

    private $base_view = 'konten.backend.user.';
    protected $user;
    protected $user_level;
    protected $cabang;

	public function __construct(UserRepoInterface $user,
								UserLevelRepoInterface $user_level,
								CabangRepoInterface $cabang
								){
		$this->user_level = $user_level;
		$this->cabang = $cabang;
		$this->user = $user;
		view()->share('backend_user', true);
		view()->share('base_view', $this->base_view);
	}

	
	public function index()
	{
		$filter = [];
	    if(\Session::has('mst_cabang_id')){
	        $filter = array_add($filter, 'mst_cabang_id', \Session::get('mst_cabang_id'));
	    }
		$user = $this->user->all(10, $filter);
		$vars = compact('user'); 
		return view($this->base_view.'index', $vars);
	}

	public function create()
	{
		$level = $this->user_level->getAllDropdown('level');
		$cabang = $this->cabang->getAllDropdown('cabang');
		$vars = compact('level', 'cabang');
		return view($this->base_view.'popup.create', $vars);
	}


	public function store(createUserRequest $request)
	{
		return $this->user->create($request->except('_token'));
	}


	public function edit($id)
	{
		$user = $this->user->find($id);
		$level = $this->user_level->getAllDropdown('level');
		$cabang = $this->cabang->getAllDropdown('cabang');
		$vars = compact('user', 'level', 'cabang');
		return view($this->base_view.'popup.edit', $vars);
	}

	public function update($mst_user_id, updateUserRequest $request)
	{
		return $this->user->update($mst_user_id, $request->except(['id', '_token']));
	}


	public function delete(Request $request)
	{
		return $this->user->delete($request->id);
	}

	public function reset_password(Request $request)
	{
		$data = ['password' => bcrypt($request->email)];
		$update = $this->user->update($request->id, $data);
		return 'ok';		
	}





}
