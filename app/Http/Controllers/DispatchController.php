<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dispatch;
use App\Models\Authorization;
use App\Models\Servicio\Vagoneta;
use App\Actions\Authorization\ImprimirAuthorization;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    
    {
        $authorization = Authorization::find($id);
        $vagonetas = Vagoneta::with('propietario')->where('estatus',1)->get();
        $dispatchs = Dispatch::with('vagoneta.propietario')->where('estatus',1)->where('authorization_id',$id)->get();
        
        return view('dispatchs.index', compact('dispatchs','authorization','vagonetas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dispatchs = Dispatch::all();
        
        return view('dispatchs.create', compact('dispatchs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dispatchs = $request->all();
        Dispatch::create($dispatchs);

        return back()->with('success','Autorización agregado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dispatch = Dispatch::find($id);
        
        return view('dispatchs.show', compact('dispatch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dispatch = Dispatch::find($id);
        
        return view('dispatchs.edit', compact('dispatch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dispatch = Dispatch::find($id);
        if($request->task=='actualizar'){
            $dispatch->vagoneta_id        = $request->vagoneta_id;
            $dispatch->litros_asignado    = $request->litros_asignado;
        }else{
            $dispatch->litros_cargado     = $request->litros_cargado;
            $dispatch->numero_factura     = $request->numero_factura;
        }
        $dispatch->save();

        //return redirect()->route('confdispatchs.index')->with('success','Dispatch actualizado');
        return back()->with('success','Despacho actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Dispatch::destroy($id);

        //return redirect()->route('confdispatchs.index')->with('success','Dispatch eliminado');
        return back()->with('success','Despacho eliminado');
    }

    public function imprimirDispatch(ImprimirAuthorization $imprimirAuthorization, int $id) {//
        $dispatch = Dispatch::with('vagoneta.propietario')->findOrFail($id);
        $pdf = $imprimirAuthorization->handle($dispatch);
        return response($pdf)->header('Content-Type', 'application/pdf');
    }     
}