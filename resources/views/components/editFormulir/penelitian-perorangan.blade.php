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
                <x-splade-input required name="penelitian.lokasi_penelitian" type="text" placeholder="DPMPTSP Provinsi Kepulauan Riau, Dikominfo Kepri" label="Lokasi Penelitian" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
        </div>
    </div>
</div>