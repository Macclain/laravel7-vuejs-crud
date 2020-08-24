<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class MainController extends Controller
{
    public function storeItem(Request $request)
    {
    	$data = new Data();
    	$data->name = $request->name;
    	$data->age = $request->age;
    	$data->profession = $request->profession;
    	$data->save();
    	return $data;
    }
    public function getItems()
    {
    	$data = Data::all();
    	return $data;
    }
    public function deleteItem($id)
    {
    	$data = Data::find($id)->delete();
    }
    public function editItem(Request $request, $id)
    {
    	$data = Data::find($id);
    	$data->name = $request->get('val1');
    	$data->age = $request->get('val2');
    	$data->profession = $request->get('val3');
    	$data->save();
    	return $data;
    }
}
