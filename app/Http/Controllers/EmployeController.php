<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class EmployeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('employe.index', ['employees' => Employe::with('company')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employe.create', ['company' => Company::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:employe',
            'company_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput($request->input())->withErrors($validator);
        } else {
            Employe::create([
                'name' => $request->name,
                'email' => $request->email,
                'company_id' => $request->company_id
            ]);
        }

        return redirect()->route('employe.index')->with('success','Success insert!');
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
    public function edit($id)
    {
        $company = Company::all();
        $employe = Employe::findOrFail($id);

        return view('employe.edit', compact('company', 'employe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'company_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput($request->input())->withErrors($validator);
        } else {
            Employe::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'company_id' => $request->company_id
            ]);
        }

        return redirect()->route('employe.index')->with('success','Success update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employe::findOrFail($id)->delete();

        return redirect()->route('employe.index')->with('success','Success delete!');
    }
}
