<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unite;
use App\Module;

class moduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
   //  OrderBy('id','desc')->paginate(3);
         $uv = Unite::OrderBy('unites.code','desc')->get() ;

        $mod= Module::join('unites', 'modules.unite_id', '=','unites.id')
                        ->select('unites.code','unites.intitule as uv','modules.intitule as m','modules.coef as coef')
                        ->OrderBy('unites.intitule','asc')
                        ->paginate(2);

      
         return view('frontEnd.module', compact('uv','mod')) ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $uv = Unite::where('code', $request->cod)->first();
         $uv = $uv->fresh(); 
         $uv_id = $uv->id ;

        $module = new Module ;
        $module->unite_id = $uv_id;
        $module->intitule = $request->module;
        $module->coef = $request->coef;

        $module->save() ;

        return redirect()->route('module.index');
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
}
