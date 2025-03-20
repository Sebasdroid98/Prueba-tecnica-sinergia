<?php

namespace App\Http\Requests;

use App\Models\Paciente;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActualizarPacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'numero_documento' => [
                'required', 'string', 'max:15',
                Rule::unique('pacientes')->ignore($this->route('id'))
            ],
            // 'numero_documento'  => ['required','string','max:15'],
            'primer_nombre'     => ['required','string','max:45','regex:/^[\p{L}\s]+$/u'],
            'segundo_nombre'    => ['nullable','string','max:45','regex:/^[\p{L}\s]+$/u'],
            'primer_apellido'   => ['required','string','max:45','regex:/^[\p{L}\s]+$/u'],
            'segundo_apellido'  => ['nullable','string','max:45','regex:/^[\p{L}\s]+$/u'],
            'estado'            => ['required','numeric'],
            'tipo_documento'    => ['required','numeric'],
            'genero'            => ['required','numeric'],
            'departamento'      => ['required','numeric'],
            'municipio'         => ['required','numeric']
        ];
    }

    /**
     * Mensajes de validación personalizados
     */
    public function messages()
    {
        return [
            'numero_documento.required' => 'Por favor ingrese un número de documento',
            'numero_documento.max' => 'La longitud del texto máxima es de 15 caracteres',
            'primer_nombre.required' => 'Por favor ingrese un nombre',
            'primer_nombre.max' => 'La longitud del texto máxima es de 45 caracteres',
            'segundo_nombre.max' => 'La longitud del texto máxima es de 45 caracteres',
            'primer_apellido.required' => 'Por favor ingrese un nombre',
            'primer_apellido.max' => 'La longitud del texto máxima es de 45 caracteres',
            'segundo_apellido.max' => 'La longitud del texto máxima es de 45 caracteres',
            'tipo_documento.required' => 'Por favor seleccione una opción valida',
            'genero.required' => 'Por favor seleccione una opción valida',
            'departamento.required' => 'Por favor seleccione una opción valida',
            'municipio.required' => 'Por favor seleccione una opción valida'
        ];
    }
}
