<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Formulir <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Permohonan</span></h1>
        <div class="relative z-0 w-full mb-6 group">
            <x-splade-input disabled required name="penelitian.lembaga" type="text" placeholder="Tulis Nama Lembaga / Instansi / Perusahaan" label="Nama Lembaga / Instansi / Perusahaan" />
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <x-splade-input disabled required name="penelitian.judul_penelitian" type="text" placeholder="Judul Penelitian Anda" label="Judul Penelitian" />
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input disabled required name="penelitian.waktu_awal_penelitian" date label="Waktu Awal Penelitian" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input disabled required name="penelitian.waktu_akhir_penelitian" date label="Waktu Akhir Penelitian" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="penelitian.lokasi_penelitian" type="text" placeholder="Lokasi Penelitian" label="Lokasi Penelitian" />
            </div>
        </div>
        <!-- <editPeneliti v-model="form.editPeneliti"></editPeneliti> -->
    </div>

    @if($peneliti->count() > 0)

    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Daftar <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Peneliti</span></h1>

        @foreach($peneliti as $key=>$peneliti)
        <div class="grid md:grid-cols-4 md:gap-4">
            <div class="relative z-999 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Identitas</label>
                <x-splade-select disabled name="peneliti[{{$key}}].jenis_identitas">
                    <option value="NIK">NIK</option>
                    <option value="NIM">NIM</option>
                </x-splade-select>
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input disabled name="peneliti[{{$key}}].no_identitas" type="text" placeholder="Nomor Identitas" label="Nomor Identitas" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input disabled name="peneliti[{{$key}}].nama" type="text" placeholder="Nama Peneliti" label="Nama Peneliti" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input disabled name="peneliti[{{$key}}].jabatan_peneliti" type="text" placeholder="Ketua/Wakil/Anggota" label="Jabatan Peneliti" />
            </div>
        </div>
        @endforeach

    </div>

    @endif
</div>

<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Verifikasi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Berkas Permohonan</span></h1>

        <?php
        $num_field = 1;
        ?>
        @foreach($persyaratan as $key=>$persyaratan)
        <?php
        $vars = 'field_' . $num_field;
        ?>
        <div class="grid mb-2 mt-2 grid-cols-1 gap-6 sm:grid-cols-5">
            <div class="ml-2 col-span-1 sm:col-span-4">
                <h6 class="text-sm font-bold dark:text-white">{{ $key + 1 }}. {{$persyaratan->nama_persyaratan}}
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
                    <h4 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-1xl lg:text-2xl dark:text-white">{{ $key + 1 }}. <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">{{$persyaratan->nama_persyaratan}}</span></h4>
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
        @endforeach


    </div>
</div>

<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Draft <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Izin</span></h1>
        <iframe src="{{ route('dashboard.cetak.request', [$pemohon->perizinan_id, $pemohon->id ]) }}" width="100%" height="500"></iframe>
    </div>
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Konfigurasi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Draft Izin</span></h1>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input readonly required name="nomor_izin" type="text" placeholder="Nomor Izin" label="Nomor Izin" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input v-if="form.status_permohonan_id == 7" name="penelitian.menimbang" type="text" placeholder="Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi.." label="Menimbang" required />
                <x-splade-input v-if="form.status_permohonan_id != 7" name="penelitian.menimbang" type="text" placeholder="Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi.." label="Menimbang" />
            </div>
        </div>
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
                <option value="7">Sudah Lengkap (Teruskan Ke Verifikator (1))</option>
            </x-splade-select>
        </div>
        <div class="relative z-0 w-full mb-6 group" v-show="form.status_permohonan_id == 1 || form.status_permohonan_id == 2">
            <x-splade-wysiwyg label="Tambahkan Catatan Ke Pemohon (Opsional)" class="mb-8" name="catatan" />
        </div>

        <x-splade-group>
            <x-splade-submit class="mt-3 py-2" label="Ajukan Sekarang" />
        </x-splade-group>
    </div>
</div>