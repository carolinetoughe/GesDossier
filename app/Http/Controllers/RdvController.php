<?php

namespace App\Http\Controllers;

use App\Rdv;
use App\Patient;
use App\User;
use Auth;

use App\Notifications\RdvNotification;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
// use MaddHatter\LaravelFullcalendar\Calendar;

class RdvController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:rdv-list|rdv-create|rdv-edit|rdv-delete', ['only' => ['index','show']]);
         $this->middleware('permission:rdv-create', ['only' => ['create','store']]);
         $this->middleware('permission:rdv-delete', ['only' => ['destroy']]);
         $this->middleware('auth:patient')->except('index','create','delete','edit','show');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $rdvs=Rdv::get();
        return view('rdvs.index',compact('rdvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $patients = Patient::get();
        return view('rdvs.create',compact('patients','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'code' => 'required',
            'patient_id' => 'required',
            'user_id' => 'required',
        ]);
        $form_data = array(
            'date'       =>   $request->date,
            'code'        =>   $request->code,
            'patient_id'        =>   $request->patient_id,
            'user_id'        =>   $request->user_id,

        );

        Rdv::create($form_data);
        $patient_id = $request->patient_id;
        $user_id = $request->user_id;
        $patient = Patient::where('id', $patient_id)->get();
        $user = User::where('id', $user_id)->get();


        if(\Notification::send($patient,new RdvNotification(Rdv::latest('id')->first())) )
{
    if(\Notification::send($user,new RdvNotification(Rdv::latest('id')->first())) )
    {
            return redirect()->route('rdvs.index')
                        ->with('success','nouveau rdv cree.');
    
    }     

}     
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('rdvs.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $rdvs = Rdv::find($id);
        $users= User::get();
        $patients= Patient::get();

        return view('rdvs.edit',compact('users','patients','rdvs'));
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
        $this->validate($request, [
            'date' => 'required',
            'code' => 'required',
            'patient_id' => 'required',
            'user_id' => 'required',
        ]);

        $rdv = Rdv::find($id);
        $rdv->update($request->all());

        return redirect()->route('rdvs.index')
                        ->with('success','rdv updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rdv::findOrFail($id)->delete();
        return redirect()->route('rdvs.index')
        ->with('success','rdv deleted successfully');
    }
    public function rdvindexu()
    {
        $user = Auth::guard()->User();
        $rdvs = $user->rdvs()->get();
        return view('user/rdv.index',compact('rdvs','user'));
            
    }
    public function rdvindexp()
    {
        $patient = Auth::guard('patient')->User();
        $rdvs = $patient->rdvs()->get();
        return view('patient/rdv.index',compact('rdvs','patient'));
            
    }
    public function rdvshowu($id)
    {
        $user = Auth::guard()->User();
        // $consultations = $patient->consultations()->get();
        $rdvs = Rdv::findOrFail($id);
         
        return view('user/rdv.show',compact('rdvs','user'));

        
    }
    public function readrdv($rdv_id)
    {
        // $patient = Auth::guard('patient')->User();
        // $consultations = $patient->consultations()->get();
        $rdvs = Rdv::find($rdv_id);
         
        return view('patient/rdvindex',compact('rdvs'));
    }
    public function markAsRead(Request $r)
    {
        auth()->guard('patient')->user()->unreadNotifications->find($r->not_id)->markAsRead();
    }
}