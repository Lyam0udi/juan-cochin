<template>
    <div v-if="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white dark:bg-dark-primary p-4 rounded-lg relative max-w-lg w-full">
        <button @click="closeModal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 dark:text-gray-300">
          &times;
        </button>
        <img :src="project.image" :alt="project.name" class="w-full h-auto rounded-md" />
        <h3 class="text-lg font-semibold mt-4"><strong>Titre :</strong>{{ project.name }}</h3>
        <p><strong>Catégorie :</strong>{{ project.skill.name }}</p>
        <p><strong>Description :</strong>{{ project.description }}</p>
        <p><strong>Taille:</strong> {{ project.taille }}</p>
        <p v-if="project.prix"><strong>Prix:</strong> {{ project.prix }}</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps, defineEmits } from "vue";
  
  const props = defineProps({
    project: Object,
    isOpen: Boolean,
  });
  
  const emit = defineEmits(["close"]);
  
  const closeModal = () => {
    emit("close");
  };
  </script>
  
  <style scoped>
  /* Add any additional styles here */
  </style>
  