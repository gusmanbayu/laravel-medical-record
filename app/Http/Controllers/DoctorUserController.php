<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Visit;
use App\Models\Medical;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\MedicalStoreRequest;
use App\Models\Doctor;

class DoctorUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicals = Medical::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 1]
        ])->get();
        $visits = Visit::where('doctor_id', Auth::user()->doctor->id)
            ->whereDate('date', date('Y-m-d'))
            ->get();
        $patient_totals = Medical::where('user_id', '=', Auth::user()->id)->count();
        return view('doctor-user.dashboard', compact('visits', 'patient_totals', 'medicals'));
    }
    public function profile()
    {
        return view('doctor-user.profile');
    }
    public function medicalIndex()
    {
        $medicals = Medical::where('user_id', '=', Auth::user()->id)->get();
        return view('doctor-user.medical.index', compact('medicals'));
    }


    public function medicalCheck($id)
    {
        $medical = Medical::findOrFail($id);
        $patient = Patient::all();
        $action = Action::all();
        $medicine = Medicine::all();
        return view('doctor-user.medical.check', compact('medical', 'patient', 'action', 'medicine'));
    }

    public function medicalSave(Request $request, $id)
    {
        $request->validate([

            'action_id' => 'required',
            'medicine_id' => 'required',
            'user_id' => 'required',
            'patient_id' => 'required',
            'diagnose' => 'required',
            'recipe' => 'required',
            'complaint' => 'required',
            'date' => 'required', 'date',
            'description' => 'required', 'max:225',
            'status' => 'required'
        ]);

        if (Medical::findOrFail($id)->update($request->all())) {

            Alert::success('Success', 'Medical Check Successfully Save');
            return redirect()->route('doctor-user.medicalIndex');
        } else {
            Alert::error('Error', 'Medical Check Unsuccessfully Save');
        }
    }

    public function medicalShow($id)
    {
        //
        $medicals = Medical::find($id);
        return view('doctor-user.medical.show', compact('medicals'));
    }

    public function patientIndex()
    {
        $patients = Medical::where('user_id', Auth::user()->id)->get();
        return view('doctor-user.patient.index', compact('patients'));
    }
}
