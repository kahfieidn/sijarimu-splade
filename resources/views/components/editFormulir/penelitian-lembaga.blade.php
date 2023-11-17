<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Permohonan</span></h1>
        <div class="relative z-0 w-full mb-6 group">
            <x-splade-input name="penelitian.lembaga" type="text" placeholder="Tulis Nama Lembaga / Instansi / Perusahaan" label="Nama Lembaga / Instansi / Perusahaan" />
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <x-splade-input name="penelitian.judul_penelitian" type="text" placeholder="Judul Penelitian Anda" label="Judul Penelitian" />
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input name="penelitian.waktu_awal_penelitian" date label="Waktu Awal Penelitian" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input name="penelitian.waktu_akhir_penelitian" date label="Waktu Akhir Penelitian" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input name="penelitian.lokasi_penelitian" type="text" placeholder="Lokasi Penelitian" label="Lokasi Penelitian" />
            </div>
        </div>

        <!-- <editPeneliti v-model="form.editPeneliti"></editPeneliti> -->
    </div>

    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Daftar <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Peneliti</span></h1>

        <div class="grid md:grid-cols-4 md:gap-4">
            <div class="relative z-999 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Identitas</label>
                <select name="jenis_identitas" id="jenis_identitas" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="NIK" selected>NIK</option>
                    <option value="NIM">NIM</option>
                </select>
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <label for="no_identitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                    Identitas</label>
                <input name="no_identitas" type="text" id="no_identitas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nomor Identitas" required />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input name="peneliti[1].nama" type="text" placeholder="Nama Peneliti" label="Nama Peneliti" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Peneliti</label>
                <input  name="jabatan_peneliti" type="text" id="jabatan_peneliti" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ketua/Wakil/Anggota" required />
            </div>
        </div>

    </div>

</div>