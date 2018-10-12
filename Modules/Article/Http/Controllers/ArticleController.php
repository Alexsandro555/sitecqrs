<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Article;
use Modules\Files\Entities\File;

class ArticleController extends Controller
{
    /**
     * Display listing articles
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index() {
        return Article::All();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list() {
      $articles = Article::with('files')->where('news',0)->get();
      return view('article::index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        $article = Article::where('url_key','po-umolchaniyu')->first();
        if(!$article) {
          $article = new Article;
          $article->title = 'По умолчанию';
          $article->url_key = 'po-umolchaniyu';
          $article->news = 0;
          $article->save();
        }
        return $article;
    }

    /**
     * Update product
     * @param Request $request
     * @return array
     */
    public function store(Request $request) {
      return ['message' => 'Статья успешно обновлена!', 'model' => Article::where('id', $request->id)->update($request->toArray())];
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($slug) {
      $article = Article::where('url_key', $slug)->first();
      return view('article::show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit() {

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request) {
    }

    /**
     * Delete seleted article
     * @param Request $request
     * @return array
     */
    public function destroy(Request $request) {
      $article = Article::findOrFail($request->id);
      $currentFiles = File::where('fileable_id',$request->id)->where('fileable_type',Article::class)->get();
      foreach ($currentFiles as $currentFile) {
        $currentFile->delete();
      }
      $id = $article->id;
      $article->delete();
      return ['message' => 'Успешно удалено!', 'id' => $id];
    }
}
