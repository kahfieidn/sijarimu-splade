<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    <div v-if="{{ $perizinan->id }} == 1">
        <x-splade-form action="{{ route('front-office.update', $pemohon->id) }}" :default="['penelitian' => $penelitian, 'pemohon' => $pemohon]" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components.front-office.formulir.penelitian-mahasiswa')
        </x-splade-form>
    </div>

    <div v-if="{{ $perizinan->id }} == 2">
        <x-splade-form action="{{ route('front-office.update', $pemohon->id) }}" :default="['penelitian' => $penelitian, 'pemohon' => $pemohon]" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components.front-office.formulir.penelitian-perorangan')
        </x-splade-form>
    </div>

    <div v-if="{{ $perizinan->id }} == 3">
        <x-splade-form action="{{ route('front-office.update', $pemohon->id) }}" :default="['penelitian' => $penelitian, 'pemohon' => $pemohon, 'peneliti' => $peneliti]" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components.front-office.formulir.penelitian-lembaga')
        </x-splade-form>
    </div>
</x-app-layout>