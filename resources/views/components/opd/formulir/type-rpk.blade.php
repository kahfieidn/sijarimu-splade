<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Data <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Pendukung</span></h1>

        <ul class="grid w-full gap-6 md:grid-cols-1">
            <li>
                <Link href="#modal-surat-rekomendasi">
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
        </ul>
        <x-splade-modal name="modal-surat-rekomendasi" max-width="7xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Permintaan Surat <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Rekomendasi</span></h1>
            <div class="p-4">
                <iframe src="{{ urldecode(url('/storage/permintaan_rekomendasi/' . $pemohon->file_permintaan_rekomendasi)) }}" width="100%" height="500"></iframe>
                
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
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Tindak <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Lanjut</span></h1>
        <div class="relative z-999 w-full mb-6 group">
            <x-splade-select @input="data.status_permohonan_id = form.status_permohonan_id" required choices label="Status" name="status_permohonan_id">
                <option value="" disabled>Pilih salah satu...</option>
                <option value="1">Ditolak</option>
                <option value="2">Revisi</option>
                <option value="4">Kembalikan Ke Back Office (1)</option>
                <option value="8">Sudah Lengkap (Teruskan Ke Back Office DPMPTSP Prov. Kepri)</option>
            </x-splade-select>
        </div>

        <div v-show="form.status_permohonan_id == 1 || form.status_permohonan_id == 2" class="relative z-0 w-full mb-6 group">
            <x-splade-wysiwyg label="Tambahkan Catatan Ke Pemohon (Opsional)" class="mb-8" name="catatan" />
        </div>
        <div v-show="form.status_permohonan_id == 4" class="relative z-0 w-full mb-6 group">
            <x-splade-wysiwyg label="Tambahkan Catatan Ke Back Office DPMPTSP (Opsional)" class="mb-8" name="catatan_back_office" />
        </div>

        <div v-if="form.status_permohonan_id == 8" class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Surat Rekomendasi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Teknis</span></h1>

            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-input name="no_surat_rekomendasi" type="text" placeholder="No. Surat Rekomendasi" label="Nomor Surat Rekomendasi" required />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-input required date name="tgl_surat_rekomendasi" type="text" placeholder="Pilih tanggal.." label="Tgl. Surat Rekomendasi" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-file accept="application/pdf" filepond max-size="2MB" name="surat_rekomendasi" :label="__('Lampiran')" filepond required />
                </div>
            </div>
        </div>

        <x-splade-group>
            <x-splade-submit class="mt-3 py-2" label="Simpan Data" />
        </x-splade-group>
    </div>
</div>