<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Article;

class ArticleController extends Controller
{
  /**
   * Display listing articles
   * @param $id
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
    public function index()
    {
        return Article::All();
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
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
    public function store(Request $request)
    {
      return ['message' => 'Успешное обновлено!', 'model' => Article::where('id', $request->id)->update($request->toArray())];
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('article::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('article::edit');
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
