<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use Modules\Catalog\Entities\ProducerTypeProduct;
use Modules\Catalog\Entities\Product;
use Modules\Catalog\Entities\TypeProduct;
use MongoDB\BSON\Type;


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

  public function detail($slug_type_product, $slug_producer_type_product, $slug) {
    $product = Product::with('files')->where('url_key',$slug)->first();
    return view('main.detail', compact('product'));
  }

  public function catalog($slug) {
      $products = Product::with('type_product')->with('files')->whereHas('type_product', function($query) use($slug) {
        $query->where('url_key', $slug);
      })->whereNull('producer_type_product_id')->get();
      $typeProduct = TypeProduct::where('url_key', $slug)->first();
     return view('main.catalog', compact('products', 'typeProduct'));
  }

  public function lineProduct($slugTypeProduct, $slugLineProduct) {
    $lineProduct = ProducerTypeProduct::with('products.files','type_product')->where('url_key', $slugLineProduct)->first();
    return view('main.lineProduct', compact('lineProduct'));
  }
}
