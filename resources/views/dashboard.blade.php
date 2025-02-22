<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-3">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    Listado de pacientes
                </div>
            </div>

            <x-card>
                @dump($pacientes)
                <table class="min-w-full border border-gray-300 dark:border-gray-900 dark:text-white rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="px-4 py-2 border dark:border-gray-700">Identificación</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Nombre</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Tipo documento</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pacientes as $paciente)     
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $paciente->numero_documento }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $paciente->fullname }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">México</td>
                                <td class="px-4 py-2 border dark:border-gray-700 size-1/4">
                                    <x-nav-link href="{{ route('paciente.edit', ['id' => $paciente->id]) }}" active>Editar</x-nav-link>
                                    <x-nav-link href="/" active>Deshabilitar</x-nav-link>
                                    <x-nav-link href="/" active>Eliminar</x-nav-link>
                                </td>
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
</x-app-layout>
