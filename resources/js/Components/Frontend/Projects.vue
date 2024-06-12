<template>
  <div class="container mx-auto">
    <nav class="mb-12 border-b-2 border-light-tail-100 dark:text-dark-navy-100">
      <ul class="flex flex-col lg:flex-row justify-evenly items-center">
        <li class="cursor-pointer capitalize m-4">
          <button
            @click="filterProjects('all')"
            class="flex text-center px-4 py-2 hover:bg-accent text-white rounded-md transition-colors"
            :class="[
              selectedSkill === 'all'
                ? 'bg-accent'
                : 'bg-light-tail-500 dark:bg-dark-navy-100',
            ]"
            aria-pressed="selectedSkill === 'all'"
          >
            Tout
          </button>
        </li>
        <li
          class="cursor-pointer capitalize m-4"
          v-for="projectSkill in skills.data"
          :key="projectSkill.id"
        >
          <button
            @click="filterProjects(projectSkill.id)"
            class="flex text-center px-4 py-2 hover:bg-accent text-white rounded-md transition-colors"
            :class="[
              selectedSkill == projectSkill.id
                ? 'bg-accent'
                : 'bg-light-tail-500 dark:bg-dark-navy-100',
            ]"
            :aria-pressed="selectedSkill == projectSkill.id"
          >
            {{ projectSkill.name }}
          </button>
        </li>
      </ul>
    </nav>
    <!-- Section to display projects -->
    <section class="grid gap-y-12 lg:grid-cols-3 lg:gap-8 transition-opacity duration-300" :class="{ 'opacity-50': selectedSkill !== 'all' && filteredProjects.length === 0 }">
      <!-- Display paginated projects -->
      <Project v-for="project in paginatedProjects" :key="project.id" :project="project" class="transition-transform transform hover:scale-105" />
    </section>
    <!-- Pagination -->
    <div class="flex justify-center mt-8">
      <!-- Previous button -->
      <button @click="changePage(currentPage - 1)" :disabled="currentPage === 1" class="arrow-button mr-4" v-if="currentPage !== 1">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>

       <!-- Page information -->
        <span class="mx-4">Page {{ currentPage }} / {{ totalPages }}</span>

      <!-- Next button -->
        <button @click="changePage(currentPage + 1)" :disabled="currentPage === totalPages || totalPages === 0" class="arrow-button ml-4" v-if="currentPage !== totalPages && totalPages !== 0">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>
    </div>
  </div>
</template>

<script setup>
import Project from "./Project.vue";
import { ref, watch, computed, defineProps, defineEmits } from "vue";

const props = defineProps({
  skills: Object,
  projects: Object,
});

const filteredProjects = ref(props.projects.data);
const selectedSkill = ref("all");

const currentPage = ref(1);
const projectsPerPage = ref(6); // Adjust this number as needed

const filterProjects = (id) => {
  if (id === "all") {
    filteredProjects.value = props.projects.data;
  } else {
    filteredProjects.value = props.projects.data.filter((project) => {
      return project.skill.id === id;
    });
  }
  selectedSkill.value = id;
  currentPage.value = 1; // Reset to first page when filter is applied
};

// Watch for changes to the projects prop and update the filtered projects
watch(() => props.projects.data, (newProjects) => {
  filterProjects(selectedSkill.value);
});

const paginatedProjects = computed(() => {
  const start = (currentPage.value - 1) * projectsPerPage.value;
  const end = start + projectsPerPage.value;
  return filteredProjects.value.slice(start, end);
});

const totalPages = computed(() => {
  return Math.ceil(filteredProjects.value.length / projectsPerPage.value);
});

const changePage = (page) => {
  if (page >= 1 && page <= totalPages.value) {
    currentPage.value = page;
  }
};
</script>

<style scoped>
/* Add any additional styles here */
button.arrow-button {
  transition: opacity 0.3s ease;
}

button.arrow-button:hover {
  opacity: 0.8;
}
</style>

