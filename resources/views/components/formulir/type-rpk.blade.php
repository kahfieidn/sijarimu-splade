<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Permohonan</span></h1>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="nama_kapal" type="text" placeholder="Nama Kapal" label="Nama Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="jenis_kapal" type="text" placeholder="Jenis Kapal" label="Jenis Kapal" />
            </div>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="bendera" type="text" placeholder="Bendera Kapal" label="Bendera Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="isi_kotor" type="text" placeholder="Isi Kotor" label="Isi Kotor/Bobot Mati" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="tenaga_penggerak" type="text" placeholder="Tenaga Penggerak" label="Tenaga Penggerak" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="status_kepemilikan_kapal" type="text" placeholder="Status Kepemilikan Kapal" label="Status Kepemilikan Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="kapasitas_angkut" type="text" placeholder="Kapasitas Angkut" label="Kapasitas Angkut" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="pelabuhan_pangkal" type="text" placeholder="Pelabuhan Pangkal" label="Pelabuhan Pangkal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="pelabuhan_singgah" type="text" placeholder="Pelabuhan Singgah" label="Pelabuhan Singgah" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="urgensi" type="text" placeholder="Urgensi" label="Urgensi" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="trayek" type="text" placeholder="Trayek" label="Trayek" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="nomor_siualper" type="text" placeholder="No. SIUALPER" label="No. SIUALPER" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="nomor_rpk_sebelumnya" type="text" placeholder="No. RPK Sebelumnya" label="No. RPK Sebelumnya" />
            </div>
        </div>
    </div>
</div>