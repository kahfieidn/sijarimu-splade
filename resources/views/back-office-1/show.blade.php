<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    @if($pemohon->perizinan_id == 1)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['no_izin' => $no_izin,'status_berkas' => $status_berkas, 'ket_berkas' => $ket_berkas,'user' => $user,'status_permohonan_id' => '' ,'penelitian' => $penelitian, 'pemohon' => $pemohon]" action="{{ route('back-office-1.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/viewFormulir/penelitian-mahasiswa')
            @include('components/review-berkas/view-berkas-pemohon')
            @include('components/back-office-1/formulir/penelitian-mahasiswa')
        </x-splade-form>
    </x-splade-data>
    @endif

    @if($pemohon->perizinan_id == 2)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['no_izin' => $no_izin,'status_berkas' => $status_berkas, 'ket_berkas' => $ket_berkas,'user' => $user,'penelitian' => $penelitian,'pemohon' => $pemohon]" action="{{ route('back-office-1.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/viewFormulir/penelitian-perorangan')
            @include('components/review-berkas/view-berkas-pemohon')
            @include('components/back-office-1/formulir/penelitian-perorangan')
        </x-splade-form>
    </x-splade-data>
    @endif

    @if($pemohon->perizinan_id == 3)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['no_izin' => $no_izin,'status_berkas' => $status_berkas, 'ket_berkas' => $ket_berkas,'user' => $user,'penelitian' => $penelitian, 'pemohon' => $pemohon, 'peneliti' => $peneliti]" action="{{ route('back-office-1.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/viewFormulir/penelitian-lembaga')
            @include('components/review-berkas/view-berkas-pemohon')
            @include('components/back-office-1/formulir/penelitian-lembaga')
        </x-splade-form>
    </x-splade-data>
    @endif 

    @if($pemohon->perizinan_id == 4)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['status_berkas' => $status_berkas, 'ket_berkas' => $ket_berkas ,'profile' => $profile,'type_rpk' => $type_rpk,'user' => $user, 'pemohon' => $pemohon]" action="{{ route('back-office-1.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/partials/profile-usaha')
            @include('components/editFormulir/type-rpk')
            @include('components/review-berkas/edit-review-berkas-pemohon')
            @include('components/back-office-1/formulir/type-rpk')
        </x-splade-form>
    </x-splade-data>
    @endif

    @if($pemohon->perizinan_id == 5)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['status_berkas' => $status_berkas, 'ket_berkas' => $ket_berkas ,'profile' => $profile,'type_rpk_roro' => $type_rpk_roro,'user' => $user, 'pemohon' => $pemohon]" action="{{ route('back-office-1.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/partials/profile')
            @include('components/partials/profile-usaha')
            @include('components/editFormulir/type-rpk-roro')
            @include('components/review-berkas/edit-review-berkas-pemohon')
            @include('components/back-office-1/formulir/type-rpk-roro')
        </x-splade-form>
    </x-splade-data>
    @endif

</x-app-layout>