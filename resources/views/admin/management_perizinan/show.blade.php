<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>
    <div class="p-4 h-full sm:ml-64">

        <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Daftar <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">persyaratan</span></h1>
            <Link href="{{ route('admin-management-persyaratan.create') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Tambah Data
            </span>
            </Link>
            <x-splade-table search-debounce="1000" pagination-scroll="head" :for="$persyaratans" as="$persyaratans" striped>

                <x-splade-cell actions as="$persyaratans">
                    <x-splade-form action="{{ route('admin-management-persyaratan.destroy', $persyaratans->id) }}" confirm="Delete Data" confirm-text="Are you sure you want to delete your post data?" confirm-button="Yes, delete everything!" cancel-button="No, I want to stay!" method="delete">
                        <x-splade-submit danger label="Hapus" />
                    </x-splade-form>
                </x-splade-cell>

            </x-splade-table>

        </div>
    </div>


</x-app-layout>