<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Informasi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Pemohon</span></h1>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="user.name" type="text" placeholder="Nama Pemohon" label="Nama Pemohon" />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <x-splade-input disabled required name="user.email" type="text" placeholder="Email" label="Email" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input disabled required name="user.nik" type="text" label="NIK" />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <x-splade-input disabled required name="user.nomor_handphone" label="Nomor Handphone" />
            </div>
        </div>
    </div>
</div>