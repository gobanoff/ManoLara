<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Http\Requests\StoreMasterRequest;
use App\Http\Requests\UpdateMasterRequest;
use Validator;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masters = Master::all();
        return view('master.index', ['masters' => $masters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMasterRequest $request)
    {

        $validator = Validator::make($request->all(), [
            'master_name' => ['required', 'min:3', 'max:64'],
            'master_surname' => ['required', 'min:3', 'max:64'],
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $master = new Master;
        $master->name = $request->master_name;
        $master->surname = $request->master_surname;
        $master->save();
        return redirect()->route('master.index')->with('success_message', 'New master has arrived');
    }

    /**
     * Display the specified resource.
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Master $master)
    {
        return view('master.edit', ['master' => $master]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMasterRequest $request, Master $master)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'master_name' => ['required', 'min:3', 'max:64'],
                'master_surname' => ['required', 'min:3', 'max:64'],
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $master->name = $request->master_name;
        $master->surname = $request->master_surname;
        $master->save();
        return redirect()->route('master.index')->with('success_message', 'The master was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Master $master)
    {
        if ($master->getOutfits()->count()) {
            return  redirect()->back()->with('info_message', 'it is not allowed');
        }
        $master->delete();
        return redirect()->route('master.index')->with('danger_message', 'The master  deleted');
    }
}
