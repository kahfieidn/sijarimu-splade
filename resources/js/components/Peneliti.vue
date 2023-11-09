<template>
    <div>
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
            Daftar
            <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Peneliti
                :</span>
        </h1>
        <div v-for="(field, index) in fields" :key="index" class="grid md:grid-cols-5 md:gap-4">
            <div class="relative z-999 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Identitas</label>
                <select v-model="field.jenis_identitas" id="jenis_identitas" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="NIK" selected>NIK</option>
                    <option value="NIM">NIM</option>
                </select>
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <label for="no_identitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                    Identitas</label>
                <input v-model="field.no_identitas" type="text" id="no_identitas"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nomor Identitas" required />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Peneliti</label>
                <input v-model="field.nama" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama Peneliti" required />
            </div>
            <div class="relative z-999 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Peneliti</label>
                <input v-model="field.jabatan_peneliti" type="text" id="jabatan_peneliti"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ketua" required />
            </div>
            <div v-if="index != 0" class="relative z-999 w-full mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aksi</label>
                <button @click.prevent="removeField(field)" type="button"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Hapus
                </button>
            </div>
        </div>
        <button @click.prevent="addField"
            class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            <span
                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Tambah Anggota
            </span>
        </button>

    </div>
</template>

<script setup>
import { ref, defineEmits, onUpdated } from "vue";

const emit = defineEmits(["update:modelValue"]);

const fields = ref([
    {
        jenis_identitas: "",
        no_identitas: "",
        nama: "",
        jabatan_peneliti: "",
    },
]);

const addField = () => {
    fields.value.push({
        jenis_identitas: "",
        no_identitas: "",
        nama: "",
        jabatan_peneliti: "",
    });
};

const removeField = (fieldToRemove) => {
    const indexToRemove = fields.value.indexOf(fieldToRemove);
    fields.value.splice(indexToRemove, 1);
};

onUpdated(() => {
    emit("update:modelValue", fields.value);
});
</script>
