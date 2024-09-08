<?php

namespace EventTool\Http\Controllers;

use EventTool\Newse;
use EventTool\Page;

use Illuminate\Http\Request;

use EventTool\Http\Requests;
use EventTool\Http\Controllers\Controller;
use EventTool\Classes\AuthChecking;

use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = Newse::all();

        return view('news.showNews', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(0)) return view('panel.newsAdd');
            else redirect('/');
        }
        else return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(0)) {
                $user = Auth::user();
                $news = new Newse;

                $news->title = $request->title;
                $news->text = $request->text;
                $news->creator = $user->name;

                $news->save();

                return redirect('panel/news');
            }
            else return redirect('/');
        }
        else return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(Auth::check()) {
            $news = Newse::findOrFail($id);

            if(AuthChecking::checkAuth(0)) return view('panel.newsEdit', compact('news'));
            else redirect('/');
        }
        else return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(0)) {
                $news = Newse::findOrFail($id);

                $news->title = $request->title;
                $news->text = $request->text;

                $news->save();

                return redirect('panel/news');
            }
            else return redirect('/');
        }
        else return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if(Auth::check()) {
            $news = Newse::findOrFail($id);

            if(AuthChecking::checkAuth(0)) {
                $news->forceDelete();

                return redirect('panel/news');
            }
            else redirect('/');
        }
        else return redirect('/');
    }

    /**
     * Show the list on admin panel.
     *
     * @return Response
     */
    public function adminList() {
        if(Auth::check()) {
            $news = Newse::all();

            if(AuthChecking::checkAuth(0)) return view('panel.newsList', compact('news'));
            else return redirect('/');
        }
        else return redirect('/');
    }

    /**
     * Main page of the event.
     *
     * @return Response
     */
    public function mainPage() {
        $news = Newse::all();

        return view('mainPage', compact('news'));
    }
}
