@if($pemohon->perizinan_id == 1)
    @include('cetak.penelitian-mahasiswa')
@elseif($pemohon->perizinan_id == 2)
    @include('cetak.penelitian-perorangan')
@elseif($pemohon->perizinan_id == 3)
    @include('cetak.penelitian-lembaga')
@elseif($pemohon->perizinan_id == 4)
    @if($type_rpk->type_rpk == 'baru' && $type_rpk->type_trayek == 'Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri')
    @include('cetak.izin.type-rpk-ttdtt-baru')
    @elseif($type_rpk->type_rpk == 'perpanjangan' && $type_rpk->type_trayek == 'Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri')
    @include('cetak.izin.type-rpk-ttdtt-perpanjangan')
    @endif
@else
Not Found!
@endif