<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text
        -4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Tindak <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Lanjut</span></h1>
        
        <iframe src="{{ route('dashboard.cetak.permintaan-rekomendasi-request', [$pemohon->perizinan_id, $pemohon->id]) }}" width="100%" height="500"></iframe>

        <div class="relative z-999 w-full mt-6 mb-6 group">
            <x-splade-select @input="data.status_permohonan_id = form.status_permohonan_id" required choices label="Status" name="status_permohonan_id">
                <option value="" disabled>Pilih salah satu...</option>
                <option value="1">Ditolak</option>
                <option value="2">Revisi</option>
                <option value="4">Kembalikan Ke Back Office (1)</option>
                <option value="6">Sudah Lengkap (Teruskan Ke Back Office (3))</option>
            </x-splade-select>

        </div>
        <div v-show="form.status_permohonan_id == 1 || form.status_permohonan_id == 2" class="relative z-0 w-full mb-6 group">
            <x-splade-wysiwyg label="Tambahkan Catatan Ke Pemohon (Opsional)" class="mb-8" name="catatan" />
        </div>
        <div v-show="form.status_permohonan_id == 4" class="relative z-0 w-full mb-6 group">
            <x-splade-wysiwyg label="Tambahkan Catatan Ke Back Office (1) (Opsional)" class="mb-8" name="catatan_back_office" />
        </div>
        <div v-show="form.status_permohonan_id == 9" class="relative z-0 w-full mb-6 group">
        <x-splade-input readonly required name="no_izin" type="text" placeholder="Nomor Izin" label="Nomor Izin" />
        </div>

        <x-splade-group>
            <x-splade-submit class="mt-3 py-2" label="Simpan Data" />
        </x-splade-group>
    </div>
</div>