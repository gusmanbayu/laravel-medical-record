<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorStoreRequest;
use App\Models\Doctor;
use App\Models\Polyclinic;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
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
        $doctors = Doctor::all();
        return view('admin.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $polyclinics = Polyclinic::all();
        return view('admin.doctor.create', compact('polyclinics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = 'doctor';

        $user->save();

        $doctor = new Doctor;
        $doctor->user_id = $user->id;
        $doctor->name = $user->name;
        $doctor->polyclinic_id = $data['polyclinic_id'];
        $doctor->practice_license = $data['practice_license'];
        $doctor->place_birth = $data['place_birth'];
        $doctor->phone_number = $data['phone_number'];
        $doctor->address = $data['address'];

        if ($doctor->save()) {
            Alert::success('Success', 'Doctor Created Successfully');
        } else {
            Alert::error('Error', 'Doctor Created Unsuccessfully');
        }
        return redirect()->route('doctor.index');
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
        $doctors = Doctor::find($id);
        return view('admin.doctor.show', compact('doctors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
        $polyclinic = Polyclinic::all();
        return view('admin.doctor.edit', compact('doctor', 'polyclinic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorStoreRequest $request, Doctor $doctor)
    {
        //
        if ($doctor->update($request->validated())) {
            Alert::success('Success', 'Doctor Updated Successfully');
        } else {
            Alert::error('Error', 'Doctor Updated Unsuccessfully');
        }

        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
        if (Gate::allows('isAdmin')) {
            // akses logic untuk user dengan role admin
            if ($doctor->delete() && $doctor->user()->delete()) {
                Alert::success('Success', 'Patient Deleted Successfully');
                return redirect()->route('patient.index');
            } else {
                Alert::error('Failed', 'Patient Deleted Failed');
                return back();
            }
        } else {
            // akses logic untuk user selain role admin
            Alert::warning('Warning', "You Can't Access This!");
            return back();
        }
    }
}
