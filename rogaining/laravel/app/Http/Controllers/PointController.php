<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Points;

class PointController extends Controller
{
		  //新規追加
	  public function add(Request $request)
	  {
	  	// $rogaining_id = request('rogaining_id');
	  	$count = request('count');
	  	$count =  $request->input('count');
	  	$rogaining_id = $request->input('rogaining_id');
	 	return view('point_add',compact('rogaining_id','count'));
	  }

	  //DBに追加
	  public function insert(Request $request)
	  {
//	  	 	$no = $request->input('no');
	  	 	$no =  $request->input('count') + 1;
        	$point_title = $request->input('point_title');
        	$latitude = $request->input('latitude');
        	$longitude = $request->input('longitude');
        	$image_url = $request->input('image_url');
        	$audio = $request->input('audio');
        	$description = $request->input('description');
        	$public = $request->input('public');
        	$public = true;
        	$rogaining_id = $request->input('rogaining_id');

        	Points::insert([
        		'no' => $no,
			    'point_title' => $point_title,
			    'latitude' => $latitude,
			    'longitude' => $longitude,
			    'image_url' => $image_url,
			    'audio' => $audio,
			    'description' => $description,
			    'public' => $public,
			    'rogaining_id' => $rogaining_id,
			    'created_at' => now(),
    			'updated_at' => now(),
			]);

	   	 	return view('point_add_complete',compact('rogaining_id' ));
         //	return redirect('rogaining_edit/$rogaining_id', 302, [], true);
	  }

	 //編集画面
     public function edit(Request $request)
	 {
	  	$id =  $request->input('point_id');
	  	$rogaining_id =  $request->input('rogaining_id');
   		$point = Points::findOrFail($id);
   		$now = now();
		return view('point_edit', compact('rogaining_id','point','now'));

	 }

	  //編集保存
	  public function update(Request $request)
	  {
	  	$id =  $request->input('point_id');
       	$point_title = $request->input('point_title');
       	$latitude = $request->input('latitude');
       	$longitude = $request->input('longitude');
       	$image_url = $request->input('image_url');
       	$audio = $request->input('audio');
       	$description = $request->input('description');
       	$public = $request->input('public');
       	$public = true;
       	$rogaining_id = $request->input('rogaining_id');

 //      	var_dump($description);
        Points::where('id', $id )
        	->update([
			'point_title' => $point_title,
			'latitude' => $latitude, 
			'longitude' => $longitude,
			'image_url' => $image_url,
			'audio' => $audio,
			'description' => $description,
			'public' => $public,
    		'updated_at' => now()
			]);

	   	 	return view('point_add_complete',compact('rogaining_id' ));
	  }


}






