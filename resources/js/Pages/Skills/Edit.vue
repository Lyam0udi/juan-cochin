<template>
  <Head title="Edit Category" />
  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #4b5563;">
        Modifier Catégorie
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
        <form class="p-4" @submit.prevent="submit">
          <div>
            <BreezeLabel for="name" value="Nom de la catégorie :" />
            <BreezeInput
              id="name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.name"
              autofocus
              autocomplete="username"
            />
            <BreezeInputError class="mt-2" :message="$page.props.errors.name" />
          </div>
          <div class="mt-2">
            <BreezeLabel for="image" value="Logo de la catégorie :" />
            <BreezeInput
              id="image"
              type="file"
              class="mt-1 block w-full"
              @input="form.image = $event.target.files[0]"
            />
            <BreezeInputError
              class="mt-2"
              :message="$page.props.errors.image"
            />
          </div>
          <div class="flex items-center justify-end mt-4">
            <BreezeButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Modifier
            </BreezeButton>
          </div>
        </form>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  skill: Object,
});

const form = useForm({
  name: props.skill?.name,
  image: null,
});

const submit = () => {
  Inertia.post(`/skills/${props.skill.id}`, {
    _method: "put",
    name: form.name,
    image: form.image,
  });
};
</script>