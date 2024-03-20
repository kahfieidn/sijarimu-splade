<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Kelola <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">User</span></h1>
            <x-splade-form :default="[]" action="{{ route('admin-management-user.store') }}" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" method="POST">
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-input required name="nik" type="text" placeholder="NIK" label="NIK" />
                </div>
                <div class="grid md:grid-cols-3 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <x-splade-input required name="name" type="text" placeholder="Nama Pengguna" label="Nama Pengguna" />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <x-splade-input required name="email" type="text" placeholder="Email" label="Email" />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <x-splade-input required name="password" type="password" placeholder="Password" label="Password" />
                    </div>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-textarea required name="alamat" type="text" placeholder="Alamat" label="Alamat" />
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <x-splade-input required name="nomor_handphone" type="text" placeholder="Nomor Handphone" label="Nomor Handphone" />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <x-splade-select required choices label="Role" name="user_role" :options="$user_role" option-label="name" option-value="name" />
                    </div>
                </div>

                <x-splade-submit label="Simpan Data" />
            </x-splade-form>
        </div>
    </div>

</x-app-layout>