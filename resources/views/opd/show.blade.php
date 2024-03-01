<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    @if($pemohon->perizinan_id == 4)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['ket_berkas' => $ket_berkas, 'status_berkas' => $status_berkas, 'profile' => $profile,'user' => $user,'type_rpk' => $type_rpk, 'pemohon' => $pemohon]" action="{{ route('opd.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/partials/profile-usaha')
            @include('components/viewFormulir/type-rpk')
            @include('components/review-berkas/view-berkas-pemohon')
            @include('components/opd/formulir/type-rpk')
        </x-splade-form>
    </x-splade-data>
    @endif

    @if($pemohon->perizinan_id == 5)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['ket_berkas' => $ket_berkas, 'status_berkas' => $status_berkas, 'profile' => $profile,'user' => $user,'type_rpk_roro' => $type_rpk_roro, 'pemohon' => $pemohon]" action="{{ route('opd.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/partials/profile-usaha')
            @include('components/viewFormulir/type-rpk-roro')
            @include('components/review-berkas/view-berkas-pemohon')
            @include('components/opd/formulir/type-rpk-roro')
        </x-splade-form>
    </x-splade-data>
    @endif

</x-app-layout>