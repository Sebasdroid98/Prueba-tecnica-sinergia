<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- ALERTAS APP -->
            @if (session()->has('success'))
                <x-alert class="bg-green-400">{{ session('success') }}</x-alert>
            @endif
            @if (session()->has('error'))
                <x-alert class="bg-red-400">{{ session('error') }}</x-alert>
            @endif
            @if (session()->has('info'))
                <x-alert class="bg-blue-400">{{ session('info') }}</x-alert>
            @endif
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-3">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    Listado de pacientes <i class="fa-solid fa-person"></i>
                </div>
            </div>

            <x-card>
                <div class="">
                    <x-link-button href="{{ route('paciente.create') }}"><i class="fa-solid fa-plus"></i> Agregar nuevo</x-link-button>
                </div>
                {{-- @dump($pacientes) --}}
                <table class="min-w-full border border-gray-300 dark:border-gray-900 dark:text-white rounded-lg mt-3">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="px-4 py-2 border dark:border-gray-700">Identificación</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Nombre</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Tipo documento</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Estado</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pacientes as $paciente)     
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $paciente->numero_documento }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $paciente->fullname }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $paciente->tipoDocumento->nombre }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">
                                    <i class=" {{ $paciente->estado ? 'fa-solid fa-circle-check' : 'fa-solid fa-user-slash' }}"></i>&nbsp;
                                    {{ $paciente->estado ? 'Habilitado' : 'Deshabilitado' }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-700 size-1/4">
                                    <x-link-button href="{{ route('paciente.edit', ['id' => $paciente->id]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>&nbsp;Editar
                                    </x-link-button>
                                    <x-primary-button class="btn-eliminar" data-id="{{$paciente->id}}">
                                        <i class="fa-solid fa-delete-left"></i>&nbsp;Eliminar
                                    </x-primary-button>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="4" class="px-4 py-2 border dark:border-gray-700">Sin datos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </x-card>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('js/paciente/eliminar-pacientes.js') }}"></script>
    </x-slot>
</x-app-layout>
