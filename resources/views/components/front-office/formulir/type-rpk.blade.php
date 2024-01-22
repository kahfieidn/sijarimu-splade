<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Permohonan</span></h1>
    
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required readonly name="type_rpk.nama_kapal" type="text" placeholder="Nama Kapal" label="Nama Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required readonly name="type_rpk.jenis_kapal" type="text" placeholder="Jenis Kapal" label="Jenis Kapal" />
            </div>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required readonly name="type_rpk.bendera" type="text" placeholder="Bendera Kapal" label="Bendera Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required readonly name="type_rpk.isi_kotor" type="text" placeholder="Isi Kotor" label="Isi Kotor/Bobot Mati" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required readonly name="type_rpk.tenaga_penggerak" type="text" placeholder="Tenaga Penggerak" label="Tenaga Penggerak" />
            </div>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required readonly name="type_rpk.status_kepemilikan_kapal" type="text" placeholder="Status Kepemilikan Kapal" label="Status Kepemilikan Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required readonly name="type_rpk.kapasitas_angkut" type="text" placeholder="Kapasitas Angkut" label="Kapasitas Angkut" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required readonly name="type_rpk.pelabuhan_pangkal" type="text" placeholder="Pelabuhan Pangkal" label="Pelabuhan Pangkal" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required readonly name="type_rpk.urgensi" type="text" placeholder="Urgensi" label="Urgensi" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required readonly name="type_rpk.trayek" type="text" placeholder="Trayek" label="Trayek" />
            </div>
        </div>

    </div>
</div>

<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Verifikasi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Berkas Permohonan</span></h1>
        <div class="relative overflow-x-auto">
            <table class="w-full text-lg text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 max-w-[800px] overflow-ellipsis">
                            Persyaratan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Berkas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $num_field = 1;
                    ?>
                    @foreach($persyaratan as $key=>$persyaratan)
                    <?php
                    $vars = 'field_' . $num_field;
                    ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 max-w-[800px] overflow-ellipsis">
                            <h6 class="mb-2 text-sm font-bold dark:text-white">{{ $key + 1 }}. {{$persyaratan->nama_persyaratan}}
                                @if($status_berkas->$vars == 'terima')
                                <span class="bg-blue-100 text-blue-800 text-1xl font-semibold mb-1 mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-1">Terima</span>
                                @elseif($status_berkas->$vars == 'tolak')
                                <span class="bg-red-100 text-red-800 text-1xl font-semibold mb-1 mr-2 px-2.5 py-0.5 rounded dark:bg-dark-200 dark:text-dark-800 ml-1">Tolak</span>
                                @else
                                <span class="bg-yellow-100 text-yellow-800 text-1xl font-semibold mb-1 mr-2 px-2.5 py-0.5 rounded dark:bg-dark-200 dark:text-dark-800 ml-1">Menunggu Review</span>
                                @endif
                            </h6>
                        </td>
                        <td class="px-6 py-4">
                            <a target="__blank" href="{{url('/storage/docs/' . $berkas->$vars)}}" class="relative sm inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                <span class="relative px-2 py-1 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Lihat Berkas
                                </span>
                            </a>
                        </td>
                        <td>
                            <x-splade-group name="status_berkas" inline>
                                <x-splade-radio required name="status_berkas.field_{{$key+1}}" value="terima" label="Terima" />
                                <x-splade-radio name="status_berkas.field_{{$key+1}}" value="tolak" label="Tolak" />
                            </x-splade-group>

                        </td>
                        <?php $num_field++; ?>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                <option value="4">Sudah Lengkap (Teruskan Ke Back Office (1))</option>
            </x-splade-select>

        </div>
        <div v-show="form.status_permohonan_id == 1 || form.status_permohonan_id == 2" class="relative z-0 w-full mb-6 group">
            <x-splade-wysiwyg label="Tambahkan Catatan Ke Pemohon (Opsional)" class="mb-8" name="catatan" />
        </div>

        <x-splade-group>
            <x-splade-submit class="mt-3 py-2" label="Simpan Data" />
        </x-splade-group>
    </div>
</div>