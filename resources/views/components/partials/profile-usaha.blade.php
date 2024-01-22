<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Informasi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Profile Usaha</span></h1>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required disabled name="profile.npwp" type="text" placeholder="NPWP" label="NPWP" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required disabled name="profile.perusahaan" type="text" placeholder="Perusahaan" label="Perusahaan" />
            </div>
        </div>
        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-textarea required disabled name="profile.alamat" type="text" placeholder="Alamat" label="Alamat" autosize />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-select disabled name="profile.domisili" type="text" placeholder="Domisili" label="Domisili" required>
                    <option value="Kabupaten Bintan">Kabupaten Bintan</option>
                    <option value="Kabupaten Karimun">Kabupaten Karimun</option>
                    <option value="Kabupaten Kepulauan Anambas">Kabupaten Kepulauan Anambas</option>
                    <option value="Kabupaten Lingga">Kabupaten Lingga</option>
                    <option value="Kabupaten Natuna">Kabupaten Natuna</option>
                    <option value="Kota Batam">Kota Batam</option>
                    <option value="Kota Tanjungpinang">Kota Tanjungpinang</option>
                </x-splade-select>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-select disabled name="profile.provinsi_domisili" type="text" placeholder="Provinsi" label="Provinsi" required>
                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                </x-splade-select>
            </div>
        </div>
    </div>
</div>