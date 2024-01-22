<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    @if($pemohon->perizinan_id == 1)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['user' => $user,'status_permohonan_id' => '' ,'nomor_izin' => $nomor_izin,'penelitian' => $penelitian, 'pemohon' => $pemohon]" action="{{ route('back-office-2.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/back-office-2/formulir/penelitian-mahasiswa')
        </x-splade-form>
    </x-splade-data>
    @endif

    @if($pemohon->perizinan_id == 2)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['user' => $user,'penelitian' => $penelitian, 'nomor_izin' => $nomor_izin,'pemohon' => $pemohon]" action="{{ route('back-office-2.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/back-office-2/formulir/penelitian-perorangan')
        </x-splade-form>
    </x-splade-data>
    @endif

    @if($pemohon->perizinan_id == 3)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['user' => $user,'penelitian' => $penelitian, 'nomor_izin' => $nomor_izin, 'pemohon' => $pemohon, 'peneliti' => $peneliti]" action="{{ route('back-office-2.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/back-office-2/formulir/penelitian-lembaga')
        </x-splade-form>
    </x-splade-data>
    @endif

    @if($pemohon->perizinan_id == 4)
    <x-splade-data remember="some-key" local-storage>
        <x-splade-form :default="['user' => $user,'type_rpk' => $type_rpk, 'pemohon' => $pemohon]" action="{{ route('back-office-2.update', $pemohon->id) }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            @include('components/back-office-2/formulir/type-rpk')
        </x-splade-form>
    </x-splade-data>
    @endif

</x-app-layout>