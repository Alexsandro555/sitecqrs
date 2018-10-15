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
      Cart::add($product->id, $product->title, $request->count, $product->price,
        [
          'article'=>$product->vendor,
          'type'=>$product->type_product->title,
          'slug'=>$product->url_key,
          'filename'=>$filename!=""?'/storage/'.$filename:"/images/no-image-small.png"
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
