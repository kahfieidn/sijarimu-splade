<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Informasi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Profile Usaha</span></h1>
        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="profile.perusahaan" type="text" placeholder="Nama perusahaan" label="Nama perusahaan" oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input required name="profile.npwp" type="text" placeholder="NPWP" label="NPWP" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-file label="NPWP File" required accept="application/pdf" filepond max-size="2MB" name="profile.npwp_file" filepond preview />
                @if($profile != null)
                <Link href="#modal-npwp" class="relative sm inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                <span class="relative px-2 py-1 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Lihat Berkas
                </span>
                </Link>
                <x-splade-modal name="modal-npwp" max-width="7xl">
                    <h4 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-1xl lg:text-2xl dark:text-white"><span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">File NPWP</span></h4>
                    <div class="p-4">
                        <iframe src="{{url('/storage/profile_usaha/' . $profile->first()->npwp_file)}}" width="100%" height="500"></iframe>

                        <div class="flex justify-between items-center ">
                            <div class="flex items-center space-x-3 sm:space-x-4">
                            </div>
                            <button @click="modal.close" type="button" class="mt-3 inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Tutup
                            </button>
                        </div>
                    </div>
                </x-splade-modal>
                @endif
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input label="NIB" required name="profile.nib" type="text" placeholder="NIB" label="Nomor Induk Berusaha" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-file label="NIB File" required accept="application/pdf" filepond max-size="2MB" name="profile.nib_file" filepond preview />
                @if($profile != null)
                <Link href="#modal-nib" class="relative sm inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                <span class="relative px-2 py-1 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Lihat Berkas
                </span>
                </Link>
                <x-splade-modal name="modal-nib" max-width="7xl">
                    <h4 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-1xl lg:text-2xl dark:text-white"><span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">File NIB</span></h4>
                    <div class="p-4">
                        <iframe src="{{url('/storage/profile_usaha/' . $profile->first()->nib_file)}}" width="100%" height="500"></iframe>

                        <div class="flex justify-between items-center ">
                            <div class="flex items-center space-x-3 sm:space-x-4">
                            </div>
                            <button @click="modal.close" type="button" class="mt-3 inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Tutup
                            </button>
                        </div>
                    </div>
                </x-splade-modal>
                @endif
            </div>
        </div>
        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-textarea required name="profile.alamat" type="text" placeholder="Alamat perusahaan" label="Alamat perusahaan" autosize oninput="this.value = this.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-select name="profile.domisili" type="text" placeholder="Domisili" label="Domisili" required>
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
                <x-splade-select name="profile.provinsi_domisili" type="text" placeholder="Provinsi" label="Provinsi" required>
                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                </x-splade-select>
            </div>
        </div>

        @if($profile == null)
        <x-splade-group>
            <x-splade-submit class="mt-3 py-2" label="Simpan & Lanjutkan" />
        </x-splade-group>
        @endif

    </div>
</div>