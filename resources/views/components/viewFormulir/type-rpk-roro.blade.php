<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Permohonan</span></h1>

        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-select disabled required choices name="type_rpk_roro.type_rpk_roro" label="Tipe Kepengurusan Izin">
                    <option disabled value="">Pilih salah satu...</option>
                    <option value="sementara">Persetujuan Pengoperasian Kapal Angkutan Penyeberangan Sementara</option>
                </x-splade-select>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input readonly required name="type_rpk_roro.nama_kapal" type="text" placeholder="Nama Kapal" label="Nama Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input readonly required name="type_rpk_roro.pemilik_kapal" type="text" placeholder="Pemilik Kapal" label="Nama Pemilik Kapal" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input readonly required name="type_rpk_roro.lintas" type="text" placeholder="Lintas" label="Lintas" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input readonly required name="type_rpk_roro.nomor_siuap" type="text" placeholder="Cth : 8932893" label="NOMOR IJIN USAHA ANGKUTAN
PENYEBERANGAN (SIUAP)" />
            </div>
        </div>
    </div>
</div>