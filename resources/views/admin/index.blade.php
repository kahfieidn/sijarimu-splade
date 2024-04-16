<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
            <x-splade-form method="GET">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Report <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Permohonan</span></h1>
                <x-splade-select choices placeholder="Pilih salah satu" name="lifecycle" label="Pilih Lifecycle">
                    <option value="" disabled>Pilih salah satu...</option>
                    <option value="perizinan">Perizinan</option>
                    <option value="penelitian">Penelitian</option>
                </x-splade-select>
                <x-splade-submit class="mt-3" label="Tampilkan" />
            </x-splade-form>
        </div>
    </div>
    @if($getLifecycle == 'perizinan')
    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
            <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Daftar <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Perizinan</span></h1>
                <x-splade-table search-debounce="1000" pagination-scroll="head" :for="$permohonans" striped>
                </x-splade-table>
            </div>
        </div>
    </div>
    @endif
    @if($getLifecycle == 'penelitian')
    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
            <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Daftar <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Penelitian</span></h1>
                <x-splade-table search-debounce="1000" pagination-scroll="head" :for="$penelitians" striped>
                </x-splade-table>
            </div>
        </div>
    </div>
    @endif


</x-app-layout>