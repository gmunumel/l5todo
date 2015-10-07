<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;

/**
 * Class ArticlesController
 *
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller
{
    /**
     * Controller the index for Articles
     *
     * @return Response
     */
    public function index() {

        $articles = Article::latest('published_at')->published()->get();

        // If you want to return a json
        // format you can use the instrution
        // below
        //return $articles;

        return view('articles.index', compact('articles'));
    }

    /**
     * Controller to show the Article
     *
     * @param $id
     * @return Response
     */
    public function show($id) {

        $article = Article::findOrFail($id);

        // Display the object i'm working with
        //dd($article);

        // Manual way to check null
        //  if (is_null($article)) {
        //    abort(404);
        //}

        dd($article->created_at->month);

        return view('articles.show', compact('article'));
    }

    /**
     * Controller to display the form
     *
     * @return Response
     */
    public function create() {

        return view('articles.create');
    }

    /**
     * Controller to save an Article Object
     *
     * @param CreateArticleRequest $request
     * @return Response
     */
    public function store(CreateArticleRequest $request) {

        //$input = Request::all();

        // First option
        //$article = new Article;
        //$article->title = $input('title');

        // Second option
        //$article = new Article(['title'])

        // Thrid option
        //Article::create($input);

        // with validations
        Article::create($request->all());

        return redirect('articles');
    }
}
