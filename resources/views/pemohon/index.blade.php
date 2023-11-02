<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    <div>
        <div class="p-4 sm:ml-64">
            <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <section class="bg-gray-50 dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-5 grid lg:grid-cols-2 gap-8 lg:gap-16">
                        <div class="flex flex-col justify-center">
                            <h2 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Formulir Elektronik Pengajuan Permohonan</h2>
                            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Sistem perizinan online DPMPTSP ini diperuntukkan bagi pemohon yang akan mengajukan permohonan Perizinan Non OSS secara online.</p>
                            </a>
                        </div>
                        <div>
                            <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                                    Cari Jenis Izin
                                </h2>

                                <x-splade-form method="GET" :action="route('pemohon.create')" class="mt-4 space-y-6">
                                    <x-splade-select placeholder="Pilih jenis izin disini..." name="perizinans" :options="$perizinans" option-label="nama_perizinan" option-value="id" choices />
                                    <x-splade-submit label="Ajukan Sekarang" />
                                </x-splade-form>

                            </div>
                        </div>

                    </div>
                </section>


            </div>
        </div>
        <div class="p-4 h-full sm:ml-64">
            <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Tracking <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Riwayat Permohonan</span></h1>
                <x-splade-table search-debounce="1000" pagination-scroll="head" :for="$permohonans">
                    <x-splade-cell actions as="$permohonans">
                        <Link slideover href="{{route('pemohon.show', $permohonans->id)}}"> Tracking Berkas </Link>
                    </x-splade-cell>
                </x-splade-table>
                
            </div>
        </div>
    </div>

</x-app-layout>