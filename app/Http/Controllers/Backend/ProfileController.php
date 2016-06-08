<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Profile\updateProfileRequest;
use App\Repositories\Contracts\Mst\UserRepoInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

	private $base_view = 'konten.backend.profile.';
	protected $user;

	public function __construct(UserRepoInterface $user)
	{
		$this->user = $user;
		view()->share('backend_profile', true);
		view()->share('base_view', $this->base_view);
	}

	/**
	 * menampilkan halaman profile untuk masing2 user
	 * @return view
	 */
    public function index()
    {
    	return view($this->base_view.'index');
    }

    /**
     * update profile masing2, termasuk update password
     * @param  integer               $id      
     * @param  App\Http\Requests\Profile\updateProfileRequest $request 
     * @return void                        
     */
    public function update_profile($id, updateProfileRequest $request)
    {
    	if($request->has('password_lama')){
			if (\Hash::check($request->password_lama, \Auth::user()->password)) {
			    // The passwords match... 
			    $data_update = ['password' => bcrypt($request->password_baru)];
				$this->user->update(\Auth::user()->id, $data_update);
			}else{
				return response(['error' => ['password tdk cocok!']], 422);
			}
    	}

    	$u = $this->user->update(\Auth::user()->id, $request->only(['nama', 'email']));

    	return $u;
    }



}
