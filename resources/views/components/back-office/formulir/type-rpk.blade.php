<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Permohonan</span></h1>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-select disabled required choices name="type_rpk.type_rpk" label="Tipe Kepengurusan Izin">
                    <option disabled value="">Pilih salah satu...</option>
                    <option value="baru">Baru</option>
                    <option value="perpanjangan">Perpanjangan</option>
                </x-splade-select>
            </div>
            <div class="relative z-999 w-full mb-3 group">
                <x-splade-select disabled required choices name="type_rpk.type_gt" label="Jenis Isi Kotor GT/Bobot Mati (DWT) ">
                    <option disabled value="">Pilih salah satu...</option>
                    <option value="dibawah 10 gt">Dibawah 10 GT</option>
                    <option value="diatas 10 gt">Diatas 10 GT</option>
                </x-splade-select>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.nama_kapal" type="text" placeholder="Nama Kapal" label="Nama Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.jenis_kapal" type="text" placeholder="Jenis Kapal" label="Jenis Kapal" />
            </div>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.bendera" type="text" placeholder="Bendera Kapal" label="Bendera Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.isi_kotor" type="text" placeholder="Isi Kotor" label="Isi Kotor/Bobot Mati" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.tenaga_penggerak" type="text" placeholder="Tenaga Penggerak" label="Tenaga Penggerak" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.status_kepemilikan_kapal" type="text" placeholder="Status Kepemilikan Kapal" label="Status Kepemilikan Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.kapasitas_angkut" type="text" placeholder="Kapasitas Angkut" label="Kapasitas Angkut" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.pelabuhan_pangkal" type="text" placeholder="Pelabuhan Pangkal" label="Pelabuhan Pangkal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.pelabuhan_singgah" type="text" placeholder="Pelabuhan Singgah" label="Pelabuhan Singgah" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.urgensi" type="text" placeholder="Urgensi" label="Urgensi" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.trayek" type="text" placeholder="Trayek" label="Trayek" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="type_rpk.nomor_siualper" type="text" placeholder="No. SIUALPER" label="No. SIUALPER" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled v-show="form.type_rpk == 'baru'" name="nomor_rpk_sebelumnya" type="text" placeholder="No. RPK Sebelumnya" label="No. RPK Sebelumnya" />
            </div>
        </div>
    </div>
</div>

<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Verifikasi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Berkas Permohonan</span></h1>

        <?php
        $num_field = 1;
        ?>
        @foreach($persyaratan as $key=>$persyaratan)
        @if($persyaratan->status == 'active')

        <?php
        $vars = 'field_' . $key + 1;
        ?>

        <div class="grid p-2 mb-1 mt-1 grid-cols-1 gap-6 sm:grid-cols-5">
            <div class="col-span-1 sm:col-span-3">
                <h6 class="text-sm font-bold dark:text-white">{{ $num_field }}. {{$persyaratan->nama_persyaratan}}
                    @if($status_berkas->$vars == 'ada')
                    <span class="bg-blue-100 text-blue-800 text-1xl font-semibold mb-1 mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-1">Ada</span>
                    @elseif($status_berkas->$vars == 'tidak ada')
                    <span class="bg-red-100 text-red-800 text-1xl font-semibold mb-1 mr-2 px-2.5 py-0.5 rounded dark:bg-dark-200 dark:text-dark-800 ml-1">Tidak Ada</span>
                    @else
                    <span class="bg-yellow-100 text-yellow-800 text-1xl font-semibold mb-1 mr-2 px-2.5 py-0.5 rounded dark:bg-dark-200 dark:text-dark-800 ml-1">Menunggu Review</span>
                    @endif
                </h6>
            </div>

            <div class="col-span-1 sm:text-right sm:col-span-1">
                <Link href="#modal-berkas-{{$vars}}" class="relative sm inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                <span class="relative px-2 py-1 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Lihat Berkas
                </span>
                </Link>
                <x-splade-modal name="modal-berkas-{{$vars}}" max-width="7xl">
                    <h4 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-1xl lg:text-2xl dark:text-white">{{ $num_field }}. <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">{{$persyaratan->nama_persyaratan}}</span></h4>
                    <div class="p-4">
                        <iframe src="{{url('/storage/docs/' . $berkas->$vars)}}" width="100%" height="500"></iframe>

                        <div class="flex justify-between items-center ">
                            <div class="flex items-center space-x-3 sm:space-x-4">
                            </div>
                            <button @click="modal.close" type="button" class="mt-3 inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Tutup
                            </button>
                        </div>
                    </div>
                </x-splade-modal>
            </div>

            <div class="col-span-1 sm:col-span-1 text-center">
                <x-splade-group name="status_berkas" inline>
                    <x-splade-radio required name="status_berkas.field_{{$key+1}}" value="ada" label="Ada" />
                    <x-splade-radio name="status_berkas.field_{{$key+1}}" value="tidak ada" label="Tidak Ada" />
                </x-splade-group>
            </div>
            </div>

            <x-splade-input v-show="form.status_berkas.field_{{$key+1}} == 'tidak ada'" name="ket_berkas.field_{{$key+1}}" type="text" placeholder="Keterangan" />
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-500">
        <?php $num_field++; ?>
        @else

        @endif
        @endforeach
    </div>
</div>

<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Tindak <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Lanjut</span></h1>
        <div class="relative z-999 w-full mb-6 group">
            <x-splade-select @input="data.status_permohonan_id = form.status_permohonan_id" required choices label="Status" name="status_permohonan_id">
                <option value="" disabled>Pilih salah satu...</option>
                <option value="1">Ditolak</option>
                <option value="2">Revisi</option>
                <option value="6">Sudah Lengkap (Teruskan Ke OPD Teknis {{$pemohon->perizinan->sektor->nama_sektor}})</option>
            </x-splade-select>
        </div>
        <div v-show="form.status_permohonan_id == 1 || form.status_permohonan_id == 2" class="relative z-0 w-full mb-6 group">
            <x-splade-wysiwyg label="Tambahkan Catatan Ke Pemohon (Opsional)" class="mb-8" name="catatan" />
        </div>

        <div v-if="form.status_permohonan_id == 6" class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Surat Permintaan <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Rekomendasi</span></h1>

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-input required name="no_permintaan_rekomendasi" type="text" placeholder="No. Surat Permintaan Rekomendasi" label="No. Surat Permintaan Rekomendasi" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-input required name="no_surat_permohonan" type="text" placeholder="No. Surat Pemohon" label="No. Surat Pemohon" />
                </div>
            </div>
            <iframe src="{{ route('dashboard.cetak.permintaan-rekomendasi-request', [$pemohon->perizinan_id, $pemohon->id]) }}" width="100%" height="500"></iframe>

        </div>

        <x-splade-group>
            <x-splade-submit class="mt-3 py-2" label="Simpan Data" />
        </x-splade-group>
    </div>
</div>