<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PatientStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;


class PatientController extends Controller
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

    public function search(Request $request)
    {
        //function for data seacrh
        $search = $request->search;
        $patients = Patient::where('name', 'like', "%" . $search . "%")->paginate();
        return view('admin.patient.index', compact('patients'));
    }
    public function index(Patient $patient)
    {
        //
        $patients = Patient::with('medical')->paginate(10);
        return view('admin.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientStoreRequest $request)
    {
        //
        if (Patient::create($request->validated())) {
            Alert::success('Success', 'Patient Created Successfully');
        } else {
            Alert::error('Error', 'Patient Created Unsuccessfully');
        }

        return redirect()->route('patient.index');
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
        $patients = Patient::find($id);
        return view('admin.patient.show', compact('patients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
        return view('admin.patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientStoreRequest $request, Patient $patient)
    {
        //

        if ($patient->update($request->validated())) {
            Alert::success('Success', 'Patient Updated Successfully');
        } else {
            Alert::error('Error', 'Patient Updated Usuccessfully');
        }
        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
        if (Gate::allows('isAdmin')) {
            // akses logic untuk user dengan role admin
            //     if ($patient->delete()) {
            //         Alert::success('Success', 'Patient Deleted Successfully');
            //         return redirect()->route('patient.index');
            //     } else {
            //         Alert::error('Failed', 'Patient Deleted Failed');
            //         return back();
            //     }
            // } else {
            //     // akses logic untuk user selain role admin
            //     Alert::warning('Warning', "You Can't Access This!");
            //     return back();
            if ($patient->medical()->count()) {
                Alert::warning('Warning', 'Cannot Delete, Patient has record');
                return redirect()->route('patient.index');
            }
        }
    }

    // Generating to PDF
}
