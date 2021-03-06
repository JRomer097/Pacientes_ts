<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Models\Registro_pulsera;
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
        //$registro_pulsera = registro_pulsera::select('registro_pulsera')->WHERE('id_pacientePersonalizada', $datos->id_pacientePersonalizada);
        /*$registro_pulsera = Pacientes::select("SELECT * FROM registro_pulsera 
        WHERE id_pacientePersonalizada = ? ", $datos->id_pacientePersonalizada); */
        //$datos_pulsera = $registro_pulsera;
        /*return view('grafica', ['datos' => $datos,
                    'registro_pulsera'=>$registro_pulsera]);*/
        //$registro_pulsera = registro_pulsera::where('id_pacientePersonalizada','=',$datos->id_pacientePersonalizada);
        $registro_pulsera = Registro_pulsera::find($datos->id);
        return $registro_pulsera;
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
            
        ],  ['nombre_p.required'=>'Necesito un nombre', 
            'apellidoP_p.required'=>'Necesito un apellido paterno',
            'apellidoM_p.required'=>'Necesito un apellido materno',
            'edad.required'=>'Necesito una edad',
            'peso.required'=>'Necesito un peso',
            'altura.required'=>'Necesito la altura',
            'tipo_de_sangre.required'=>'Necesito el tipo de sangre']
        );

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
        $update_id_paciente = Pacientes::select("CALL actualizar_id_pacientePersonalizado()");
        return back();
    }

    //Borra la informacion del paciente
    public function delete(Pacientes $pacientes)
    {
        $pacientes ->delete();
        return back();
    }

}
