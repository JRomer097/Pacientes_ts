<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;
class PacientesController extends Controller
{
    //Mandamos y mostramos la información de la DB
    public function index()
    {
        $pacientes = Pacientes::all();
        return view('add_pacientes', [
            'pacientes' => $pacientes
        ]);
    }

    //Ventana para graficar la informacion del paciente
    public function graficar(Pacientes $pacientes)
    {
        $datos = $pacientes;
        return view('grafica', ['datos' => $datos]);
        //return $datos;
    }

    //Ventana para editar los datos del paciente
    public function editar($pacientes)
    {
        $datos = Pacientes::find($pacientes);
        return view('Editar', ['datos' => $datos]);
    }

    //Actualizar la informacion del paciente
    public function update(Request $request, $pacientes)
    {
        $paciente = Pacientes::find($pacientes);
        $paciente->nombre_p = $request ->nombre_p;
        $paciente->apellidoP_p = $request ->apellidoP_p;
        $paciente->apellidoM_p = $request ->apellidoM_p;
        $paciente->edad = $request ->edad;
        $paciente->peso = $request ->peso;
        $paciente->altura = $request ->altura;
        $paciente->tipo_de_sangre = $request ->tipo_de_sangre;
        $paciente -> save();
        return redirect() -> route('pacientes.index');
    }

    //Guarda la informacion del nuevo paciente
    public function store(Request $request)
    {
        //Validamos los parametros
        $validar = $request -> validate([
            'nombre_p' => 'required',
            'apellidoP_p' => 'required',
            'apellidoM_p' => 'required',
            'edad' => 'required|numeric|min:3',
            'peso' =>'required',
            'altura' => 'required',
            'tipo_de_sangre' => 'required|min:2'
            
        ]);

        //Guardamos la informción del nuevo paciente al validarlo
        Pacientes::create([
            'nombre_p' => $request -> nombre_p,
            'apellidoP_p' => $request -> apellidoP_p,
            'apellidoM_p' => $request -> apellidoM_p,
            'edad' => $request -> edad,
            'peso' => $request -> peso,
            'altura' => $request -> altura,
            'tipo_de_sangre' => $request -> tipo_de_sangre
        ]);
        $update_id_paciente = Pacientes::select('CALL add_id_paciente()');
        return back();
    }

    //Borra la informacion del paciente
    public function delete(Pacientes $pacientes)
    {
        $pacientes ->delete();
        return back();
    }

}
