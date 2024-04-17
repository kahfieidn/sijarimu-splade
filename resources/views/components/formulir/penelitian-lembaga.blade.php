<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Permohonan</span></h1>
        <div class="relative z-0 w-full mb-6 group">
            <x-splade-input required name="lembaga" type="text" placeholder="Tulis Nama Lembaga / Instansi / Perusahaan" label="Nama Lembaga / Instansi / Perusahaan" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <x-splade-input required name="judul_penelitian" type="text" placeholder="Judul Penelitian Anda" label="Judul Penelitian" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input required name="waktu_awal_penelitian" date label="Waktu Awal Penelitian" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input required name="waktu_akhir_penelitian" date label="Waktu Akhir Penelitian" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="lokasi_penelitian" type="text" placeholder="Lokasi Penelitian" label="Lokasi Penelitian" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
        </div>

        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
            Daftar
            <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Anggota
                Peneliti
                :</span>
        </h1>

        <div class="grid md:grid-cols-4 md:gap-4">
            <div class="relative z-999 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Identitas</label>
                <input type="text" readonly value="NIK" id="jenis_identitas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jenis Identitas" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <label for="no_identitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                    Identitas</label>
                <input type="text" readonly value="{{$user->nik}}" id="no_identitas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nomor Identitas" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Peneliti</label>
                <input type="text" readonly value="{{$user->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Peneliti" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Peneliti</label>
                <input type="text" readonly value="Penanggung Jawab" id="jabatan_peneliti" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Wakil/Anggota" />
            </div>
        </div>
        <Peneliti v-model="form.peneliti"></Peneliti>
    </div>
</div>