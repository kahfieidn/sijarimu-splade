<template>
  <div>
      <h1
          class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
          Daftar
          <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Anggota Peneliti
              :</span>
      </h1>

      <div v-for="(peneliti, index) in peneliti" :key="index" class="grid md:grid-cols-4 md:gap-4">
          <div class="relative z-999 w-full mb-6 group">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Identitas</label>
              <select v-model="peneliti.jenis_identitas" id="jenis_identitas" required
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="NIK" selected>NIK</option>
                  <option value="NIM">NIM</option>
              </select>
          </div>
          <div class="relative z-999 w-full mb-6 group">
              <label for="no_identitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                  Identitas</label>
              <input v-model="peneliti.no_identitas" type="text" id="no_identitas"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Nomor Identitas" required />
          </div>
          <div class="relative z-999 w-full mb-6 group">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Peneliti</label>
              <input v-model="peneliti.nama" type="text"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Nama Peneliti" required />
          </div>
          <div class="relative z-999 w-full mb-6 group">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Peneliti</label>
              <input v-model="peneliti.jabatan_peneliti" type="text" id="jabatan_peneliti"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Ketua/Wakil/Anggota" required />
          </div>
      </div>
  </div>
</template>

<script setup>
import { ref, defineProps, defineEmits, onUpdated } from "vue";

const props = defineProps(['peneliti']);

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
