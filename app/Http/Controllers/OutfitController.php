<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\Outfit;
use App\Http\Requests\StoreOutfitRequest;
use App\Http\Requests\UpdateOutfitRequest;
use Validator;

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
        $validator = Validator::make(
            $request->all(),
            [
                'outfit_type' => ['required', 'min:3', 'max:50'],
                'outfit_size' => ['required', 'integer', 'min:5', 'max:22'],
                'outfit_color' => ['required', 'min:3', 'max:20'],
                'outfit_about' => ['required'],
                'master_id' => ['required', 'integer', 'min:1'],
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $outfit = new Outfit;
        $outfit->type = $request->outfit_type;
        $outfit->color = $request->outfit_color;
        $outfit->size = $request->outfit_size;
        $outfit->about = $request->outfit_about;
        $outfit->master_id = $request->master_id;
        $outfit->save();

        return redirect()->route('outfit.index')->with('success_message', 'The outfit created');
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
        $masters = Master::all();
        return view('outfit.edit', ['outfit' => $outfit, 'masters' => $masters]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOutfitRequest $request, Outfit $outfit)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'outfit_type' => ['required', 'min:3', 'max:50'],
                'outfit_size' => ['required', 'integer', 'min:5', 'max:22'],
                'outfit_color' => ['required', 'min:3', 'max:20'],
                'outfit_about' => ['required'],
                'master_id' => ['required', 'integer', 'min:1'],
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }








        $outfit->type = $request->outfit_type;
        $outfit->color = $request->outfit_color;
        $outfit->size = $request->outfit_size;
        $outfit->about = $request->outfit_about;
        $outfit->master_id = $request->master_id;
        $outfit->save();

        return redirect()->route('outfit.index')->with('success_message', 'The outfit was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outfit $outfit)
    {
        $outfit->delete();
        return redirect()->route('outfit.index')->with('danger_message', 'The outfit  deleted');
    }
}
