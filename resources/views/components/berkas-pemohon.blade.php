<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Lengkapi <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Berkas Permohonan</span></h1>
        <x-splade-group>
            <?php
            $num_field = 1;
            ?>
            @foreach($persyaratan as $key=>$persyaratan)
            <?php
            $vars = 'field_' . $num_field;
            ?>
            <div class="py-2">
                <h6 class="mb-2 text-lg font-bold dark:text-white">{{ $key + 1 }}. {{$persyaratan->nama_persyaratan}}
                    @if($status_berkas->$vars == 'terima')
                    <span class="bg-blue-100 text-blue-800 text-1xl font-semibold mb-1 mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-1">Terima</span>
                    @else
                    <span class="bg-red-100 text-red-800 text-1xl font-semibold mb-1 mr-2 px-2.5 py-0.5 rounded dark:bg-dark-200 dark:text-dark-800 ml-1">Tolak</span>
                    @endif
                    <a target="__blank" href="{{url('/storage/docs/' . $berkas->$vars)}}" class="relative sm inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <span class="relative px-2 py-1 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Lihat Berkas
                        </span>
                    </a>
                </h6>
                <x-splade-file required accept="application/pdf" filepond max-size="2MB" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" name="fields.field_{{$key+1}}" filepond preview />
                <p class="text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Unggah berkas yang perlu diperbaiki saja, yang sudah benar tidak perlu di upload kembali karena sudah tersimpan di sistem.</p>
            </div>
            <?php $num_field++; ?>
            @endforeach
        </x-splade-group>
        <x-splade-group>
            <x-splade-submit class="mt-3 py-2" label="Ajukan Sekarang" />
        </x-splade-group>
    </div>
</div>