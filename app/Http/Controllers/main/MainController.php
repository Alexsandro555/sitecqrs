<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use Modules\Catalog\Entities\Product;

class MainController extends Controller
{
  public function index() {
    return view('main.index');
  }

  public function authenticated(Request $request) {
    $user = $request->user();
    if($user) {
      //if($user->admin == 1) return $user->name;
      return $user->name;
    }
    return null;
  }

  public function detail($slug) {
    $product = Product::with('files')->where('url_key',$slug)->first();
    return view('main.detail', compact('product'));
  }

  public function catalog($id) {

  }
}
