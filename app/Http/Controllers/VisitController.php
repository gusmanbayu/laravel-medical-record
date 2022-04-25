<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitStoreRequest;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Visit;
use RealRashid\SweetAlert\Facades\Alert;

class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::all();
        $doctors = Doctor::all();
        $visits = Visit::all();
        return view('admin.visit.index', compact('visits', 'patients', 'doctors'));
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
    public function store(VisitStoreRequest $request)
    {
        //
        if (Visit::create($request->validated())) {

            Alert::success('Success', 'Visit Created Successfully');
        } else {

            Alert::error('Error', 'Visit Created Unsuccessfully');
        }

        return redirect()->route('visit.index');
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
    public function edit(Visit $visit)
    {
        //
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('admin.visit.edit', compact('visit', 'patients', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisitStoreRequest $request, Visit $visit)
    {
        //
        if ($visit->update($request->validated())) {

            Alert::success('Success', 'Visit Updated Successfully');
        } else {

            Alert::error('Error', 'Visit Updated Unsuccessfully');
        }

        return redirect()->route('visit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        //
        if ($visit->delete()) {
            Alert::success('Success', 'Visit Deleted Successfully');
            return redirect()->route('visit.index');
        } else {
            Alert::error('Failed', 'Visit Deleted Failed');
            return back();
        }
    }
}
