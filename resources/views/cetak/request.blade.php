@if($pemohon->perizinan_id == 1)
@include('cetak.penelitian-mahasiswa')
@elseif($pemohon->perizinan_id == 2)
@include('cetak.penelitian-perorangan')
@elseif($pemohon->perizinan_id == 3)
@include('cetak.penelitian-lembaga')
@else
Not Found!
@endif