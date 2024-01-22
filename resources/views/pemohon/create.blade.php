<x-app-layout>
    <x-slot name="header">
        {{ __('Pemohon') }}
    </x-slot>

    // Alur Penelitian
    @if($perizinan->id == 1 || $perizinan->id == 2 || $perizinan->id == 3)
    <x-splade-form :default="['perizinan' => $perizinan, 'user' => $user]" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" action="{{ route('pemohon.store') }}" method="post">
        <div v-if="{{$perizinan->id}} == 1">
            @include('components.formulir.penelitian-mahasiswa')
        </div>
        <div v-if="{{$perizinan->id}} == 2">
            @include('components.formulir.penelitian-perorangan')
        </div>
        <div v-if="{{$perizinan->id}} == 3">
            @include('components.formulir.penelitian-lembaga')
        </div>
        <div class="p-4 sm:ml-64">
            <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Lengkapi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Berkas Permohonan</span></h1>
                <x-splade-group>
                    @foreach($persyaratan as $key=>$persyaratan)
                    <div class="py-2">
                        <h6 class="text-lg font-bold dark:text-white">{{ $key + 1 }}. {{$persyaratan->nama_persyaratan}}</h6>
                        <x-splade-file accept="application/pdf" filepond max-size="2MB" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" name="field_{{ $key + 1 }}" filepond preview />
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
    // Alur Perizinan
    @elseif($profile == null)
    <x-splade-form :default="['perizinan' => $perizinan, 'user' => $user]" action="{{ route('pemohon.profile.store') }}" method="post">
        @include('components.formulir.profile-usaha')
    </x-splade-form>
    @else
    <x-splade-form :default="['perizinan' => $perizinan, 'user' => $user, 'profile' => $profile]" confirm="Konfirmasi Submit Permohonan" confirm-text="Apakah anda yakin sudah memastikan seluruh berkas sesuai?" confirm-button="Ya, Saya Yakin!" cancel-button="Tidak, Masih ada yang salah!" action="{{ route('pemohon.store') }}" method="post">
        <div v-if="{{$perizinan->id}} == 4">
            @include('components.editFormulir.profile-usaha')
            @include('components.formulir.type-rpk')
        </div>
        <div class="p-4 sm:ml-64">
            <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Lengkapi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Berkas Permohonan</span></h1>
                <x-splade-group>
                    @foreach($persyaratan as $key=>$persyaratan)
                    <div class="py-2">
                        <h6 class="text-lg font-bold dark:text-white">{{ $key + 1 }}. {{$persyaratan->nama_persyaratan}}</h6>
                        <x-splade-file accept="application/pdf" filepond max-size="2MB" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" name="field_{{ $key + 1 }}" filepond preview />
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
    @endif

</x-app-layout>