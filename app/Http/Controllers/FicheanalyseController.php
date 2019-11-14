<?php

namespace App\Http\Controllers;
use App\Consultation;
use App\Analyse;
use App\User;
use App\Repositories\ { FicheRepository, NotificationRepository, ConsultationRepository};
use App\Notifications\FicheRecevoir;
use App\Patient;
use App\Ficheanalyse;
use Illuminate\Http\Request;

class FicheanalyseController extends Controller
{
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
            'date' => 'required',
            'consultation_id' => 'required',
            'analyse_id'=>'required',
        ]);
        $input = $request->all();
        $analyses=Analyse::get('analyses');
        $ficheanalyses = Ficheanalyse::create($input);
        $ficheanalyses->analyses()->sync($analyses);

        return redirect()->route('ficheanalyses.index')
                    ->with('success','nouvelle fiche analyse creee.');
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
    public function recevoir(Request $request, Ficheanalyse $fiche)
{
    $this->ficheRepository->setFiceRecevoir ($fiche);
    $patient = Auth::guard('patient')->User();
    
    $notificationRepository->deleteDuplicate($patient, $fiche);
    $fiche->patient->notify(new FicheRecevoir($fiche, $request->value, $patient->id));
    return redirect()->route('patient.home');
}
}
