<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\Outfit;
use App\Http\Requests\StoreOutfitRequest;
use App\Http\Requests\UpdateOutfitRequest;

class OutfitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outfits = Outfit::all();
        return view('outfit.index', ['outfits' => $outfits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $masters = Master::all();
        return view('outfit.create', ['masters' => $masters]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOutfitRequest $request)
    {
        $outfit = new Outfit;
        $outfit->type = $request->outfit_type;
        $outfit->color = $request->outfit_color;
        $outfit->size = $request->outfit_size;
        $outfit->about = $request->outfit_about;
        $outfit->master_id = $request->master_id;
        $outfit->save();

        return redirect()->route('outfit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Outfit $outfit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outfit $outfit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOutfitRequest $request, Outfit $outfit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outfit $outfit)
    {
        //
    }
}
