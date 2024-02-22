<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\Outfit;
use App\Http\Requests\StoreOutfitRequest;
use App\Http\Requests\UpdateOutfitRequest;
use Validator;
use PDF;
class OutfitController extends Controller
{
    const page = 10;
    /**
     * Display a listing of the resource.
     */
    public function index(StoreOutfitRequest $request)
    {
        if ($request->sort) {
            if ('type' == $request->sort && 'asc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('type')->paginate(self::page)->withQueryString();
            } else if ('type' == $request->sort && 'desc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('type', 'desc')->paginate(self::page)->withQueryString();
            } else if ('color' == $request->sort && 'asc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('color')->paginate(self::page)->withQueryString();
            } else if ('color' == $request->sort && 'desc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('color', 'desc')->paginate(self::page)->withQueryString();
            } else if ('size' == $request->sort && 'asc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('size')->paginate(self::page)->withQueryString();
            } else if ('size' == $request->sort && 'desc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('size', 'desc')->paginate(self::page)->withQueryString();
            } else {
                $outfits = Outfit::paginate(self::page);
            }
        } else if ($request->filter && 'master' == $request->filter) {
            $outfits = Outfit::where('master_id', $request->master_id)->paginate(self::page)->withQueryString();
        } else if ($request->search && 'all' == $request->search) {
            $outfits = Outfit::where('color', 'like', '%' . $request->s . '%')->orWhere('type', 'like', '%' . $request->s . '%')->orWhere('size', 'like', '%' . $request->s . '%')->paginate(self::page)->withQueryString();
        } else {
            $outfits = Outfit::paginate(self::page)->withQueryString();
        }
        $masters = Master::all();
        $master_id = request()->input('master_id');

        return view('outfit.index', [
            'outfits' => $outfits, 'masters' => $masters,
            'master_id' => $request->$master_id ?? '0', 'sortDirection' => $request->sort_dir ?? 'asc'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $masters = Master::orderBy('surname')->get();
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
        return view('outfit.show', ['outfit' => $outfit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outfit $outfit)
    {
        $masters = Master::orderBy('surname')->get();
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
    public function pdf(Outfit $outfit)
    {
        $pdf = PDF::loadView('outfit.pdf',['outfit'=>$outfit]);
        return $pdf->download($outfit->color.'-'.$outfit->type.'.pdf');
    }
}
