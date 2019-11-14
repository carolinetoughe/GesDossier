<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Disponibilite;
use DB;


class DisponibiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:disponibilite-list|disponibilite-create|disponibilite-edit|disponibilite-delete', ['only' => ['index','show']]);
        $this->middleware('permission:disponibilite-create', ['only' => ['create','store']]);
        $this->middleware('permission:disponibilite-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:disponibilite-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $disponibilites = Disponibilite::orderBy('id','DESC')->paginate(5);
        return view('disponibilites.index',compact('disponibilites'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view('disponibilites.create',compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'user_id' => 'required',
            'lundi' => 'required',
            'mardi' => 'required',
            'mercredi' => 'required',
            'jeudi' => 'required',
            'vendredi' => 'required',
        ]);


        Disponibilite::create($request->all());
        return redirect()->route('disponibilites.index')
                        ->with('success','Horaires fixees');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disponibilites = Disponibilite::find($id);
        return view('disponibilites.show',compact('disponibilites'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::get();
        $disponibilites = Disponibilite::find($id);
        return view('disponibilites.edit',compact('disponibilites',('users')));
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
            
            'lundi' => 'required',
            'mardi' => 'required',
            'mercredi' => 'required',
            'jeudi' => 'required',
            'vendredi' => 'required',
        ]);
        $selection = Disponibilite::find($id);
        $selection->update($request->all());

        return redirect()->route('disponibilites.index')
                        ->with('success','Horaires Modifies Avec Succes');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disponibilite::findOrFail($id)->delete();
        return redirect('disponibilites')
                        ->with('success', 'Disponibilite supprime');


    }
}