<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Informasi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Pemohon</span></h1>
        <a class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
            <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 me-3">Keperluan :</span> <span class="text-sm font-medium">Mengurus {{$pemohon->perizinan->nama_perizinan}}</span>
            <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
        </a>
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