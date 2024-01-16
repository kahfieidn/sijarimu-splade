<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    @if($pemohon->perizinan_id == 1)
        <x-splade-form :default="['penelitian' => $penelitian, 'pemohon' => $pemohon]" action="{{ route('front-office.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/front-office/formulir/penelitian-mahasiswa')
        </x-splade-form>
    @endif
    
    @if($pemohon->perizinan_id == 2)
        <x-splade-form :default="['penelitian' => $penelitian, 'pemohon' => $pemohon]" action="{{ route('front-office.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/front-office/formulir/penelitian-perorangan')
        </x-splade-form>
    @endif

    @if($pemohon->perizinan_id == 3)
        <x-splade-form :default="['penelitian' => $penelitian, 'pemohon' => $pemohon, 'peneliti' => $peneliti]" action="{{ route('front-office.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/front-office/formulir/penelitian-lembaga')
        </x-splade-form>
    @endif


</x-app-layout>