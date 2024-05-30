<template>
  <Head title="Edit Project" />
  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Project
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
        <form class="p-4" @submit.prevent="submit">
          <div>
            <BreezeLabel for="skill_id" value="Skill" />
            <select
              v-model="form.skill_id"
              id="skill_id"
              name="skill_id"
              class="
                mt-1
                block
                w-full
                pl-3
                pr-10
                py-2
                text-base
                border-gray-300
                focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                sm:text-sm
                rounded-md
              "
            >
              <option v-for="skill in skills" :key="skill.id" :value="skill.id">
                {{ skill.name }}
              </option>
              <BreezeInputError
                class="mt-2"
                :message="$page.props.errors.skill_id"
              />
            </select>
          </div>
          <div>
            <BreezeLabel for="name" value="Name" />
            <BreezeInput
              id="name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.name"
              autofocus
              autocomplete="name"
            />
            <BreezeInputError class="mt-2" :message="$page.props.errors.name" />
          </div>
          <div>
            <BreezeLabel for="description" value="Description" />
            <BreezeInput
              id="description"
              type="text"
              class="mt-1 block w-full"
              v-model="form.description"
              autocomplete="description"
            />
            <BreezeInputError
              class="mt-2"
              :message="$page.props.errors.description"
            />
          </div>
          <div>
            <BreezeLabel for="taille" value="Taille" />
            <BreezeInput
              id="taille"
              type="text"
              class="mt-1 block w-full"
              v-model="form.taille"
              autocomplete="taille"
            />
            <BreezeInputError
              class="mt-2"
              :message="$page.props.errors.taille"
            />
          </div>
          <div>
            <BreezeLabel for="prix" value="Prix" />
            <BreezeInput
              id="prix"
              type="number"
              class="mt-1 block w-full"
              v-model="form.prix"
              autocomplete="prix"
            />
            <BreezeInputError
              class="mt-2"
              :message="$page.props.errors.prix"
            />
          </div>
          <div class="mt-2">
            <BreezeLabel for="image" value="Image" />
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
            <BreezeButton class="ml-4">Edit</BreezeButton>
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
  skills: Array,
  project: Object,
});

const form = useForm({
  name: props.project?.name || '',
  description: props.project?.description || '',
  taille: props.project?.taille || '',
  prix: props.project?.prix || null,
  image: null,
  skill_id: props.project?.skill_id || null,
});

const submit = () => {
  Inertia.post(`/projects/${props.project.id}`, {
    _method: "put",
    name: form.name,
    description: form.description,
    taille: form.taille,
    prix: form.prix,
    image: form.image,
    skill_id: form.skill_id,
  });
};
</script>
