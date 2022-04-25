<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionStoreRequest;
use Illuminate\Http\Request;
use App\Models\Action;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class ActionController extends Controller
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
        $actions = Action::all();
        return view('admin.action.index', compact('actions'));
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
    public function store(ActionStoreRequest $request)
    {
        //
        if (Action::create($request->validated())) {
            Alert::success('Success', 'Action Created Successfully');
        } else {
            Alert::error('Error', 'Action Created Unsuccessfully');
        }

        return redirect()->route('action.index');
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
    public function edit(Action $action)
    {
        //
        return view('admin.action.edit', compact('action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActionStoreRequest $request, Action $action)
    {
        //
        if ($action->update($request->validated())) {
            Alert::success('Success', 'Action Updated Successfully');
        } else {
            Alert::error('Error', 'Action Updated Unsuccessfully');
        }
        return redirect()->route('action.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Action $action)
    {
        //
        if (Gate::allows('isAdmin')) {
            // akses logic untuk user dengan role admin
            if ($action->delete()) {
                Alert::success('Success', 'Action Deleted Successfully');
                return redirect()->route('action.index');
            } else {
                Alert::error('Failed', 'Action Deleted Failed');
                return back();
            }
        } else {
            // akses logic untuk user selain role admin
            Alert::warning('Warning', "You Can't Access This!");
            return back();
        }
    }
}
