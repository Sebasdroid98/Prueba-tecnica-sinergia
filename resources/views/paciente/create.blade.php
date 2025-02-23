<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingresar información del paciente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <h2 class="text-xl font-semibold mb-4 dark:text-white text-center">Información del paciente</h2>
                {{-- <x-alert class="bg-blue-300 text-center mb-2" title="Nota!">
                    Cada una de las listas desplegables tienen secciones "Actual" y "Dísponible".
                </x-alert> --}}
                <form method="POST" action="{{ route('paciente.store') }}" enctype="multipart/form-data" autocomplete="on">
                    @csrf
                    <div class="flex my-3">
                        <div class="size-1/5">
                            <x-input-label for="numero_documento" :value="__('Número documento')" />
                            <x-text-input id="numero_documento" class="block mt-1 w-full" type="text" name="numero_documento" placeholder="obligatorio" :value="old('numero_documento')" maxlength="15" required />
                            <x-input-error :messages="$errors->get('numero_documento')" class="mt-2" />
                        </div>
                        
                        <div class="size-1/5">
                            <x-input-label for="primer_nombre" :value="__('Primer nombre')" />
                            <x-text-input id="primer_nombre" class="block mt-1 w-full" type="text" name="primer_nombre" placeholder="obligatorio" :value="old('primer_nombre')" maxlength="45" required />
                            <x-input-error :messages="$errors->get('primer_nombre')" class="mt-2" />
                        </div>
    
                        <div class="size-1/5">
                            <x-input-label for="segundo_nombre" :value="__('Segundo nombre')" />
                            <x-text-input id="segundo_nombre" class="block mt-1 w-full" type="text" name="segundo_nombre" placeholder="opcional" :value="old('segundo_nombre')" maxlength="45" />
                            <x-input-error :messages="$errors->get('segundo_nombre')" class="mt-2" />
                        </div>
    
                        <div class="size-1/5">
                            <x-input-label for="primer_apellido" :value="__('Primer apellido')" />
                            <x-text-input id="primer_apellido" class="block mt-1 w-full" type="text" name="primer_apellido" placeholder="obligatorio" :value="old('primer_apellido')" maxlength="45" required />
                            <x-input-error :messages="$errors->get('primer_apellido')" class="mt-2" />
                        </div>
    
                        <div class="size-1/5">
                            <x-input-label for="segundo_apellido" :value="__('Segundo apellido')" />
                            <x-text-input id="segundo_apellido" class="block mt-1 w-full" type="text" name="segundo_apellido" placeholder="opcional" :value="old('segundo_apellido')" maxlength="45" />
                            <x-input-error :messages="$errors->get('segundo_apellido')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex">
                        <div class="size-2/3">
                            <div class="flex">
                                <div class="size-1/2">
                                    <x-input-label for="tipo_documento" :value="__('Tipo documento')" />
                                    <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-gray-700" id="tipo_documento" name="tipo_documento" required>
                                        @forelse ($tipoDocumentos as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <x-input-error :messages="$errors->get('tipo_documento')" class="mt-2" />
                                </div>
                                <div class="size-1/2">
                                    <x-input-label for="genero" :value="__('Genero')" />
                                    <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-gray-700" id="genero" name="genero" required>
                                        @forelse ($generos as $genero)
                                            <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex">
                                <div class="size-1/2">
                                    <x-input-label for="departamento" :value="__('Departamento')" />
                                    <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-gray-700" id="departamento" name="departamento" required>
                                        @forelse ($departamentos as $depto)
                                            <option value="{{ $depto->id }}">{{ $depto->nombre }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <x-input-error :messages="$errors->get('departemento')" class="mt-2" />
                                </div>
                                <div class="size-1/2">
                                    <x-input-label for="municipio" :value="__('Municipio')" />
                                    <!-- AQUÍ SE CARGARAN MEDIANTE AJAX LOS MUNICIPIOS DISPONIBLES DEL DEPARTAMENTO -->
                                    <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-gray-700" id="municipios-disponibles" name="municipio" required></select>
                                    <x-input-error :messages="$errors->get('municipio')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="size-1/3">
                            <x-alert class="bg-blue-300 text-center mb-2" title="Nota!">
                                Aquí se mostrará la imagen del paciente cuando sea registrado (Previsualización no disponible).
                            </x-alert>
                            <x-input-label for="imagen_paciente" :value="__('Imagen paciente')" />
                            <x-file-input id="imagen_paciente" name="imagen_paciente" accept="image/*" />
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="p-2 bg-blue-700 text-white rounded hover:bg-blue-700">
                            <i class="fa-solid fa-floppy-disk"></i>&nbsp;Guardar
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
