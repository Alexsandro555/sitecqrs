<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Catalog\Entities\Product;
use Cart;
use Illuminate\Support\Facades\Config;


class CartController extends Controller
{

    /**
     * Get array elements in cart
     * @return array
     */
    private function getCart() {
      $cart = Cart::content()->toArray();
      $arr = [];
      foreach($cart as $key=>$elem) {
        $arr[] = $elem;
      }
      return $arr;
    }


    /**
     * Get current cart
    * @return array
    */
    public function index() {
      return  [
        'cart' => $this->getCart(),
        'count' => Cart::count(),
        'total' => Cart::subtotal()
      ];
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        return view('cart::create');
    }


    public function coursePrice($product) {
      if($product->onsale) {
        return $price = $product->special_price;
      }
      $current = Config::get('course.value');
      $price = $product->price;
      if($product->type_product->title == 'Площадочные вибраторы') {
        $priceRuNDS = ($current*$price*18)/100+$current*$price;
        $price = floor($priceRuNDS-($priceRuNDS*7.2419)/100);
      }
      else {
        $priceRuNDS = ($current*$price*18)/100+$current*$price;
        $price = floor($priceRuNDS);
      }
      return $price;
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function store(Request $request)
    {
      $product = Product::with('files')->with('type_product')->findOrFail($request->id);
      $filename = "";
      foreach($product->files as $file)
      {
        if(!$file->figure) {
          foreach ($file->config as $filesItem)
          {
            foreach ($filesItem as $key=>$fileItem)
            {
              if($key === "small")
              {
                $filename = $fileItem["filename"];
                break;
              }
            }
          }
        }
      }
      $price = $this->coursePrice($product);
      if($product->qty>0) {
        $onstock = "На складе";
      }
      else {
        $onstock = "4-5 недель";
      }
      Cart::add($product->id, $product->title, $request->count, $price,
        [
          'article'=>$product->article,
          'type'=>$product->type_product->title,
          'slug'=>$product->url_key,
          'onstock'=>$onstock,
          'filename'=>$filename!=""?$filename:"no-image.png"
        ]
      );
      $total = Cart::subtotal();
      $count = Cart::count();
      return $this->getCart();
    }

    public function setQty($id, $qty) {
      Cart::update($id,$qty);
      return [];
    }

    /**
     * @return array
     */
    public function current() {
      $total = Cart::subtotal();
      $count = Cart::count();
      return ["total"=>$total,"count"=>$count];
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('cart::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('cart::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * @param $rowId
     * @return array
     */
    public function destroy($rowId)
    {
      if($rowId) {
        Cart::remove($rowId);
        return [];
      }
    }
}
