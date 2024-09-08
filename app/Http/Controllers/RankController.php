<?php

namespace EventTool\Http\Controllers;

use EventTool\Classes\AuthChecking;
use EventTool\Rank;

use Illuminate\Http\Request;

use EventTool\Http\Requests;
use EventTool\Http\Controllers\Controller;

use Auth;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ranks = Rank::all();

        return view('panel.rankList', compact('ranks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(0)) return view('panel.rankAdd');
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
                $rank = new Rank;

                $rank->name = $request->name;
                $rank->colour = $request->colour;
                $rank->desc = $request->desc;
                $rank->payment = $request->payment;
                $rank->prepayment = $request->prepayment;
                $rank->available = $request->available;

                $rank->save();

                return redirect('panel/ranks');
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
            $rank = Rank::findOrFail($id);

            if(AuthChecking::checkAuth(0)) return view('panel.rankEdit', compact('rank'));
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
                $rank = Rank::findOrFail($id);

                $rank->name = $request->name;
                $rank->colour = $request->colour;
                $rank->desc = $request->desc;
                $rank->payment = $request->payment;
                $rank->prepayment = $request->prepayment;
                $rank->available = $request->available;

                $rank->save();

                return redirect('panel/ranks');
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
            $rank = Rank::findOrFail($id);

            if(AuthChecking::checkAuth(0)) {
                $rank->forceDelete();

                return redirect('panel/ranks');
            }
            else redirect('/');
        }
        else return redirect('/');
    }
}
