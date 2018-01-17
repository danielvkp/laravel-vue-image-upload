<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Contracts\MyModel;

class MyController extends Controller
{  
  public function save(Request $request){
	 return MyModel::create($request->all());
  }	
}