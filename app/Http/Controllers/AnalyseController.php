<?php


namespace App\Http\Controllers;
use App\Analyse;
use Illuminate\Http\Request;


class AnalyseController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:analyse-list|analyse-create|analyse-edit|analyse-delete', ['only' => ['index','show']]);
         $this->middleware('permission:analyse-create', ['only' => ['create','store']]);
         $this->middleware('permission:analyse-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $analyses = Analyse::orderBy('id','DESC')->paginate(5);
        return view('analyses.index',compact('analyses'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('analyses.create');
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
            'nom' => 'required',
            'prix' => 'required',
        ]);


        Analyse::create($request->all());
        return redirect()->route('analyses.index')
                        ->with('success','analyse created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Analyse  $analyse
     * @return \Illuminate\Http\Response
     */
    public function show(Analyse $analyse)
    {
        return view('analyses.show');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analyse  $analyse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analyse = Analyse::find($id);
        return view('analyses.edit',compact('analyse'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prix' => 'required',
        ]);

        $analyse = Analyse::find($id);
        $analyse->update($request->all());

        return redirect()->route('analyses.index')
                        ->with('success','analyse updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\analyse  $analyse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Analyse::findOrFail($id)->delete();
        return redirect()->route('analyses.index')
                        ->with('success','analyse deleted successfully');
    }
}