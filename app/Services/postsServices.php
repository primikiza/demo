<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;

class postsServices{

		public function isOwner($id_user){
				$id_user_connected = Auth::user()->id;
				return($id_user_connected == $id_user);
		}

}