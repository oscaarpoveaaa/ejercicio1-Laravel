<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class NotasController extends Controller
{
    public function notas()
    {
        $notas = Nota::all(); // Nos saca todas las notas de la BBDD
        return view('notas', @compact('notas'));
    }

    public function detalle($id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.detalle', @compact('nota'));
    }

    public function crear(Request $request)
    {
        $notaNueva = new Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;
        $request->validate(['nombre' => 'required', 'descripcion' => 'required']);
        $notaNueva->save();
        return back()->with('mensaje', 'Nota agregada exitosamente');
    }
    public function editar($id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }
    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        $notaActualizar = Nota::findOrFail($id);
        $notaActualizar->nombre = $request->nombre;
        $notaActualizar->descripcion = $request->descripcion;
        $notaActualizar->save();
        return back()->with('mensaje', 'Nota actualizada');
    }

    public function eliminar($id) {
        $notaEliminar = Nota::findOrFail($id);
        $notaEliminar -> delete();
        return back() -> with('mensaje', 'Nota Eliminada');
        }
}
