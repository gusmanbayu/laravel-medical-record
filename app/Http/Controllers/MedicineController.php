<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicineStoreRequest;
use App\Models\Medicine;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MedicineController extends Controller
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
        $medicines = Medicine::all();
        return view('admin.medicine.index', compact('medicines'));
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
    public function store(MedicineStoreRequest $request)
    {
        //

        if ($request->validated()) {
            foreach ($request->medicine as $key => $value) {
                Medicine::create($value);
            }
            Alert::success('Success', 'Medicine Created Successfully');
        } else {
            Alert::error('error', 'Medicine Created Unsuccessfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
        return view('admin.medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicineStoreRequest $request, Medicine $medicine)
    {
        //
        $medicine->update($request->validated());
        Alert::success('Success', 'Medicine Updated Successfully');
        return redirect()->route('medicine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
        if (Gate::allows('isAdmin')) {
            // akses logic untuk user dengan role admin
            if ($medicine->delete()) {
                Alert::success('Success', 'Medicine Deleted Successfully');
                return redirect()->route('medicine.index');
            } else {
                Alert::error('Failed', 'Medicine Deleted Failed');
                return back();
            }
        } else {
            // akses logic untuk user selain role admin
            Alert::warning('Warning', "You Can't Access This!");
            return back();
        }
    }
}
