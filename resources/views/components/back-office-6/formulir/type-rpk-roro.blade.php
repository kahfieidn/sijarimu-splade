<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Status <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Review</span></h1>
        <div class="h-full">
            <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
                <ol class="relative text-gray-500 border-l border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    <li class="mb-8 ml-6">
                        <span class="absolute flex items-center  justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-100 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Pemohon Mengajukan permohonan</h3>
                        <span>Permohonan telah berhasil diajukan</span>
                    </li>
                    <li class="mb-8 ml-6">
                        @if($review_permohonan->back_office_1 != null)
                        <span class="absolute flex items-center  justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-100 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Back Office (1)</h3>
                        <span>Kelengkapan berkas telah di verifikasi oleh {{$review_permohonan->back_office_1_user->name}} dan membuat draft permintaan rekomendasi</span>
                        @else
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-red-600 rounded-full -left-4 ring-4 ring-white dark:ring-white-900 dark:bg-white-900">
                            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Back Office (1)</h3>
                        <span>Kelengkapan berkas belum di review oleh Back Office (1)</span>
                        @endif
                    </li>
                    <li class="mb-8 ml-6">
                        @if($review_permohonan->back_office_2 != null)
                        <span class="absolute flex items-center  justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-100 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Back Office (2)</h3>
                        <span>Permintaan rekomendasi telah di cross check oleh {{$review_permohonan->back_office_2_user->name}}</span>
                        @else
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-red-600 rounded-full -left-4 ring-4 ring-white dark:ring-white-900 dark:bg-white-900">
                            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Back Office (2)</h3>
                        <span>Permohonan belum di cross check oleh Back Office (2)</span>
                        @endif
                    </li>
                    <li class="mb-8 ml-6">
                        @if($review_permohonan->back_office_3 != null)
                        <span class="absolute flex items-center  justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-100 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Back Office (3)</h3>
                        <span>Permintaan Rekomendasi telah di setujui oleh {{$review_permohonan->back_office_3_user->name}} dan diteruskan kepada OPD Teknis</span>
                        @else
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-red-600 rounded-full -left-4 ring-4 ring-white dark:ring-white-900 dark:bg-white-900">
                            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Back Office (3)</h3>
                        <span>Permohonan belum di review oleh Back Office (3)</span>
                        @endif
                    </li>
                    <li class="mb-8 ml-6">
                        @if($review_permohonan->opd != null)
                        <span class="absolute flex items-center  justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-100 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">OPD Teknis</h3>
                        <span>OPD Teknis menerbitkan surat rekomendasi {{$review_permohonan->opd_user->name}} pemohon dan menyerahkan kepada DPMPTSP Prov. Kepri</span>
                        @else
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-red-600 rounded-full -left-4 ring-4 ring-white dark:ring-white-900 dark:bg-white-900">
                            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">OPD Teknis</h3>
                        <span>OPD Teknis belum menerbitkan surat rekomendasi teknis dari pemohon</span>
                        @endif
                    </li>
                    <li class="mb-8 ml-6">
                        @if($review_permohonan->back_office_4 != null)
                        <span class="absolute flex items-center  justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-100 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Back Office (4)</h3>
                        <span>{{$review_permohonan->back_office_4_user->name}} menindaklanjuti rekomendasi dari OPD teknis dan membuat draft izin terbit</span>
                        @else
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-red-600 rounded-full -left-4 ring-4 ring-white dark:ring-white-900 dark:bg-white-900">
                            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Back Office (4)</h3>
                        <span>Back Office belum menindaklanjuti rekomendasi dari OPD teknis</span>
                        @endif
                    </li>
                    <li class="mb-8 ml-6">
                        @if($review_permohonan->back_office_5 != null)
                        <span class="absolute flex items-center  justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-100 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Back Office (5)</h3>
                        <span>Draft izin telah di cross check oleh {{$review_permohonan->back_office_5_user->name}}</span>
                        @else
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-red-600 rounded-full -left-4 ring-4 ring-white dark:ring-white-900 dark:bg-white-900">
                            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Back Office (5)</h3>
                        <span>Permohonan belum di cross check oleh Back Office (5)</span>
                        @endif
                    </li>
                    <li class="mb-8 ml-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        </span>
                        <h3 class="font-medium leading-tight">Menunggu Tinjauan Verifikator Final</h3>
                    </li>
                </ol>
            </div>
        </div>
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
                <option value="8">Kembalikan Ke Back Office (4)</option>
                <option value="11">Sudah Lengkap (Teruskan Ke Kepala Dinas)</option>
            </x-splade-select>

        </div>
        <div v-show="form.status_permohonan_id == 1 || form.status_permohonan_id == 2" class="relative z-0 w-full mb-6 group">
            <x-splade-wysiwyg label="Tambahkan Catatan Ke Pemohon (Opsional)" class="mb-8" name="catatan" />
        </div>
        <div v-show="form.status_permohonan_id == 8" class="relative z-0 w-full mb-6 group">
            <x-splade-wysiwyg label="Tambahkan Catatan Ke Back Office (4)" class="mb-8" name="catatan_back_office" />
        </div>

        <x-splade-group>
            <x-splade-submit class="mt-3 py-2" label="Simpan Data" />
        </x-splade-group>
    </div>
</div>