<?php

namespace Modules\Catalog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Catalog\Http\Requests\Producer\ProducerRequest;
use Modules\Catalog\Entities\Producer;
use Modules\Catalog\Http\Requests\Attribue\AttributeRequest;


class ProducerController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
      return [
        "producers" => Producer::all(),
        "sort" => Producer::latest()->first()->sort
      ];
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('catalog::create');
    }

    /**
     * @param ProducerRequest $producerRequest
     * @return array
     */
    public function store(ProducerRequest $producerRequest)
    {
      $request = $producerRequest->except('_token','id');
      return ['message' => 'Успешно сохранено!', 'model' => Producer::create($request)];
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

    /**
     * @param ProducerRequest $producerRequest
     * @return array
     */
    public function update(ProducerRequest $producerRequest)
    {
      $request = $producerRequest->except('_token','id');
      return ['message' => 'Успешно обновлено!', 'model' => Producer::where('id',$producerRequest->id)->update($request)];
    }

    /**
     * @param \Modules\Catalog\Http\Controllers\Request $request
     * @return array
     */
    public function destroy(Request $request)
    {
      $producer = Producer::find($request->id);
      $producer->delete();
      return ['message' => 'Успешно удалено!'];
    }
}
