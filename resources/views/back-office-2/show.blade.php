<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    @if($pemohon->perizinan_id == 1)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['status_berkas' => $status_berkas, 'ket_berkas' => $ket_berkas,'user' => $user,'status_permohonan_id' => '' ,'no_izin' => $no_izin,'penelitian' => $penelitian, 'pemohon' => $pemohon]" action="{{ route('back-office-2.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/viewFormulir/penelitian-mahasiswa')
            @include('components/review-berkas/view-berkas-pemohon')
            @include('components/back-office-2/formulir/penelitian-mahasiswa')
        </x-splade-form>
    </x-splade-data>
    @endif

    @if($pemohon->perizinan_id == 2)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['status_berkas' => $status_berkas, 'ket_berkas' => $ket_berkas,'user' => $user,'penelitian' => $penelitian, 'no_izin' => $no_izin,'pemohon' => $pemohon]" action="{{ route('back-office-2.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/viewFormulir/penelitian-perorangan')
            @include('components/review-berkas/view-berkas-pemohon')
            @include('components/back-office-2/formulir/penelitian-perorangan')
        </x-splade-form>
    </x-splade-data>
    @endif

    @if($pemohon->perizinan_id == 3)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['status_berkas' => $status_berkas, 'ket_berkas' => $ket_berkas,'user' => $user,'penelitian' => $penelitian, 'no_izin' => $no_izin, 'pemohon' => $pemohon, 'peneliti' => $peneliti]" action="{{ route('back-office-2.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/viewFormulir/penelitian-lembaga')
            @include('components/review-berkas/view-berkas-pemohon')
            @include('components/back-office-2/formulir/penelitian-lembaga')
        </x-splade-form>
    </x-splade-data>
    @endif

    @if($pemohon->perizinan_id == 4)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['status_berkas' => $status_berkas, 'ket_berkas' => $ket_berkas,'no_izin' => $no_izin,'profile' => $profile,'user' => $user,'type_rpk' => $type_rpk, 'pemohon' => $pemohon]" action="{{ route('back-office-2.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/partials/profile-usaha')
            @include('components/viewFormulir/type-rpk')
            @include('components/review-berkas/view-berkas-pemohon')
            @include('components/back-office-2/formulir/type-rpk')
        </x-splade-form>
    </x-splade-data>
    @endif

</x-app-layout>