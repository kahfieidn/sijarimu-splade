<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Permohonan</span></h1>

        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-select required choices name="type_trayek" label="Tipe Trayek">
                    <option disabled value="">Pilih salah satu...</option>
                    <option value="Trayek Tetap Dan Teratur Angkutan Laut Dalam Negeri">Trayek Tetap Dan Teratur Angkutan Laut Dalam Negeri</option>
                    <option value="Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri">Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri</option>
                    <option value="Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri Dan Lintas Batas">Trayek Tidak Tetap Dan Tidak Teratur Angkutan Laut Dalam Negeri Dan Lintas Batas</option>
                </x-splade-select>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-select required choices name="type_rpk" label="Tipe Kepengurusan Izin">
                    <option disabled value="">Pilih salah satu...</option>
                    <option value="baru">Baru</option>
                    <option value="perpanjangan">Perpanjangan</option>
                </x-splade-select>
            </div>
            <div class="relative z-999 w-full mb-3 group">
                <x-splade-select required choices name="type_gt" label="Jenis Isi Kotor GT/Bobot Mati (DWT) ">
                    <option disabled value="">Pilih salah satu...</option>
                    <option value="dibawah gt 10">Dibawah GT 10</option>
                    <option value="diatas gt 10">Diatas GT 10</option>
                </x-splade-select>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="nama_kapal" type="text" placeholder="Nama Kapal" label="Nama Kapal" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="jenis_kapal" type="text" placeholder="Cth : Kapal Penumpang / Kapal Barang / dll" label="Jenis Kapal" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="isi_kotor" type="text" placeholder="Cth : GT. 20 No. 124/GGg" label="Isi Kotor/Bobot Mati" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="tenaga_penggerak" type="text" placeholder="Cth : YAMAHA 6 x 200 PK" label="Tenaga Penggerak" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="status_kepemilikan_kapal" type="text" placeholder="Cth : Keagenan Dioperasikan" label="Status Kepemilikan Kapal" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="kapasitas_angkut" type="text" placeholder="Cth : 14 (empat belas) orang" label="Kapasitas Angkut" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="pelabuhan_pangkal" type="text" placeholder="Cth : Tanjung Uban" label="Pelabuhan Pangkal" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-select required choices name="urgensi" label="Urgensi">
                    <option disabled value="">Pilih salah satu...</option>
                    <option value="Menunjang kegiatan angkutan laut dalam negeri">Menunjang kegiatan angkutan laut dalam negeri</option>
                    <option value="Menunjang kegiatan angkutan laut dalam negeri dan lintas batas">Menunjang kegiatan angkutan laut dalam negeri dan lintas batas</option>
                </x-splade-select>
            </div>
        </div>
        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-textarea autosize required name="trayek" type="text" placeholder="Cth : Telaga Punggur, Lagoi Bintan" label="Route Trayek" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
        </div>
        <div class="grid md:grid-cols-4 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="nomor_siupper" type="text" placeholder="Cth: 234134234234" label="Nomor SIUPPER" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input date required name="tgl_siupper" placeholder="Pilih tanggal..." type="text" label="Tanggal SIUPPER" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input v-if="form.type_rpk == 'perpanjangan'" required name="nomor_rpk_sebelumnya" type="text" placeholder="Cth: 231/1D.b/DPMPTSP/X/2023" label="Nomor RPK Sebelumnya" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input date v-if="form.type_rpk == 'perpanjangan'" required name="tgl_rpk_sebelumnya" type="text" placeholder="Pilih tanggal..." label="Tanggal RPK Sebelumnya" />
            </div>
        </div>
    </div>
</div>