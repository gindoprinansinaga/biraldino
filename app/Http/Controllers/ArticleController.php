<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::paginate(10);
        return view('article.manage.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('article.manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'title' => 'required|unique:articles|min:5|max:50',
            'content' => 'required',
        ]);
        // $articles = new Article;
        // $articles->title = $request->title;
        // $articles->content = $request->content;
        // $articles->save();

        $articles = Article::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if (!$articles) {
            return back()->with('error', 'Data gagal disimpan!');
        } else {
            return back()->with('success', 'Data berhasil disimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $articles = Article::find($id);
        return view('article.manage.show', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $articles = Article::find($id);
        return view('article.manage.edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $validate = $request->validate([
            'title' => 'required|unique:articles|min:5|max:50',
            'content' => 'required',
        ]);
        $articles = Article::find($id);
        $articles->title = $request->title;
        $articles->content = $request->content;
        $articles->save();
        if (!$articles) {
            return back()->with('error', 'Data gagal diubah!');
        } else {
            return back()->with('success', 'Data berhasil diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $articles = Article::find($id);
        // $articles->delete();

        $articles = Article::where('id', $id)->delete();
        if (!$articles) {
            return back()->with('error', 'Data gagal dihapus!');
        } else {
            return back()->with('success', 'Data berhasil dihapus!');
        }
    }
}
