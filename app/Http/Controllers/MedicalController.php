<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalStoreRequest;
use App\Models\Action;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Medical;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf;

class MedicalController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicals = Medical::all();
        return view('admin.medical.index', compact('medicals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $patients = Patient::all();
        $actions = Action::all();
        $users = User::where('role', 'doctor')->get();
        $medicines = Medicine::all();
        return view('admin.medical.create', compact(
            'patients',
            'actions',
            'users',
            'medicines'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalStoreRequest $request)
    {
        //
        if (Medical::create($request->validated())) {

            Alert::success('Success', 'Medical Record Created Successfully');
        } else {

            Alert::error('Error', 'Medical Record Created Unsuccessfully');
        }
        return redirect()->route('medical.index');
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
        $medicals = Medical::find($id);
        return view('admin.medical.show', compact('medicals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medical $medical)
    {
        //
        $patient = Patient::all();
        $action = Action::all();
        $user = User::where('role', 'doctor')->get();
        $medicine = Medicine::all();
        return view('admin.medical.edit', compact('medical', 'patient', 'action', 'user', 'medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medical $medical)
    {
        //
        $medical->update($request->all());
        Alert::success('Success', 'Medical Updated Successfully');
        return redirect()->route('medical.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medical $medical)
    {
        //
        if (Gate::allows('isAdmin')) {
            // akses logic untuk user dengan role admin
            $medical->laboratory()->delete();
            $medical->delete();
            Alert::success('Success', 'Record Deleted Successfully');
            return back();
        } else {
            // akses logic untuk user selain role admin
            Alert::warning('Warning', "You Can't Access This!");
            return back();
        }
    }

    public function pdfGenerating()
    {
        $medicals = Medical::all();
        $pdf = PDF::loadView('admin.medical.pdf_convert', compact('medicals'));
        return $pdf->download('medical-record.pdf');
    }
}
