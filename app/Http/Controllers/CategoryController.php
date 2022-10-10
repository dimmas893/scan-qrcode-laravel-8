<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('viewcode');
    }

    public function ambilqrcode(Request $request)
    {
        $result=0;
		if ($request->action = 'updateqr') {
			$user = Auth::user();
			if ($user) {
				$qrLogin=bcrypt($user->email.Str::random(40));
		        $user->barcode = $qrLogin;
		        $user->update();
		        $result=1;
			}
		
		}
		
        return $result;
    }

    public function store(Request $request) {
        $result =0;
           if ($request->data) {
               $user = User::where('barcode',$request->data)->first();
               if ($user) {

                $create = [
                    'name' => $user->email
                ];
                Category::create($create);
                //    Sentinel::authenticate($user);
                   $result =1;
                }else{
                    $result =0;
                }

               
           }
           
           return $result;
   }
}
