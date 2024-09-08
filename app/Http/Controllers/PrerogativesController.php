<?php

namespace EventTool\Http\Controllers;

use Illuminate\Http\Request;

use EventTool\Prerogative;

use EventTool\Classes\AuthChecking;

use EventTool\Http\Requests;
use EventTool\Http\Controllers\Controller;

use Auth;

class PrerogativesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $prerogatives = Prerogative::all();

        return view('panel.prerogativeList', compact('prerogatives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(0)) return view('panel.prerogativeAdd');
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
                $prerogative = new Rank;

                $prerogative->user_id = $request->user_id;
                $prerogative->pre_id = $request->pre_id;

                $prerogative->save();

                return redirect('panel/prerogatives');
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
            $prerogative = Prerogative::findOrFail($id);

            if(AuthChecking::checkAuth(0)) return view('panel.prerogativeEdit', compact('prerogative'));
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
                $prerogative = Prerogative::findOrFail($id);

                $prerogative->user_id = $request->user_id;
                $prerogative->pre_id = $request->pre_id;

                $prerogative->save();

                return redirect('panel/prerogatives');
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
            $prerogative = Prerogative::findOrFail($id);

            if(AuthChecking::checkAuth(0)) {
                $rank->forceDelete();

                return redirect('panel/prerogatives');
            }
            else redirect('/');
        }
        else return redirect('/');
    }
}