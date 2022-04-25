<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaboratoryStoreRequest;
use App\Models\Laboratory;
use App\Models\Medical;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicals = Medical::all();
        $laboratories = Laboratory::all();
        return view('admin.laboratory.index', compact('laboratories', 'medicals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaboratoryStoreRequest $request)
    {
        //
        if (Laboratory::create($request->validated())) {

            Alert::success('Success', 'Laboratory Record Created Successfully');
        } else {

            Alert::error('Error', 'Laboratory Record Created Unsuccessfully');
        }
        return redirect()->route('laboratory.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratory $laboratory)
    {
        //
        $medical = Medical::all();
        return view('admin.laboratory.edit', compact('laboratory', 'medical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LaboratoryStoreRequest $request, Laboratory $laboratory)
    {
        //
        if ($laboratory->update($request->validated())) {
            Alert::success('Success', 'Laboratory Updated Successfully');
        } else {
            Alert::error('Error', 'Laboratory Updated Usuccessfully');
        }
        return redirect()->route('laboratory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $laboratory)
    {
        //
        if (Gate::allows('isAdmin')) {
            // akses logic untuk user dengan role admin
            if ($laboratory->delete()) {
                Alert::success('Success', 'Laboratory Deleted Successfully');
                return redirect()->route('laboratory.index');
            } else {
                Alert::error('Failed', 'Laboratory Deleted Failed');
                return back();
            }
        } elseif (Gate::allows('isDoctor')) {
            // akses logic untuk user dengan role admin
            if ($laboratory->delete()) {
                Alert::success('Success', 'Laboratory Deleted Successfully');
                return redirect()->route('laboratory.index');
            } else {
                Alert::error('Failed', 'Laboratory Deleted Failed');
                return back();
            }
        } else {
            // akses logic untuk user selain role admin
            Alert::warning('Warning', "You Can't Access This!");
            return back();
        }
    }
}
