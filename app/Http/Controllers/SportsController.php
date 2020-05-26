<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Category;
use App\Score;

class SportsController extends Controller
{
     public function index()
    {
		//$users = Users::all();
		$category = Category::all();
		 return view('sportsview', compact('category'));
		//print_R($users);
		//die;
    }
	
	public function getresult(Request $request)
	{
		$input = $request->input();
		
		//$result = Category::with('score')->where('category_id',$input["cat_val"])->get();
		$result = Score::where('category_id',$input["cat_val"])->with('users')->orderBy('score', 'DESC')->take(10)->get();
		
		echo json_encode($result);
	}
}
