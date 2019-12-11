<?php


namespace App\Http\Controllers;


use App\Consultation;
use App\Notifications\ConsultationNotification;
use App\Patient;
use App\User;
use Auth;
use Illuminate\Http\Request;


class ConsultationController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:consultation-list|consultation-create|consultation-edit|consultation-delete', ['only' => ['index','show']]);
         $this->middleware('permission:consultation-create', ['only' => ['create','store']]);
         $this->middleware('permission:consultation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:consultation-delete', ['only' => ['destroy']]);
         $this->middleware('auth:patient')->except('index','create','store','delete','edit','show');
        }
       
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = Consultation::latest()->paginate(5);
        return view('consultations.index',compact('consultations'));
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

        return view('consultations.create', compact('users','patients'));
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
            'user_id' => 'required',
            'patient_id' => 'required',
            'service_id' => 'required',
            'pression_patient' => 'required',
            'poids_patient' => 'required',
            'taille_patient' => 'required',
            'motif' => 'required',
            'diagnostique' => 'required',
        ]);
        $form_data = array(
            'date'       =>   $request->date,
            'user_id'        =>   $request->user_id,
            'patient_id'        =>   $request->patient_id,
            'service_id'        =>   $request->service_id,
            'pression_patient'        =>   $request->pression_patient,
            'poids_patient'        =>   $request->poids_patient,
            'taille_patient'        =>   $request->taille_patient,
            'numerotelephone'        =>   $request->numerotelephone,
            'motif'        =>   $request->motif,
            'diagnostique'        =>   $request->diagnostique
        );

        Consultation::create($form_data);
        $patient_id = $request->patient_id;
        $patient = Patient::where('id', $patient_id)->get();
        // Notification::send($patient,new ConsultationNotification(Consultation::latest('id')->first()));


//         if(\Notification::send($patient,new ConsultationNotification(Consultation::latest('id')->first())))
// {
        return redirect()->route('consultations.index')
                    ->with('success','nouvelle consultation cree.');

// }     
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('consultations.show',compact('consultation'));

         
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        return view('consultations.edit',compact('consultation'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();


        return redirect()->route('consultations.index')
                        ->with('success',' la consultation a bien ete supprime');
    }
    public function consultationindex()
    {
        $patient = Auth::guard('patient')->User();
        $consultations = $patient->consultations()->get();
        return view('patient/consultation.index',compact('consultations','patient'));
            
    }
    public function consultationshow($id)
    {
        $patient = Auth::guard('patient')->User();
        // $consultations = $patient->consultations()->get();
        $consultations = Consultation::findOrFail($id);
         
        return view('patient/consultation.show',compact('consultations','patient'));

        
    }
}