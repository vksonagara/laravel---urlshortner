<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/url', function (Request $request) {
	$url = urlencode($request->input('url'));
	$encoded_url = "http://127.0.0.1:8000/redirect/".uniqid();
	$urltbl = DB::table('url')->where('url',$url)->get();
	$count = DB::table('url')->where('url',$url)->count();
	if($count>0)
		return json_encode(array("status"=>100, "encoded_url"=>$urltbl[0]->encoded_url));
    DB::insert('insert into url (url, encoded_url) values (?, ?)', [$url, $encoded_url]);
    return json_encode(array("status"=>200, "encoded_url"=>$encoded_url));
});

Route::get('/redirect/{code}', function ($code) {

    $encoded_url = "http://127.0.0.1:8000/redirect/".urlencode($code);
    $urltbl = DB::table('url')->where('encoded_url',$encoded_url)->get();
    return redirect(urldecode($urltbl[0]->url));
    
});



