<?php

namespace Modules\Files\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Files\Entities\UploadInfo;
use Modules\Files\Services\UploadService;
use Modules\Files\Entities\File;

class FilesController extends Controller
{
  /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('files::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('files::create');
    }

    /**
     * @param UploadService $uploadService
     * @return array
     * @throws \Exception
     */
    public function store(UploadService $uploadService)
    {
      if($uploadService->upload()) {
        return ['message' => 'Успешно загружено!'];
      }
      else {
        throw new \Exception('Загрузка не удалась');
      }
    }

    /**
     *  Get Files
     * @param int $id
     * @return \Illuminate\Http\Response:json
     */
    public function getFiles($id)
    {
      $files = File::where('fileable_id',$id)->where('fileable_type','Modules\Catalog\Entities\Product')->get();
      return response()->json($files,200);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('files::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('files::edit');
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
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
