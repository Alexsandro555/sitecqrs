<?php

namespace Modules\Files\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Leader\UploadFile\Models\UploadInfo;
use Modules\Files\Services\UploadService;

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
     * @param Request $request
     * @param UploadInfo $info
     * @return array
     */
    public function store(Request $request, UploadInfo $info, UploadService $uploadService)
    {
      $info->id = $request->elementId;
      $info->typefile = $request->typefile;
      $uploadService->upload();
      return [];
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
