<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>
    <div class="p-4 h-full sm:ml-64">

        <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="mb-3 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Daftar <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">persyaratan</span></h1> <x-splade-table search-debounce="1000" pagination-scroll="head" :for="$persyaratans" as="$persyaratans" striped>

                <x-splade-cell actions as="$persyaratans">
                    <Link class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('admin-management-persyaratan.edit', $persyaratans->id) }}">Edit</Link>

                    <x-splade-form action="{{ route('admin-management-persyaratan.destroy', $persyaratans->id) }}" confirm="Delete Data" confirm-text="Are you sure you want to delete your post data?" confirm-button="Yes, delete everything!" cancel-button="No, I want to stay!" method="delete">
                        <x-splade-submit danger label="Hapus" />
                    </x-splade-form>
                </x-splade-cell>

            </x-splade-table>

        </div>
    </div>


</x-app-layout>