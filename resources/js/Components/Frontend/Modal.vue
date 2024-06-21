<template>
  <div
    v-if="isOpen"
    class="modal-overlay fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75"
    @keydown.esc="closeModal"
    @click.self="closeModal"
    tabindex="0"
  >
    <div
      class="modal-content bg-white dark:bg-dark-primary max-w-5xl w-full p-8 relative rounded-lg shadow-lg"
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
        <div class="relative mb-6 overflow-hidden">
          <img
            :src="project.image"
            :alt="project.name"
            :style="{ transform: 'scale(' + zoomLevel + ')', transformOrigin: zoomOrigin }"
            class="w-[60%] h-auto rounded-md mx-auto"
            @mousemove="updateZoomOrigin"
          />
          <div class="zoom-controls flex items-center justify-center mt-4">
            <button
              @click="zoomOut"
              class="text-gray-600 hover:text-gray-900 dark:text-gray-300 text-xl z-10"
              aria-label="Zoom out"
            >
              -
            </button>
            <input
              type="range"
              min="1"
              max="3"
              step="0.1"
              v-model="zoomLevel"
              class="mx-4"
              aria-label="Zoom level"
            />
            <button
              @click="zoomIn"
              class="text-gray-600 hover:text-gray-900 dark:text-gray-300 text-xl z-10"
              aria-label="Zoom in"
            >
              +
            </button>
          </div>
        </div>
        <h3 class="text-2xl font-semibold mb-2">
          <strong>Titre :</strong> {{ project.name }}
        </h3>
        <p class="text-lg mb-2">
          <strong>Catégorie :</strong> {{ project.skill.name }}
        </p>
        <p class="text-lg mb-2">
          <strong>Description :</strong> {{ project.description }}
        </p>
        <p class="text-lg mb-2">
          <strong>Taille :</strong> {{ project.taille }} <strong>cm</strong>
        </p>
        <p v-if="project.prix" class="text-lg mb-2">
          <strong>Prix :</strong> {{ project.prix }} <strong>€</strong>
        </p>
        <div class="flex space-x-4 mt-4">
          <button
            @click="resetZoom"
            class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-800"
            aria-label="Reset zoom"
          >
            Réinitialiser
          </button>
          <button
            @click="closeModal"
            class="px-4 py-2 bg-accent text-white rounded hover:bg-secondary dark:bg-accent dark:hover:bg-secondary"
            aria-label="Close modal"
          >
            Fermer
          </button>
        </div>
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
const zoomOrigin = ref('center center');
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

const resetZoom = () => {
  zoomLevel.value = 1;
  zoomOrigin.value = 'center center';
};

const updateZoomOrigin = (event) => {
  const rect = event.target.getBoundingClientRect();
  const x = ((event.clientX - rect.left) / rect.width) * 100;
  const y = ((event.clientY - rect.top) / rect.height) * 100;
  zoomOrigin.value = `${x}% ${y}%`;
};

const trapFocus = (event) => {
  if (props.isOpen && modalContent.value) {
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
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      closeModal();
    }
  });
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
  transition: transform 0.3s ease, transform-origin 0.3s ease;
}

.shadow-lg {
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
}

.rounded-lg {
  border-radius: 0.5rem;
}

.zoom-controls input {
  width: 150px;
}

@media (max-width: 768px) {
  .modal-content {
    max-width: 90%;
    padding: 4;
  }

  .zoom-controls input {
    width: 100px;
  }

  h3, p {
    font-size: 1rem;
  }
}
</style>
