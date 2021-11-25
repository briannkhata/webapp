<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Usercontroller;
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

Route::get('/', function () {
    
 if(session()->has("user")){
    return redirect('showall');
  }else{
    return view('welcome');
 }
});

Route::post('login',[Usercontroller::class,"Authenticate"]);
Route::get('logout',[Usercontroller::class,"logout"]);
Route::get("showall",function(){
if(session()->has("user")){
   return view('Showall');
 }else{
    return redirect('/');
}
});

Route::get('getTaxpayers',[Usercontroller::class,"gettaxpayer"]);
Route::get('edit/{tpin}',[Usercontroller::class,"getedit"]);
Route::post("putdata",[Usercontroller::class,"putdata"]);
Route::post('update',[Usercontroller::class,"Edit"]);
Route::get('delete/{tpin}',[Usercontroller::class,"delete"]);
Route::get("add",function(){
if(session()->has("user")){
     return view('add');
    }else{
     return redirect('/');
   }
});