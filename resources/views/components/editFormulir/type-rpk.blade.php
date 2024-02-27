<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Permohonan</span></h1>

        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-select required choices name="type_rpk.type_trayek" label="Tipe Trayek">
                    <option disabled value="">Pilih salah satu...</option>
                    <option value="Trayek Tetap Dan Teratur Angkutan Laut Dalam Negeri">Trayek Tetap Dan Teratur Angkutan Laut Dalam Negeri</option>
                    <option value="Trayek Tidak Tetap Dan Teratur Angkutan Laut Dallas Negeri">Trayek Tidak Tetap Dan Teratur Angkutan Laut Dalam Negeri</option>
                    <option value="Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri">Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri</option>
                    <option value="Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri Dan Lintas Batas">Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri Dan Lintas Batas</option>
                </x-splade-select>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-select required choices name="type_rpk.type_rpk" label="Tipe Kepengurusan Izin">
                    <option disabled value="">Pilih salah satu...</option>
                    <option value="baru">Baru</option>
                    <option value="perpanjangan">Perpanjangan</option>
                </x-splade-select>
            </div>
            <div class="relative z-999 w-full mb-3 group">
                <x-splade-select required choices name="type_rpk.type_gt" label="Jenis Isi Kotor GT/Bobot Mati (DWT) ">
                    <option disabled value="">Pilih salah satu...</option>
                    <option value="dibawah gt 10">Dibawah GT 10</option>
                    <option value="diatas gt 10">Diatas GT 10</option>
                </x-splade-select>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.nama_kapal" type="text" placeholder="Nama Kapal" label="Nama Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.jenis_kapal" type="text" placeholder="Cth : Kapal Penumpang / Kapal Barang / dll" label="Jenis Kapal" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.isi_kotor" type="text" placeholder="Cth : GT. 20 No. 124/GGg" label="Isi Kotor/Bobot Mati" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.tenaga_penggerak" type="text" placeholder="Cth : YAMAHA 6 x 200 PK" label="Tenaga Penggerak" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.status_kepemilikan_kapal" type="text" placeholder="Cth : Keagenan Dioperasikan" label="Status Kepemilikan Kapal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.kapasitas_angkut" type="text" placeholder="Cth : 14 (empat belas) orang" label="Kapasitas Angkut" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.pelabuhan_pangkal" type="text" placeholder="Cth : Tanjung Uban" label="Pelabuhan Pangkal" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.pelabuhan_singgah" type="text" placeholder="Cth : Telaga Punggur" label="Pelabuhan Singgah" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.urgensi" type="text" placeholder="Cth : Menunjang kegiatan angkutan laut dalam negeri" label="Urgensi" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.trayek" type="text" placeholder="Cth : Telaga Punggur, Lagoi Bintan" label="Route Trayek" />
            </div>
        </div>
        <div class="grid md:grid-cols-4 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="type_rpk.nomor_siupper" type="text" placeholder="234134234234" label="Nomor SIUPPER" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input date required name="type_rpk.tgl_siupper" type="text" placeholder="Pilih tanggal" label="Tgl. SIUPPER" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input v-if="form.type_rpk.type_rpk == 'perpanjangan'" required name="type_rpk.nomor_rpk_sebelumnya" type="text" placeholder="231/1D.b/DPMPTSP/X/2023" label="Nomor RPK Sebelumnya" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input date v-if="form.type_rpk.type_rpk == 'perpanjangan'" required name="type_rpk.tgl_rpk_sebelumnya" type="text" placeholder="Pilih tanggal.." label="Tanggal RPK Sebelumnya" />
            </div>
        </div>
    </div>
</div>