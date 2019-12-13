<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Antecedent;


class AntecedentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    { 
        $this->middleware('auth:patient')->except('logout');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Auth::guard('patient')->User();
        $antecedents = $patient->antecedents()->get();
            
        return view('antecedents.index',compact('antecedents','patient'));
    }
    public function create()
    {
        $patients = Auth::guard('patient')->User();
        return view('antecedents.create',compact('patients'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'traitement' => 'required',
            'patient_id' => 'required',
            
        ]);
        $form_data = array(
            'nom'       =>   $request->nom,
            'traitement'        =>   $request->traitement,
            'patient_id'        =>   $request->patient_id,
            

        );

        $antecedent = Antecedent::create($form_data);
        return redirect()->route('antecedents.index')
                        ->with('success','nouveau antecedent cree.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('antecedents.show');
    }
    public function edit($id)
    {
        
        $antecedents = Antecedent::find($id);
        $patients = Auth::guard('patient')->User();
        // $patients= Patient::get();

        return view('antecedents.edit',compact('patients','antecedents'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
            'traitement' => 'required',
            'patient_id' => 'required',
            
        ]);

        $rdv = Antecedent::find($id);
        $rdv->update($request->all());

        return redirect()->route('antecedents.index')
                        ->with('success','antecedent updated successfully');
    }
    public function destroy($id)
    {
        Antecedent::findOrFail($id)->delete();
        return redirect()->route('antecedents.index')
        ->with('success','antecedent deleted successfully');
    }
}
