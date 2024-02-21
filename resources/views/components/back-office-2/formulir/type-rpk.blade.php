<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Permohonan</span></h1>

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
                <x-splade-input disabled required name="type_rpk.nomor_rpk_sebelumnya" type="text" placeholder="No. RPK Sebelumnya" label="No. RPK Sebelumnya" />
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
        $vars = 'field_' . $key+1;
        ?>

        <div class="grid mb-2 mt-2 grid-cols-1 gap-6 sm:grid-cols-5">
            <div class="ml-2 col-span-1 sm:col-span-4">
                <h6 class="text-sm font-bold dark:text-white">{{ $num_field }}. {{$persyaratan->nama_persyaratan}}
                    @if($status_berkas->$vars == 'terima')
                    <span class="bg-blue-100 text-blue-800 text-1xl font-semibold mb-1 mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-1">Terima</span>
                    @elseif($status_berkas->$vars == 'tolak')
                    <span class="bg-red-100 text-red-800 text-1xl font-semibold mb-1 mr-2 px-2.5 py-0.5 rounded dark:bg-dark-200 dark:text-dark-800 ml-1">Tolak</span>
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
        </div>
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-500">
        <?php $num_field++; ?>
        @endif
        @endforeach


    </div>
</div>

<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Data <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Pendukung</span></h1>

        <ul class="grid w-full gap-6 md:grid-cols-1">
            <li>
                <Link href="#modal-permintaan-surat-rekomendasi">
                <label for="react-option" class="inline-flex items-center justify-between w-full p-5 text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="flex items-center w-full justify-between">
                        <div class="flex items-center">
                            <svg class="w-[34px] h-[34px] text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M3.6 4.5c.3-.3.8-.5 1.3-.5H19a1.9 1.9 0 0 1 2 1.9V15a1.9 1.9 0 0 1-1.9 1.9h-3.6l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.9A1.9 1.9 0 0 1 3 15.1V6c0-.5.2-1 .6-1.4Zm4 3a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.6Z" clip-rule="evenodd" />
                            </svg>
                            <div class="ml-4">
                                <div class="text-lg font-semibold">Permintaan Surat Rekomendasi</div>
                                <div class="text-sm">Ketuk untuk melihat informasi selengkapnya.</div>
                            </div>
                        </div>
                        <svg class="w-[34px] h-[34px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 16 4-4-4-4m6 8 4-4-4-4" />
                        </svg>
                    </div>
                </label>
                </Link>
            </li>
            <li>
                <Link href="#modal-surat-rekomendasi">
                <label for="react-option" class="inline-flex items-center justify-between w-full p-5 text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="flex items-center w-full justify-between">
                        <div class="flex items-center">
                            <svg class="w-[34px] h-[34px] text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.1 12.6v-1.8A5.4 5.4 0 0 0 13 5.6V3a1 1 0 0 0-2 0v2.4a5.4 5.4 0 0 0-4 5.5v1.8c0 2.4-1.9 3-1.9 4.2 0 .6 0 1.2.5 1.2h13c.5 0 .5-.6.5-1.2 0-1.2-1.9-1.8-1.9-4.2Zm-13.2-.8a1 1 0 0 1-1-1c0-2.3.9-4.6 2.5-6.4a1 1 0 1 1 1.5 1.4 7.4 7.4 0 0 0-2 5 1 1 0 0 1-1 1Zm16.2 0a1 1 0 0 1-1-1c0-1.8-.7-3.6-2-5a1 1 0 0 1 1.5-1.4c1.6 1.8 2.5 4 2.5 6.4a1 1 0 0 1-1 1ZM8.8 19a3.5 3.5 0 0 0 6.4 0H8.8Z" />
                            </svg>

                            <div class="ml-4">
                                <div class="text-lg font-semibold">Surat Rekomendasi</div>
                                <div class="text-sm">Ketuk untuk melihat informasi selengkapnya.</div>
                            </div>
                        </div>
                        <svg class="w-[34px] h-[34px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 16 4-4-4-4m6 8 4-4-4-4" />
                        </svg>
                    </div>
                </label>
                </Link>
            </li>
        </ul>

        <x-splade-modal name="modal-permintaan-surat-rekomendasi" max-width="7xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Permintaan Surat <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Rekomendasi</span></h1>
            <div class="p-4">
            <iframe src="{{ route('dashboard.cetak.permintaan-rekomendasi-request', [$pemohon->perizinan_id,$pemohon->id]) }}" width="100%" height="500"></iframe>

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
        <x-splade-modal name="modal-surat-rekomendasi" max-width="7xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Surat <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Rekomendasi</span></h1>
            <div class="p-4">
                <iframe src="{{ url('/storage/docs/' . $pemohon->surat_rekomendasi)}}" width="100%" height="500"></iframe>

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
</div>

<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text
        -4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Tindak <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Lanjut</span></h1>
        
        <iframe src="{{ route('dashboard.cetak.perizinan.request', [$pemohon->perizinan_id, $pemohon->id])}}" width="100%" height="500"></iframe>

        <div class="relative z-999 w-full mt-6 mb-6 group">
            <x-splade-select @input="data.status_permohonan_id = form.status_permohonan_id" required choices label="Status" name="status_permohonan_id">
                <option value="" disabled>Pilih salah satu...</option>
                <option value="1">Ditolak</option>
                <option value="2">Revisi</option>
                <option value="7">Sudah Lengkap (Teruskan Ke Verifikator (1))</option>
            </x-splade-select>

        </div>
        <div v-show="form.status_permohonan_id == 1 || form.status_permohonan_id == 2" class="relative z-0 w-full mb-6 group">
            <x-splade-wysiwyg label="Tambahkan Catatan Ke Pemohon (Opsional)" class="mb-8" name="catatan" />
        </div>
        <div v-show="form.status_permohonan_id == 7" class="relative z-0 w-full mb-6 group">
        <x-splade-input required name="no_izin" type="text" placeholder="Nomor Izin" label="Nomor Izin" />
        </div>

        <x-splade-group>
            <x-splade-submit class="mt-3 py-2" label="Simpan Data" />
        </x-splade-group>
    </div>
</div>