<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Contracts\Mst\UserRepoInterface;
use App\Repositories\Contracts\Ref\UserLevelRepoInterface;
use Illuminate\Http\Request;



class UserController extends Controller
{

    private $base_view = 'konten.backend.user.';
    protected $user;
    protected $user_level;

	public function __construct(UserRepoInterface $user,
								UserLevelRepoInterface $user_level
								){
		$this->user = $user;
		view()->share('backend_user', true);
		view()->share('base_view', $this->base_view);
	}

	
	public function index()
	{
		$user = $this->user->all(10);
		$vars = compact('user'); 
		return view($this->base_view.'index', $vars);
	}

	public function create()
	{
		$level = $this->user_level->getAllDropdown('level');
		$vars = compact('level');
		return view($this->base_view.'popup.create', $vars);
	}


	public function store(createUserRequest $request)
	{
		return $this->user->create($request->except('_token'));
	}


	public function edit($id)
	{
		$user = $this->user->find($id);
		$vars = compact('user');
		return view($this->base_view.'popup.edit', $vars);
	}

	public function update($mst_user_id, updateUserRequest $request)
	{
		return $this->user->update($id, $request->except(['id', '_token']));
	}


	public function delete(Request $request)
	{
		return $this->user->delete($request->id);
	}





}
