<template>
  <div
    v-if="isOpen"
    class="modal-overlay fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75"
    @keydown.esc="closeModal"
    @click.self="closeModal"
    tabindex="0"
  >
    <div
      class="modal-content bg-white dark:bg-dark-primary max-w-3xl w-full p-6 relative rounded-lg shadow-lg"
      @click.stop
      ref="modalContent"
    >
      <button
        @click="closeModal"
        class="absolute top-4 right-4 text-gray-600 hover:text-gray-900 dark:text-gray-300 text-2xl"
        aria-label="Close modal"
      >
        &times;
      </button>
      <div class="p-4">
        <div class="relative">
          <button
            @click="zoomIn"
            class="absolute top-0 right-0 mr-4 mt-4 text-gray-600 hover:text-gray-900 dark:text-gray-300 text-xl z-10"
            aria-label="Zoom in"
          >
            +
          </button>
          <button
            @click="zoomOut"
            class="absolute top-0 right-0 mr-4 mt-12 text-gray-600 hover:text-gray-900 dark:text-gray-300 text-xl z-10"
            aria-label="Zoom out"
          >
            -
          </button>
          <img
            :src="project.image"
            :alt="project.name"
            :style="{ transform: 'scale(' + zoomLevel + ')' }"
            class="w-full h-auto rounded-md mb-4"
          />
        </div>
        <h3 class="text-lg font-semibold">
          <strong>Titre :</strong> {{ project.name }}
        </h3>
        <p>
          <strong>Catégorie :</strong> {{ project.skill.name }}
        </p>
        <p>
          <strong>Description :</strong> {{ project.description }}
        </p>
        <p>
          <strong>Taille :</strong> {{ project.taille }} <strong>cm</strong>
        </p>
        <p v-if="project.prix">
          <strong>Prix :</strong> {{ project.prix }} <strong>€</strong>
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits, ref, onMounted, onBeforeUnmount } from 'vue';

const props = defineProps({
  project: Object,
  isOpen: Boolean,
});

const emit = defineEmits(['close']);

const zoomLevel = ref(1);
const modalContent = ref(null);

const closeModal = () => {
  emit('close');
};

const zoomIn = () => {
  zoomLevel.value = Math.min(zoomLevel.value + 0.1, 3); // Max zoom level
};

const zoomOut = () => {
  zoomLevel.value = Math.max(zoomLevel.value - 0.1, 1); // Min zoom level
};

const trapFocus = (event) => {
  if (isOpen && modalContent.value) {
    const focusableElements = modalContent.value.querySelectorAll(
      'a, button, textarea, input, select'
    );
    const firstElement = focusableElements[0];
    const lastElement = focusableElements[focusableElements.length - 1];

    if (event.shiftKey && event.target === firstElement) {
      event.preventDefault();
      lastElement.focus();
    } else if (!event.shiftKey && event.target === lastElement) {
      event.preventDefault();
      firstElement.focus();
    }
  }
};

onMounted(() => {
  document.addEventListener('keydown', trapFocus);
});

onBeforeUnmount(() => {
  document.removeEventListener('keydown', trapFocus);
});
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
  transition: all 0.3s ease;
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
