<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Validation\Rule;


class NotaController extends Controller
{
    //
    public function index(){
        $notas = Nota::paginate(100);
        return view ('notas.index')->with('notas', $notas);

    }

    public function create()
    {
        return view('notas.formulario');
    }

    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
            'contenido' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
            'fecha_creacion'=> 'date',
        ]);

        $nuevaNota = new Nota();
        $nuevaNota->titulo = $request->input('titulo');
        $nuevaNota->contenido = $request->input('contenido');
        $nuevaNota->fecha_creacion = $request->input('creacion');
    
        if($nuevaNota->save()) {
            return redirect()->route('notas.index')->with('mensaje', 'La nota fue guardada exitosamente');
        } else {
            return redirect()->route('notas.index')->with('mensaje', 'Error. La nota no pudo guardarse');
        }

    }

    public function show($id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.show')->with('nota', $nota);
    }

    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.formulario')->with('nota', $nota);
    }

    public function update(Request $request, $id)
    {
        //
        $nota = Nota::findOrFail($id);

        $request->validate([
            'titulo' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
            'contenido' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
            'fecha_creacion'=> 'date',
        ]);

        $aNota-> titulo = $request->input('titulo');
        $aNota-> contenido = $request->input('contenido');
        $aNota->fecha_creacion = $request->input('creacion');
    
        if($aNota->save()) {
            return redirect()->route('notas.index')->with('mensaje', 'La nota fue guardada exitosamente');
        } else {
            return redirect()->route('notas.index')->with('mensaje', 'Error. La nota no pudo guardarse');
        }

    }

    public function destroy($id)
    {
        //
        if (Nota::destroy($id) > 0) {
            return redirect()->route('notas.index')->with('mensaje', 'Nota borrada exitosamente');
        } else {
            return redirect()->route('notas.index')->with('mensaje', 'La nota no pudo ser eliminada');
        }
    }
}
