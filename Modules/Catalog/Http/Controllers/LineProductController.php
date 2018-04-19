<?php

namespace Modules\Catalog\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Catalog\Entities\ProducerTypeProduct;
use Modules\Catalog\Http\Requests\LineProduct\LineProductRequest;
use Modules\Catalog\Entities\TypeProduct;
use Modules\Catalog\Entities\Producer;
use Illuminate\Http\Request;

class LineProductController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
      return [
        "typeProducts" => TypeProduct::all(),
        "producers" => Producer::all(),
        "lineProducts" => ProducerTypeProduct::all()
      ];
    }

    /**
     * @return array
     */
    public function create()
    {
      return [
        "typeProducts" => TypeProduct::all(),
        "producers" => Producer::all(),
        "sort" => TypeProduct::all()->last()->id+1
      ];
    }

    /**
     * @param LineProductRequest $lineProductRequest
     * @return array
     */
    public function store(lineProductRequest $lineProductRequest)
    {
      $request = $lineProductRequest->except('_token','id');
      return ['message' => 'Успешно сохранено!', 'model' => ProducerTypeProduct::create($request)];
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('catalog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('catalog::edit');
    }

    public function update(lineProductRequest $lineProductRequest)
    {
      $request = $lineProductRequest->except('_token','id');
      return ['message' => 'Успешно обновлено!', 'model' => ProducerTypeProduct::where('id',$lineProductRequest->id)->update($request)];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function destroy(Request $request)
    {
      $lineProduct = ProducerTypeProduct::find($request->id);
      $lineProduct->delete();
      return ['message' => 'Успешно удалено!'];
    }
}
