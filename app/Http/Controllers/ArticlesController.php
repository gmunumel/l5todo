<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
//use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

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
     * @return \Illuminate\View\View
     */
    public function index() {

        // See person who is currently sign in
        //return \Auth::user();

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
     * @return \Illuminate\View\View
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
     * @return \Illuminate\View\View
     */
    public function create() {

        return view('articles.create');
    }

    /**
     * Controller to save an Article Object
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request) {

        //$input = Request::all();

        // First option
        //$article = new Article;
        //$article->title = $input('title');

        // Second option
        //$article = new Article(['title'])

        // Thrid option
        //Article::create($input);

        // with validations
        //Article::create($request->all());

        $article = new Article($request->all());

        // using authentification
        // Auth::user()->articles; //Collection
        Auth::user()->articles()->save($article);

        return redirect('articles');
    }

    /**
     * Controller for edit an Article
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id) {

        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));

    }

    /**
     * Controller for update an Article
     *
     * @param $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ArticleRequest $request) {

        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect('articles');
    }
}
