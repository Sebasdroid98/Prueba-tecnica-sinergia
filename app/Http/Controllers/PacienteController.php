<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarPacienteRequest;
use App\Http\Requests\RegistrarPacienteRequest;
use App\Models\Departamento;
use App\Models\Genero;
use App\Models\Municipio;
use App\Models\Paciente;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        // dd($pacientes[0]->tipoDocumento);
        return view('dashboard', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = Genero::all();
        $departamentos = Departamento::all();
        $tipoDocumentos = TipoDocumento::all();
        $estados = ['1' => 'Habilitado', '0' => 'Deshabilitado'];
        return view('paciente.create', compact('generos','departamentos','tipoDocumentos','estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrarPacienteRequest $request)
    {
        $datosFormulario = $request->except('_token','_method');

        // Se define automaticamente su estado como habilitado
        $datosFormulario['estado'] = true;

        $pacienteObj = new Paciente();
        $pacienteObj->numero_documento  = $datosFormulario['numero_documento'];
        $pacienteObj->primer_nombre     = $datosFormulario['primer_nombre'];
        $pacienteObj->segundo_nombre    = $datosFormulario['segundo_nombre'];
        $pacienteObj->primer_apellido   = $datosFormulario['primer_apellido'];
        $pacienteObj->segundo_apellido  = $datosFormulario['segundo_apellido'];
        $pacienteObj->estado            = $datosFormulario['estado'];
        $pacienteObj->tipo_documento_id = $datosFormulario['tipo_documento'];
        $pacienteObj->genero_id         = $datosFormulario['genero'];
        $pacienteObj->municipio_id      = $datosFormulario['municipio'];
        $pacienteObj->save();
        // dd($pacienteObj);

        return redirect('/dashboard')->with('success','Se registró la información del paciente con ID: '. $datosFormulario['numero_documento'] .' con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        $generos = Genero::all();
        $departamentos = Departamento::all();
        $tipoDocumentos = TipoDocumento::all();
        $estados = ['1' => 'Habilitado', '0' => 'Deshabilitado'];

        return view('paciente.edit', compact('paciente','generos','departamentos','tipoDocumentos','estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActualizarPacienteRequest $request, $id)
    {
        $datosFormulario = $request->except('_token','_method');

        Paciente::where('id',$id)->update([
            'numero_documento'  => $datosFormulario['numero_documento'],
            'primer_nombre'     => $datosFormulario['primer_nombre'],
            'segundo_nombre'    => $datosFormulario['segundo_nombre'],
            'primer_apellido'   => $datosFormulario['primer_apellido'],
            'segundo_apellido'  => $datosFormulario['segundo_apellido'],
            'estado'            => $datosFormulario['estado'],
            'tipo_documento_id' => $datosFormulario['tipo_documento'],
            'genero_id'         => $datosFormulario['genero'],
            'municipio_id'      => $datosFormulario['municipio'],
        ]);

        return redirect('/dashboard')->with('info','Se actualizó la información del paciente con ID: '. $datosFormulario['numero_documento'] .' con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Paciente::destroy($id);
        return response()->json([
            'data' => true,
            'origin' => 'ptc-sinergia'
        ]);
    }

    /**
     * Función para obtener los municipios de un departamento por su id
     * @param Int $id
     * @return Json
     */
    public function obtenerMunicipiosDeptoById(Int $id) {
        $municipios = Municipio::where('departamento_id', $id)->get();
        return response()->json([
            'data' => $municipios,
            'origin' => 'ptc-sinergia'
        ]);
    }
}
