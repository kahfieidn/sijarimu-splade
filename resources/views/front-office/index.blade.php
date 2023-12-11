<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Daftar <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Permohonan Masuk</span></h1>
            <x-splade-table search-debounce="1000" pagination-scroll="head" :for="$permohonans" striped>
                <x-splade-cell actions as="$permohonans">
                    <Link slideover href="{{route('pemohon.show', $permohonans->id)}}"> Tracking Berkas </Link>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>

</x-app-layout>