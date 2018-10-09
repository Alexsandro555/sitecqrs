<?php

namespace Modules\Catalog\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Catalog\Entities\ProducerTypeProduct;
use Modules\Catalog\Http\Requests\LineProduct\LineProductRequest;
use Modules\Catalog\Entities\TypeProduct;
use Modules\Catalog\Entities\Producer;
use Illuminate\Http\Request;
use Modules\Catalog\Services\CacheService;

class LineProductController extends Controller
{

  private $cacheService;

  public function __construct(CacheService $cacheService)
  {
    $this->cacheService = $cacheService;
  }


    /**
     * @return mixed
     */
    public function index()
    {
      $producerTypeProduct = ProducerTypeProduct::latest()->first();
      return [
        "typeProducts" => TypeProduct::all(),
        "producers" => Producer::all(),
        "lineProducts" => ProducerTypeProduct::all(),
        "sort" => $producerTypeProduct?$producerTypeProduct->sort:0
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
      $this->cacheService->clear('product');
      $request = $lineProductRequest->except('_token','id');
      $normTitle = str_replace("/"," ",$request["title"]);
      $request["url_key"] = \Slug::make($normTitle);
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
      $this->cacheService->clear('product');
      $request = $lineProductRequest->except('_token','id');
      $lineProduct = ProducerTypeProduct::find($lineProductRequest->id);
      $normTitle = str_replace("/"," ",$request["name_line"]);
      $request["url_key"] = \Slug::make($normTitle);
      $lineProduct->fill($request);
      $lineProduct->save();
      return ['message' => 'Успешно обновлено!', 'model' => $lineProduct];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function destroy(Request $request)
    {
      $this->cacheService->clear('product');
      $lineProduct = ProducerTypeProduct::find($request->id);
      $lineProduct->delete();
      return ['message' => 'Успешно удалено!'];
    }
}
