<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rogainings;
use App\Models\Points;

class RogainingController extends Controller
{
		//ロゲイニング一覧
	 public function list(Request $request)
	 {
	 	$user_id = request('user_id');//rogaining ID取得
	 	if($user_id == null){
	 		$user_id = $request->input('user_id');
	 		$user_id = 1;
	 	}
		$rogainings = Rogainings::where('user_id', $user_id)
						->orderBy('id')
						->get();
		$count = $rogainings->count();
	    return view('rogaining_list',compact('rogainings','count','user_id'));

  	}
	  //新規追加
  	public function add(Request $request)
  	{
	  	// $rogaining_id = request('rogaining_id');
	  	// $count = request('count');
	  	$count =  $request->input('count') + 1;
	  	$user_id =  $request->input('user_id');
	 	return view('rogaining_add',compact('user_id','count'));
	}

	  //DBに追加
	public function insert(Request $request)
	{
//	  	 	$no = $request->input('no');
	  	 	$user_id =  $request->input('user_id');
        	$title = $request->input('title');
        	$login = $request->input('login');
        	$public = $request->input('public');
        	$description = $request->input('description');

        	Rogainings::insert([
			    'title' => $title,
			    'login' => $login,
			    'public' => $public,
			    'description' => $description,
			    'user_id' => $user_id,
			    'created_at' => now(),
    			'updated_at' => now(),
			]);

	   	 	return view('rogaining_add_complete',compact('user_id'));
	}

    //ロゲイニング編集
	 public function edit(Request $request)
	 {
	 	$user_id = request('user_id');
	 	if($user_id  == null){
	 		$user_id = $request->input('user_id');
	 	}
	 	$rogaining_id = request('rogaining_id');//rogaining ID取得
	 	if($rogaining_id == null){
	 		$rogaining_id = $request->input('rogaining_id');
	 		if($rogaining_id == null){
	 			$rogaining_id = 1;
	 		}
	 	}

	 	$rogaining = Rogainings::findOrFail($rogaining_id);

	 	//ポイントを取得
		$points = Points::where('rogaining_id', $rogaining_id)
						->orderBy('no')
						->get();

		// $points = array()
		// foreach ($points_all as $key => $value) {
		// 	$points['no'] = $point=>point_title
		// 	$points['name'] = $point=>point_title
		// 	$points['lat'] = $point=>latitude
		// 	$points['lon'] = $point=>longitude
		// }				
		// var_dump($points)

		$count = $points->count();
	    return view('rogaining_edit',compact('points','rogaining','count','rogaining_id','user_id'));

	  }

	  //編集保存
	  public function update(Request $request)
	  {
	  		$user_id = $request->input('user_id');
	  		if($user_id  == null){
	 			$user_id = $request->input('user_id');
	 		}
	  		$id = $request->input('rogaining_id');
        	$title = $request->input('title');
        	$description = $request->input('description');
        	$login = $request->input('login');
        	$login = false;
        	$public = $request->input('public');
        	$public = true;
          	Rogainings::where('id', $id )
          		->update([
			    'title' => $title,
			    'description' => $description,
			    'login' => $login,
			    'public' => $public,
    			'updated_at' => now()
			 ]);
	   	 	return view('rogaining_add_complete',compact('user_id'));

	  }


}
