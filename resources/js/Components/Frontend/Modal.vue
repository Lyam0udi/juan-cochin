<template>
  <div v-if="isOpen" class="modal-overlay fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
    <div class="modal-content bg-white dark:bg-dark-primary max-w-3xl w-full p-6 relative rounded-lg shadow-lg">
      <button @click="closeModal" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900 dark:text-gray-300 text-2xl">
        &times;
      </button>
      <div class="p-4">
        <div class="relative">
          <button @click="zoomIn" class="absolute top-0 right-0 mr-4 mt-4 text-gray-600 hover:text-gray-900 dark:text-gray-300 text-xl z-10">
            +
          </button>
          <button @click="zoomOut" class="absolute top-0 right-0 mr-4 mt-12 text-gray-600 hover:text-gray-900 dark:text-gray-300 text-xl z-10">
            -
          </button>
          <img :src="project.image" :alt="project.name" :style="{ transform: 'scale(' + zoomLevel + ')' }" class="w-full h-auto rounded-md mb-4" />
        </div>
        <h3 class="text-lg font-semibold"><strong>Titre :</strong> {{ project.name }}</h3>
        <p><strong>Catégorie :</strong> {{ project.skill.name }}</p>
        <p><strong>Description :</strong> {{ project.description }}</p>
        <p><strong>Taille :</strong> {{ project.taille }}</p>
        <p v-if="project.prix"><strong>Prix :</strong> {{ project.prix }} <strong>€</strong></p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits, ref } from 'vue';

const props = defineProps({
  project: Object,
  isOpen: Boolean,
});

const emit = defineEmits(['close']);

const zoomLevel = ref(1);

const closeModal = () => {
  emit('close');
};

const zoomIn = () => {
  zoomLevel.value += 0.1;
};

const zoomOut = () => {
  zoomLevel.value -= 0.1;
};
</script>

<style scoped>
.modal-overlay {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.75);
}

.modal-content {
  max-height: 90vh;
  overflow-y: auto;
}

.modal-content img {
  max-height: 50vh;
  object-fit: contain;
  transition: transform 0.3s ease;
}

.shadow-lg {
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
}

.rounded-lg {
  border-radius: 0.5rem;
}
</style>
