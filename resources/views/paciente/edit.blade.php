<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar información del paciente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <h2 class="text-xl font-semibold mb-4 dark:text-white text-center">Información del paciente</h2>
                <x-alert class="bg-blue-300 text-center mb-2" title="Nota!">
                    Cada una de las listas desplegables tienen secciones "Actual" y "Dísponible".
                </x-alert>
                <form method="POST" action="{{ route('paciente.update', ['id' => $paciente->id])}}" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="flex my-3">
                        <div class="size-1/5">
                            <x-input-label for="numero_documento" :value="__('Número documento')" />
                            <x-text-input id="numero_documento" class="block mt-1 w-full" type="text" name="numero_documento" placeholder="obligatorio" :value="$paciente->numero_documento" required />
                            <x-input-error :messages="$errors->get('numero_documento')" class="mt-2" />
                        </div>
                        
                        <div class="size-1/5">
                            <x-input-label for="primer_nombre" :value="__('Primer nombre')" />
                            <x-text-input id="primer_nombre" class="block mt-1 w-full" type="text" name="primer_nombre" placeholder="obligatorio" :value="$paciente->primer_nombre" required />
                            <x-input-error :messages="$errors->get('primer_nombre')" class="mt-2" />
                        </div>
    
                        <div class="size-1/5">
                            <x-input-label for="segundo_nombre" :value="__('Segundo nombre')" />
                            <x-text-input id="segundo_nombre" class="block mt-1 w-full" type="text" name="segundo_nombre" placeholder="opcional" :value="$paciente->segundo_nombre" required />
                            <x-input-error :messages="$errors->get('segundo_nombre')" class="mt-2" />
                        </div>
    
                        <div class="size-1/5">
                            <x-input-label for="primer_apellido" :value="__('Primer apellido')" />
                            <x-text-input id="primer_apellido" class="block mt-1 w-full" type="text" name="primer_apellido" placeholder="obligatorio" :value="$paciente->primer_apellido" required />
                            <x-input-error :messages="$errors->get('primer_apellido')" class="mt-2" />
                        </div>
    
                        <div class="size-1/5">
                            <x-input-label for="segundo_apellido" :value="__('Segundo apellido')" />
                            <x-text-input id="segundo_apellido" class="block mt-1 w-full" type="text" name="segundo_apellido" placeholder="opcional" :value="$paciente->segundo_apellido" required />
                            <x-input-error :messages="$errors->get('segundo_apellido')" class="mt-2" />
                        </div>
                    </div>

                    <x-alert class="bg-blue-300 text-center mb-2" title="Nota!">
                        Al cambiar de departamento sus municipios se mostrarán en la sección "Dísponible" de la lista desplegable "Municipio".
                    </x-alert>

                    <div class="flex">
                        <div class="size-1/5">
                            <x-input-label for="estado" :value="__('Estado')" />
                            <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-gray-700" id="estado" name="estado">
                                <optgroup label="Actual">
                                    <option value="{{ $paciente->estado }}">{{ $paciente->estado ? 'Habilitado' : 'Deshabilitado' }}</option>
                                </optgroup>
                                <optgroup label="Dísponible">
                                    @forelse ($estados as $estadoId => $estadoNombre)
                                        @continue($estadoId == $paciente->estado)
                                        <option value="{{ $estadoId }}">{{ $estadoNombre }}</option>
                                    @empty
                                    @endforelse
                                </optgroup>
                            </select>
                            <x-input-error :messages="$errors->get('tipo_documento')" class="mt-2" />
                        </div>
                        <div class="size-1/5">
                            <x-input-label for="tipo_documento" :value="__('Tipo documento')" />
                            <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-gray-700" id="tipo_documento" name="tipo_documento">
                                <optgroup label="Actual">
                                    <option value="{{ $paciente->tipoDocumento->id }}">{{ $paciente->tipoDocumento->nombre }}</option>
                                </optgroup>
                                <optgroup label="Dísponible">
                                    @forelse ($tipoDocumentos as $tipo)
                                        @continue($tipo->id == $paciente->tipoDocumento->id)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @empty
                                    @endforelse
                                </optgroup>
                            </select>
                            <x-input-error :messages="$errors->get('tipo_documento')" class="mt-2" />
                        </div>
                        <div class="size-1/5">
                            <x-input-label for="genero" :value="__('Genero')" />
                            <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-gray-700" id="genero" name="genero">
                                <optgroup label="Actual">
                                    <option value="{{ $paciente->genero->id }}">{{ $paciente->genero->nombre }}</option>
                                </optgroup>
                                <optgroup label="Dísponible">
                                    @forelse ($generos as $genero)
                                        @continue($genero->id == $paciente->genero->id)
                                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                    @empty
                                    @endforelse
                                </optgroup>
                            </select>
                            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                        </div>
                        <div class="size-1/5">
                            <x-input-label for="departamento" :value="__('Departamento')" />
                            <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-gray-700" id="departamento" name="departamento">
                                <optgroup label="Actual">
                                    <option value="{{ $paciente->municipio->departamento->id }}">{{ $paciente->municipio->departamento->nombre }}</option>
                                </optgroup>
                                <optgroup label="Dísponible">
                                    @forelse ($departamentos as $depto)
                                        @continue($depto->id == $paciente->municipio->departamento->id)
                                        <option value="{{ $depto->id }}">{{ $depto->nombre }}</option>
                                    @empty
                                    @endforelse
                                </optgroup>
                            </select>
                            <x-input-error :messages="$errors->get('departemento')" class="mt-2" />
                        </div>
                        <div class="size-1/5">
                            <x-input-label for="municipio" :value="__('Municipio')" />
                            <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-gray-700" id="municipio" name="municipio">
                                <optgroup label="Actual">
                                    <option value="{{ $paciente->municipio->id }}">{{ $paciente->municipio->nombre }}</option>
                                </optgroup>
                                <!-- AQUÍ SE CARGARAN MEDIANTE AJAX LOS MUNICIPIOS DISPONIBLES DEL DEPARTAMENTO -->
                                <optgroup label="Dísponible" id="municipios-disponibles"></optgroup>
                            </select>
                            <x-input-error :messages="$errors->get('municipio')" class="mt-2" />
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="p-2 bg-blue-700 text-white rounded hover:bg-blue-700">
                            <i class="fa-solid fa-floppy-disk"></i>&nbsp;Actualizar
                        </button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('js/paciente/obtener-municipios-ajax.js') }}"></script>
    </x-slot>
</x-app-layout>
