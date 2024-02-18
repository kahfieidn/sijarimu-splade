<x-guest-layout>
    <div class="sm:ml-64 sm:mr-64 p-4">
        <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Isi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Formulir Pendaftaran</span></h1>

            <x-splade-form action="{{ route('register') }}" class="space-y-4">
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-input id="name" type="text" name="name" :label="__('Nama Lengkap')" required autofocus />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <x-splade-textarea name="alamat" autosize label="Alamat lengkap" required />
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full group">
                        <x-splade-input id="nik" name="nik" :label="__('NIK')" required />
                    </div>
                    <div class="relative z-0 w-full group">
                        <x-splade-input id="nomor_handphone" name="nomor_handphone" :label="__('Nomor Handphone')" required autofocus />
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <x-splade-input id="email" type="email" name="email" :label="__('Email')" required />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <x-splade-input class="mb-2" id="password" type="password" name="password" :label="__('Password')" required autocomplete="new-password" />
                        <x-splade-input id="password_confirmation" type="password" name="password_confirmation" :label="__('Confirm Password')" required />
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <Link class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sudah pernah mendaftar? Klik untuk login') }}
                    </Link>

                    <x-splade-submit class="ml-4" :label="__('Daftar Sekarang')" />
                </div>
            </x-splade-form>
        </div>
    </div>
</x-guest-layout>