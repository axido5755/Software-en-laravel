<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Clausula;


class TestController extends Controller
{

    public function findPrice(Request $request){
	
		//it will get price if its id match with product id
		$p=clausula::select('id_clausula')->where('id_clausula',$request->id_clausula);
		
    	return response()->json($p);
    }
}
