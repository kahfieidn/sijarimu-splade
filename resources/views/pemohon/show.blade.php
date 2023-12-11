<x-splade-modal slideover max-width="lg">
    <h2 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">Tracking <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Berkas</span></h2>
    <x-splade-form :default="$permohonan">
        <div class="p-2 h-full">
            @if($permohonan->status_permohonan_id == 2)
            <blockquote class="p-2 my-4 border-l-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">"Berkas anda perlu di revisi,"</p>
                <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">"Alasan Verifikator : {{$permohonan->catatan}}"</p>
            </blockquote>
            <Link href="{{ route('pemohon.edit', $permohonan->id) }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Edit Berkas
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
            </Link>
            @endif
            <div class="bg-white p-8 border-dashed rounded-lg dark:border-gray-700">
                <ol class="relative text-gray-500 border-l border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    @foreach($status_permohonan as $status_permohonan)
                    @if($status_permohonan->id == $permohonan->status_permohonan_id)
                    <li class="mb-10 ml-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                            <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{ $permohonan->status_permohonan->nama_status }}</h3>
                    </li>
                    @else
                    <li class="mb-10 ml-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{$status_permohonan->nama_status}}</h3>
                    </li>
                    @endif
                    @endforeach
                </ol>

            </div>
        </div>

    </x-splade-form>

</x-splade-modal>