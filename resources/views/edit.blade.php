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
                <form method="POST" action="{{ route('paciente.update', ['id' => $paciente->id])}}" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="flex my-3">
                        <div class="size-1/5">
                            <x-input-label for="numero_documento" :value="__('Número documento')" />
                            <x-text-input id="numero_documento" class="block mt-1 w-full" type="text" name="numero_documento" :value="$paciente->numero_documento" required />
                            <x-input-error :messages="$errors->get('numero_documento')" class="mt-2" />
                        </div>
                        
                        <div class="size-1/5">
                            <x-input-label for="primer_nombre" :value="__('Primer nombre')" />
                            <x-text-input id="primer_nombre" class="block mt-1 w-full" type="text" name="primer_nombre" :value="$paciente->primer_nombre" required />
                            <x-input-error :messages="$errors->get('primer_nombre')" class="mt-2" />
                        </div>
    
                        <div class="size-1/5">
                            <x-input-label for="segundo_nombre" :value="__('Segundo nombre')" />
                            <x-text-input id="segundo_nombre" class="block mt-1 w-full" type="text" name="segundo_nombre" :value="$paciente->segundo_nombre" required />
                            <x-input-error :messages="$errors->get('segundo_nombre')" class="mt-2" />
                        </div>
    
                        <div class="size-1/5">
                            <x-input-label for="primer_apellido" :value="__('Primer apellido')" />
                            <x-text-input id="primer_apellido" class="block mt-1 w-full" type="text" name="primer_apellido" :value="$paciente->primer_apellido" required />
                            <x-input-error :messages="$errors->get('primer_apellido')" class="mt-2" />
                        </div>
    
                        <div class="size-1/5">
                            <x-input-label for="segundo_apellido" :value="__('Segundo apellido')" />
                            <x-text-input id="segundo_apellido" class="block mt-1 w-full" type="text" name="segundo_apellido" :value="$paciente->segundo_apellido" required />
                            <x-input-error :messages="$errors->get('segundo_apellido')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex">
                        <div class="size-1/4">
                            <x-input-label for="tipo_documento" :value="__('Tipo documento')" />
                            <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-white" id="tipo_documento" name="tipo_documento">
                                {{-- <optgroup label="Actual">
                                    <option value="{{ $paciente->genero->id }}">{{ $paciente->genero->nombre }}</option>
                                </optgroup>
                                <optgroup label="Dísponible">
                                    @forelse ($generos as $genero)
                                        @continue($genero->id == $paciente->genero->id)
                                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                    @empty
                                    @endforelse
                                </optgroup> --}}
                            </select>
                            <x-input-error :messages="$errors->get('tipo_documento')" class="mt-2" />
                        </div>
                        <div class="size-1/4">
                            <x-input-label for="genero" :value="__('Genero')" />
                            <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-white" id="genero" name="genero">
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
                        <div class="size-1/4">
                            <x-input-label for="departamento" :value="__('Departamento')" />
                            <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-white" id="departamento" name="departamento">
                                {{-- <optgroup label="Actual">
                                    <option value="{{ $paciente->genero->id }}">{{ $paciente->genero->nombre }}</option>
                                </optgroup>
                                <optgroup label="Dísponible">
                                    @forelse ($generos as $genero)
                                        @continue($genero->id == $paciente->genero->id)
                                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                    @empty
                                    @endforelse
                                </optgroup> --}}
                            </select>
                            <x-input-error :messages="$errors->get('departemento')" class="mt-2" />
                        </div>
                        <div class="size-1/4">
                            <x-input-label for="municipio" :value="__('Municipio')" />
                            <select class="w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-white" id="municipio" name="municipio">
                                {{-- <optgroup label="Actual">
                                    <option value="{{ $paciente->genero->id }}">{{ $paciente->genero->nombre }}</option>
                                </optgroup>
                                <optgroup label="Dísponible">
                                    @forelse ($generos as $genero)
                                        @continue($genero->id == $paciente->genero->id)
                                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                    @empty
                                    @endforelse
                                </optgroup> --}}
                            </select>
                            <x-input-error :messages="$errors->get('municipio')" class="mt-2" />
                        </div>
                    </div>
                    
                    <button class="w-full p-2 bg-blue-500 text-white rounded hover:bg-blue-700">Enviar</button>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
