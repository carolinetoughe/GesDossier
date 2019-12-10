<?php

namespace App\Http\Controllers;
use App\Consultation;
use App\Analyse;
use App\User;
use App\Repositories\ { FicheRepository, NotificationRepository, ConsultationRepository};
use App\Notifications\FicheRecevoir;
use App\Patient;
use Auth;
use App\Ficheanalyse;
use Illuminate\Http\Request;

class FicheanalyseController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bonanalyse-list|bonanalyse-create|bonanalyse-edit|bonanalyse-delete', ['only' => ['index','store']]);
        $this->middleware('permission:bonanalyse-create', ['only' => ['create','store']]);
        $this->middleware('permission:bonanalyse-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bonanalyse-delete', ['only' => ['destroy']]);
        $this->middleware('auth:patient')->except('index','create','delete','edit','show');

    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ficheanalyses = Ficheanalyse::latest()->paginate(5);
        return view('ficheanalyses.index',compact('ficheanalyses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $consultations = Consultation::get();
        $analyses = Analyse::get();
        return view('ficheanalyses.create',compact('analyses','consultations','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          
            'analyses'=>'required',
        ]);
        $input = $request->all();

        $analyses_id = $request->analyses;
        $ficheanalyses = Ficheanalyse::create($input);
        $analyses = Analyse::whereIn('id', $analyses_id)->get();
        $ficheanalyses->analyses()->sync($analyses);
       

        return redirect()->route('ficheanalyses.index')
                    ->with('success','nouvelle fiche analyse creee.');
    }

    public function createFiche(Consultation $consultation){

        $users = User::get();
        $analyses = Analyse::get();
        return view('ficheanalyses.create',compact('analyses','consultation','users'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function ficheanalyseindex()
    {
        $patient = Auth::guard('patient')->User();

        $consultations = $patient->consultations;
        return view('patient/ficheanalyse.index',compact('consultations','patient'));
            
    }
    public function ficheanalyseshow($id)
    {
        $patient = Auth::guard('patient')->User();
        // $consultations = $patient->consultations()->get();
        $ficheanalyses = Ficheanalyse::findOrFail($id);
         
        return view('patient/ficheanalyse.show',compact('ficheanalyses','patient'));

        
    }
}
