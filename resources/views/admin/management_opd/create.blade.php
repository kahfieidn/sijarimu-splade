<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Kelola <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">OPD</span></h1>
            <x-splade-form :default="['user_id' => $user_id, 'sektor_id' => $sektor_id]" action="{{ route('admin-management-opd.store') }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="POST">
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-select required name="user_id" :options="$user_id" label="User" option-label="name" option-value="id" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-select required name="sektor_id" :options="$sektor_id" label="Sektor" option-label="nama_sektor" option-value="id" />
                </div>
                <!-- <div class="relative z-0 w-full mb-6 group">
                    <x-splade-select name="status" required label="Status">
                        <option value="active">Aktif</option>
                        <option value="non active">Non Aktif</option>
                    </x-splade-select>
                </div> -->
                <x-splade-submit label="Simpan Data" />
            </x-splade-form>
        </div>
    </div>

</x-app-layout>