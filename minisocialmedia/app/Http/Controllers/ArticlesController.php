<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles=Article::paginate(10);
        return view('index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Article::create($request->all());
       return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::findOrFail($id);
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::findOrFail($id);
        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $article=Article::findOrFail($id);
        if(! isset($request->live))
        $article->update(array_merge($request->all(),['live'=>false]));
        else
            $article->update($request->all());
        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

   $article=Article::findOrFail($id);
   $article->delete();
   return redirect('/articles');
    }
    public function showmyarticles($id)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        //$myarticles= DB::table('articles')->where('user_id',$id)->paginate(5);
        $myarticles = Article::where('user_id','=',$id)->paginate(5);
        if(Auth::check()){
        return view('articles.myarticles',compact('myarticles'));}

    }

    public function seeprofile($id)
    {
        $article= Article::find($id);
        $user = User::find($article);
       $articles = Article::where('user_id','=',$id)->paginate(5);
       return view('articles.seeprofile',compact('articles'));
    }
}
