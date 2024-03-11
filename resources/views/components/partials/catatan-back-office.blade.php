@if($pemohon->catatan_back_office != null)
<div class="p-4 sm:ml-64">
    <div class="bg-white p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <blockquote class="p-2 my-4 border-l-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
            <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">"Berkas perlu di revisi"</p>
            <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">Alasan Verifikator : {!! $pemohon->catatan_back_office !!}</p>
        </blockquote>
    </div>
</div>
@endif