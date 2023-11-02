<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>
    <div>
        <x-splade-form confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" v-model="{{$perizinan->id}}" :default="$perizinan" action="{{ route('pemohon.store') }}" method="post">
            <x-splade-input readonly class="hidden" name="id" />
            <div v-show="{{$perizinan->id == 1}}">
                <x-formulir.penelitian-mahasiswa />
            </div>
            <div v-show="{{$perizinan->id == 2}}">
                <x-formulir.penelitian-perorangan />
            </div>

            <div class="p-4 sm:ml-64">
                <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                    <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Lengkapi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Berkas Permohonan</span></h1>
                    <x-splade-group>
                        @foreach($persyaratan as $key=>$persyaratan)
                        <div class="py-2">
                            <x-splade-file accept="application/pdf" filepond max-size="2MB" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" name="field_{{ $key + 1 }}" filepond preview label="{{ $key + 1 }}. {{$persyaratan->nama_persyaratan}}" />
                            <p class="text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Berkas yang di izinkan (.pdf), maksimal file size. 2MB</p>
                        </div>
                        @endforeach
                    </x-splade-group>
                    <x-splade-group>
                        <x-splade-submit class="mt-3 py-2" label="Ajukan Sekarang" />
                    </x-splade-group>
                </div>
            </div>
            
        </x-splade-form>

    </div>

</x-app-layout>