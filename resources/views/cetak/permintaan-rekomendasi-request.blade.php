@if($pemohon->perizinan_id == 4)
    @if($type_rpk->type_rpk == 'baru' && $type_rpk->type_trayek == 'Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri')
    @include('cetak.permintaan_rekomendasi.type-rpk-ttdtt-baru')
    @elseif($type_rpk->type_rpk == 'perpanjangan' && $type_rpk->type_trayek == 'Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri')
    @include('cetak.permintaan_rekomendasi.type-rpk-ttdtt-perpanjangan')
    @elseif($type_rpk->type_rpk == 'baru' && $type_rpk->type_trayek == 'Trayek Tidak Tetap Dan Teratur Angkutan Laut Dalam Negeri')
    @include('cetak.permintaan_rekomendasi.type-rpk-tdtt-baru')
    @elseif($type_rpk->type_rpk == 'perpanjangan' && $type_rpk->type_trayek == 'Trayek Tidak Tetap Dan Teratur Angkutan Laut Dalam Negeri')
    @include('cetak.permintaan_rekomendasi.type-rpk-tdtt-perpanjangan')
    @endif
@else
Not Found!
@endif