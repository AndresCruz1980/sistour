<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Authorization;

class AuthorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authorizations = Authorization::where('estatus',1)->get();
        
        return view('authorizations.index', compact('authorizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authorizations = Authorization::all();
        
        return view('authorizations.create', compact('authorizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $authorizations = $request->all();
        Authorization::create($authorizations);

        return back()->with('success','Autorización agregado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $authorization = Authorization::find($id);
        
        return view('authorizations.show', compact('authorization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $authorization = Authorization::find($id);
        
        return view('authorizations.edit', compact('authorization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $authorization = Authorization::find($id);

        $authorization->orden        = $request->orden;
        $authorization->fecha        = $request->fecha;
        $authorization->litros       = $request->litros;
        $authorization->save();

        //return redirect()->route('confauthorizations.index')->with('success','Authorization actualizado');
        return back()->with('success','Autorización actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Authorization::destroy($id);

        //return redirect()->route('confauthorizations.index')->with('success','Authorization eliminado');
        return back()->with('success','Autorización eliminado');
    }

}
