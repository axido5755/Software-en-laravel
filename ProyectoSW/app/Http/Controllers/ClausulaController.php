<?php

namespace App\Http\Controllers;

use App\Models\clausula;
use Illuminate\Http\Request;
use DB;

class ClausulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['clausula'] = clausula::paginate(5);
        return view('clausula.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clausula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $datoClausula = request()->except('_token');
        clausula::insert($datoClausula);
        return redirect('clausula');
        // $dato = request()->all();
        // return response()->json($dato);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clausula  $clausula
     * @return \Illuminate\Http\Response
     */
    public function show($id_clausula)
    {
        $datos['clausula'] = clausula::findOrFail($id_clausula);
        return view('clausula.show', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clausula  $clausula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dato['clausula'] = clausula::findOrFail($id);
        return view('clausula.edit', $dato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clausula  $clausula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_clausula)
    {
        $dato = request()->except(['_token','_method']);
        clausula::where('$id_clausula','=',$id_clausula)->update($dato);
        return redirect('clausula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clausula  $clausula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_clausula)
    {
        clausula::destroy($id_clausula);
        return redirect('clausula');
    }

    public function findcontenido(Request $request){
	
		//it will get price if its id match with product id
		$p=clausula::select('Contenido')->where('id_clausula',$request->id_clausula)->first();
		
    	return response()->json($p);
    }

    public function store2(Request $request)
    {
        $datoClausula = request()->except('_token');
        clausula::insert($datoClausula);
        $date = clausula::all()->last();
        return response()->json($date);
    }
    public function findultimaclausula()
    {
        $date = clausula::all()->last();
        return response()->json($date);
    }
}