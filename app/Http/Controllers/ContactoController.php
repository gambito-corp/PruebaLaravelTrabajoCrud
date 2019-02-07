<?php

namespace App\Http\Controllers;

use App\contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = contacto::all();
        return view ('contacto.gestion', [
            'contactos' => $contactos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('contacto.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valido el request
        $validate = $this->validate($request, [
            'nombre'=>'required',
            'apellido'=>'required',
            'edad'=>'required',
            'telefono'=>'required',
            'correo'=>'email|required',
            'mensaje'=>'required',
        ]);
        //paso a variables
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $edad = $request->input('edad');
        $telefono = $request->input('telefono');
        $correo = $request->input('correo');
        $mensaje = $request->input('mensaje');
        // instancio objeto
        $contacto = new contacto();
        // seteo datos
        $contacto->nombre = $nombre;
        $contacto->apellido = $apellido;
        $contacto->edad = $edad;
        $contacto->telefono = $telefono;
        $contacto->correo = $correo;
        $contacto->mensaje = $mensaje;
        //guardo el objeto
        $save = $contacto->save();
        //redirijo a vista 
        if ($save) {
            return redirect()->route('contacto.contactanos')->with([
                        'message' => 'contacto enviado exitosamente'
            ]);
        } else {
            return redirect()->route('contacto.contactanos')->with([
                        'message' => 'fallo al enviar contacto'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto = contacto::find($id);
        return view('contacto.perfil', [
            'contacto' => $contacto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(contacto $contacto, $id)
    {
        $contacto = contacto::find($id);
        return view('contacto.editar', [
            'contacto' => $contacto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contacto $contacto)
    {   //paso a variables
        $id = $request->input('id');
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $edad = $request->input('edad');
        $telefono = $request->input('telefono');
        $correo = $request->input('correo');
        $mensaje = $request->input('mensaje');
        // instancio objeto
        $contacto = contacto::find($id);
        // seteo datos
        $contacto->nombre = $nombre;
        $contacto->apellido = $apellido;
        $contacto->edad = $edad;
        $contacto->telefono = $telefono;
        $contacto->correo = $correo;
        $contacto->mensaje = $mensaje;
        //guardo el objeto
        $update = $contacto->update();
        //redirijo a vista 
        if ($update) {
            return redirect()->route('contacto.gestion')->with([
                        'message' => 'contacto actualizado exitosamente'
            ]);
        } else {
            return redirect()->route('contacto.gestion')->with([
                        'message' => 'fallo al actualizar contacto'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto = contacto::find($id);
        $delete = $contacto->delete();
        if ($delete) {
            //delete correcto
            return redirect()->route('contacto.gestion')
                            ->with(['message' => 'contacto eliminado con exito']);
        } else {
            //delete incorrecto
            return redirect()->route('contacto.gestion')
                            ->with(['message' => 'contacto no eliminado']);
        }
    }
}
