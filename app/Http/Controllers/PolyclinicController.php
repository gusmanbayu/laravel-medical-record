<?php

namespace App\Http\Controllers;

use App\Http\Requests\PolyclinicStoreRequest;
use App\Models\Polyclinic;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PolyclinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $polyclinics = Polyclinic::all();
        return view('admin.polyclinic.index', compact('polyclinics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PolyclinicStoreRequest $request)
    {
        //
        $request->validated();

        foreach ($request->polyclinic as $key => $value) {
            if (Polyclinic::create($value)) {
                Alert::success('Success', 'Polyclinic Created Successfully');
            } else {
                Alert::error('Error', 'Polyclinic Created Unsuccessfully');
            }
        }
        return back();
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Polyclinic $polyclinic)
    {
        //
        return view('admin.polyclinic.edit', compact('polyclinic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PolyclinicStoreRequest $request, Polyclinic $polyclinic)
    {
        //
        if ($polyclinic->update($request->validated())) {

            Alert::success('Success', 'Polyclinic Updated Successfully');
        } else {

            Alert::error('Error', 'Polyclinic Updated Unsuccessfully');
        }
        return redirect()->route('polyclinic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Polyclinic $polyclinic)
    {
        //
        if (Gate::allows('isAdmin')) {
            // akses logic untuk user dengan role admin
            if ($polyclinic->doctor()->delete() && $polyclinic->delete()) {
                Alert::success('Success', 'Polyclinic Deleted Successfully');
                return redirect()->route('polyclinic.index');
            } else {
                Alert::error('Failed', 'polyclinic Deleted Failed');
                return back();
            }
        } else {
            // akses logic untuk user selain role admin
            Alert::warning('Warning', "You Can't Access This!");
            return back();
        }
    }
}
