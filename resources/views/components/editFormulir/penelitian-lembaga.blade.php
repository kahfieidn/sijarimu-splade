<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Permohonan</span></h1>
        <div class="relative z-0 w-full mb-6 group">
            <x-splade-input required name="penelitian.lembaga" type="text" placeholder="Tulis Nama Lembaga / Instansi / Perusahaan" label="Nama Lembaga / Instansi / Perusahaan" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <x-splade-input required name="penelitian.judul_penelitian" type="text" placeholder="Judul Penelitian Anda" label="Judul Penelitian" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input required name="penelitian.waktu_awal_penelitian" date label="Waktu Awal Penelitian" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input required name="penelitian.waktu_akhir_penelitian" date label="Waktu Akhir Penelitian" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="penelitian.lokasi_penelitian" type="text" placeholder="Lokasi Penelitian" label="Lokasi Penelitian" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
        </div>
        <!-- <editPeneliti v-model="form.editPeneliti"></editPeneliti> -->
    </div>

    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Daftar <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Peneliti</span></h1>

        @foreach($peneliti as $key=>$peneliti)
        <div class="grid md:grid-cols-4 md:gap-4">
            <div class="relative z-999 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Identitas</label>
                <x-splade-select name="peneliti[{{$key}}].jenis_identitas">
                    <option value="NIK">NIK</option>
                    <option value="NIM">NIM</option>
                </x-splade-select>
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input name="peneliti[{{$key}}].no_identitas" type="text" placeholder="Nomor Identitas" label="Nomor Identitas" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input name="peneliti[{{$key}}].nama" type="text" placeholder="Nama Peneliti" label="Nama Peneliti" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input name="peneliti[{{$key}}].jabatan_peneliti" type="text" placeholder="Ketua/Wakil/Anggota" label="Jabatan Peneliti" />
            </div>
        </div>
        @endforeach

    </div>

</div>