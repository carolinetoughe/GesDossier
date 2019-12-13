<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
    $this->middleware('auth:patient')->except('logout','create','liste','store','show','edit','destroy');
    $this->middleware('auth')->except('index','editinfo');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $patient = Auth::guard('patient')->User();
        return view('patient.home', compact('patient'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient/create');
    }
    /** Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'nom'    =>  'required',
           
            'civilite'    =>  'required',
            'pieceidentite'    =>  'required',
            'prenom'     =>  'required',
            'sexe'     =>  'required',
            'datenaissance'     =>  'required',
            'adresse'     =>  'required',
            'nationalite'     =>  'required',
            'groupesanguin'     =>  'required',
            'numerotelephone'     =>  'required',
            'nomurgence'     =>  'required',
            'numerourgence'     =>  'required',
            'email'     =>  'required',
            'password'     =>  'required',
            'image'         =>  'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'nom'       =>   $request->nom,
            'prenom'        =>   $request->prenom,
            'sexe'        =>   $request->sexe,
            'civilite'       =>   $request->civilite,

            'pieceidentite'       =>   $request->pieceidentite,

            'datenaissance'        =>   $request->datenaissance,
            'adresse'        =>   $request->adresse,
            'nationalite'        =>   $request->nationalite,
            'groupesanguin'        =>   $request->groupesanguin,
            'numerotelephone'        =>   $request->numerotelephone,
            'nomurgence'        =>   $request->nomurgence,
            'numerourgence'        =>   $request->numerourgence,
            'image'            =>   $new_name,
            'email'        =>   $request->email,
            'password' => Hash::make($request->password)
        );

        Patient::create($form_data);
        
        return redirect()->route('patient.liste')->with('success', 'Patient ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data = Patient::findOrFail($id);
        // $data = Patient::where('id', $id)->firstOrFail();
        return view('patient/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = Patient::findOrFail($id);
        return view('patient/edit', compact('data'));
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
         $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
            'nom'    =>  'required',
            'prenom'     =>  'required',
            'sexe'     =>  'required',
            'dossier'    =>  'required',

            'civilite'    =>  'required',
            'pieceidentite'    =>  'required',
            'datenaissance'     =>  'required',
            'adresse'     =>  'required',
            'nationalite'     =>  'required',
            'groupesanguin'     =>  'required',
            'numerotelephone'     =>  'required',
            'nomurgence'     =>  'required',
            'numerourgence'     =>  'required',
            'email'     =>  'required',
            'password'     =>  'required',
            'image'         =>  'required|image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
 'nom'    =>  'required',
            'prenom'     =>  'required',
            'sexe'     =>  'required',
            'dossier'    =>  'required',

            'civilite'    =>  'required',
            'pieceidentite'    =>  'required',
            'datenaissance'     =>  'required',
            'adresse'     =>  'required',
            'nationalite'     =>  'required',
            'groupesanguin'     =>  'required',
            'numerotelephone'     =>  'required',
            'nomurgence'     =>  'required',
            'numerourgence'     =>  'required',
            'email'     =>  'required',
            'password'     =>  'required',
            ]);
        }

        $form_data = array(
            'nom'       =>   $request->nom,
            'prenom'        =>   $request->prenom,
            'sexe'        =>   $request->sexe,
            'dossier'       =>   $request->dossier,
            'civilite'       =>   $request->civilite,

            'pieceidentite'       =>   $request->pieceidentite,
            'datenaissance'        =>   $request->datenaissance,
            'adresse'        =>   $request->adresse,
            'nationalite'        =>   $request->nationalite,
            'groupesanguin'        =>   $request->groupesanguin,
            'numerotelephone'        =>   $request->numerotelephone,
            'nomurgence'        =>   $request->nomurgence,
            'numerourgence'        =>   $request->numerourgence,
            'image'            =>   $image_name,
            'email'        =>   $request->email,
            'password' => Hash::make($request->password)
        );
  
        Patient::whereId($id)->update($form_data);

        return redirect()->route('patient.index')
        ->with('success','informations bien modifiees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = Patient::find($id);
        $data->delete();
        return redirect()->route('patient.liste')->with('success', 'Patient supprime');
 
    }
    public function liste()
    {
        $data = Patient::latest()->paginate(5);
        return view('patient.index', compact('data'));
    }
    public function editinfo()
    {
        $data = Auth::guard('patient')->User();
        return view('patient/editinfo', compact('data'));
    }

}
