<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>


    <div v-if="{{ $perizinan->id }} == 1">
        <x-splade-form action="{{ route('front-office.update', $pemohon->id) }}" :default="['penelitian' => $penelitian, 'pemohon' => $pemohon, 'status_permohonan_front_office' => $status_permohonan_front_office]" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="PATCH">
            <x-splade-input readonly class="hidden" name="pemohon.id" />
            <div class="p-4 sm:ml-64">
                <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                    <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Formulir <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Permohonan</span></h1>
                    <div class="relative z-0 w-full mb-6 group">
                        <x-splade-input readonly required name="penelitian.judul_penelitian" type="text" placeholder="Judul Penelitian Anda" label="Judul Penelitian" />
                    </div>
                    <div class="grid md:grid-cols-3 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <x-splade-input readonly required name="penelitian.nim" type="text" placeholder="Nomor Induk Mahasiswa" label="NIM" />
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <x-splade-input readonly required name="penelitian.jenjang" type="text" placeholder="S1/S2/S3" label="Jenjang" />
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <x-splade-input readonly required name="penelitian.jurusan" type="text" placeholder="Teknik Informatika" label="Jurusan" />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <x-splade-input readonly required name="penelitian.universitas" type="text" placeholder="Universitas" label="Nama Universitas" />
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <x-splade-input readonly required name="penelitian.lokasi_penelitian" type="text" placeholder="DPMPTSP Provinsi Kepri, DPMPTSP Kota.." label="Lokasi Penelitian" />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-999 w-full mb-6 group">
                            <x-splade-input readonly required name="penelitian.waktu_awal_penelitian" date label="Waktu Awal Penelitian" />
                        </div>
                        <div class="relative z-999 w-full mb-6 group">
                            <x-splade-input readonly required name="penelitian.waktu_akhir_penelitian" date label="Waktu Akhir Penelitian" />
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
                                            <x-splade-radio name="status_berkas.field_{{$key+1}}" value="terima" label="Terima" />
                                            <x-splade-radio name="status_berkas.field_{{$key+1}}" value="tolak" label="Tolak" />
                                        </x-splade-group>

                                    </td>
                                    <?php $num_field++; ?>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h1 class="mt-5 mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Tambahkan <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Catatan Ke Pemohon</span></h1>
                    <x-splade-wysiwyg class="mb-8" name="catatan" />

                    <x-splade-select required label="Tindak Lanjut" name="status_permohonan_id" choices :options="$status_permohonan_front_office" />




                    <x-splade-group>
                        <x-splade-submit class="mt-3 py-2" label="Ajukan Sekarang" />
                    </x-splade-group>
                </div>
            </div>
        </x-splade-form>
    </div>



</x-app-layout>