<script setup>
import { ref, watchEffect } from 'vue';
import Modal from './Modal.vue';

const props = defineProps({
  project: Object,
});

const isModalOpen = ref(false);

const openModal = () => {
  isModalOpen.value = true;
};

const closeModal = () => {
  isModalOpen.value = false;
};

watchEffect(() => {
  if (isModalOpen.value) {
    document.body.style.overflow = 'hidden';
  } else {
    document.body.style.overflow = '';
  }
});
</script>

<template>
  <div>
    <div
      @click="openModal"
      class="group flex flex-col items-center text-center cursor-pointer"
    >
      <div class="mb-6">
        <img class="rounded-2xl h-56" :src="project.image" :alt="project.name" />
      </div>
      <span class="group-hover:text-light-tail-500 capitalize text-accent text-sm mb-3">
        {{ project.skill.name }}
      </span>
      <h3 class="group-hover:text-light-tail-500 text-2xl font-semibold capitalize mb-3">
        {{ project.name }}
      </h3>
    </div>
    <Modal :project="project" :isOpen="isModalOpen" @close="closeModal" />
  </div>
</template>

<style scoped>
.group:hover .text-accent {
  color: var(--color-light-tail-500);
}
</style>
