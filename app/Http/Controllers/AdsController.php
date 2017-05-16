<?php

namespace App\Http\Controllers;

use App\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('ads.index', [
            'ads' => Ads::simplePaginate(5),
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.edit', [
            'ads' => new Ads(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $ad = Ads::find($request->get('id'));
        if ($request->get('id') && $user->can('update', $ad)) {
            $user->Ads()->save($ad->fill($request->all()));
        } else {
            $ad = new Ads($request->all());
            $user->Ads()->save($ad);
        }
        return redirect(action('AdsController@show', ['id' => $ad->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $ad = Ads::find($id);
        if(!$user->can('view', $ad)) {
            return redirect('ads');
        }
        return view('ads.show', [
            'ad' => $ad,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('ads.edit', [
            'ads' => Ads::find($id),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = Auth::user();
        $ad = Ads::find($id);
        if ($user->can('delete', $ad))
        Ads::destroy($id);
        return redirect('ads');
    }
}
