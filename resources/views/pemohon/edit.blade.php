<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <blockquote class="p-2 my-4 border-l-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">"Berkas anda perlu di revisi"</p>
                <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">Alasan Verifikator : {!! $pemohon->catatan !!}</p>
            </blockquote>
        </div>
    </div>

    <div v-if="{{ $perizinan->id }} == 1">
        <x-splade-form :default="['penelitian' => $penelitian, 'fields' => $fields]" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" action="{{ route('pemohon.update', $pemohon->id) }}" method="PATCH">
            <x-splade-input readonly class="hidden" name="id" /> 
            @include('components/editFormulir/penelitian-mahasiswa')
            @include('components/berkas-pemohon')
        </x-splade-form>
    </div>
    <div v-if="{{ $perizinan->id }} == 2">
        <x-splade-form :default="['penelitian' => $penelitian, 'fields' => $fields]" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" action="{{ route('pemohon.update', $pemohon->id) }}" method="PATCH">
            <x-splade-input readonly class="hidden" name="id" /> 
            @include('components/editFormulir/penelitian-perorangan')
            @include('components/berkas-pemohon')
        </x-splade-form>
    </div>
    <div v-if="{{ $perizinan->id }} == 3">
        <x-splade-form :default="['penelitian' => $penelitian, 'fields' => $fields, 'peneliti' => $peneliti]" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" action="{{ route('pemohon.update', $pemohon->id) }}" method="PATCH">
            <x-splade-input readonly class="hidden" name="id" /> 
            @include('components/editFormulir/penelitian-lembaga')
            @include('components/berkas-pemohon')
        </x-splade-form>
    </div>
    <div v-if="{{ $perizinan->id }} == 4">
        <x-splade-form :default="['typeRpk' => $typeRpk, 'fields' => $fields]" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" action="{{ route('pemohon.update', $pemohon->id) }}" method="PATCH">
            <x-splade-input readonly class="hidden" name="id" /> 
            @include('components/editFormulir/type-rpk')
            @include('components/berkas-pemohon')
        </x-splade-form>
    </div>

</x-app-layout>