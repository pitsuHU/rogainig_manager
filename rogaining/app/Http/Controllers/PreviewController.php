<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rogainings;
use App\Models\Points;

class PreviewController extends Controller
{
		//プレビュー表示
	 public function show(Request $request)
	 {
	  	$user_id = $request->input('user_id');
	  	if($user_id  == null){
	 		$user_id = $request->input('user_id');
	 	}
	  	$rogaining_id = $request->input('rogaining_id');

		$rogaining = Rogainings::findOrFail($rogaining_id);
		$points = Points::where('rogaining_id', $rogaining_id)
						->orderBy('no')
						->get();
		$count = $points->count();
//		var_dump($points);
		return view('preview',compact('points','rogaining','count','rogaining_id','user_id'));

  	}


}
