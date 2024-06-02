<script setup>
import Project from "./Project.vue";
import Pagination from "./Pagination.vue";
import { ref, watch, computed } from "vue";

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
      return project.skill_id === id;
    });
  }
  selectedSkill.value = id;
  currentPage.value = 1; // Reset to first page when filter is applied
};

const paginatedProjects = computed(() => {
  const start = (currentPage.value - 1) * projectsPerPage.value;
  const end = start + projectsPerPage.value;
  return filteredProjects.value.slice(start, end);
});

const totalPages = computed(() => {
  return Math.ceil(filteredProjects.value.length / projectsPerPage.value);
});

watch(() => props.projects.data, (newProjects) => {
  filterProjects(selectedSkill.value);
});
</script>

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
    <section
      class="grid gap-y-12 lg:grid-cols-3 lg:gap-8 transition-opacity duration-300"
      :class="{ 'opacity-50': selectedSkill !== 'all' && filteredProjects.length === 0 }"
    >
      <Project
        v-for="project in paginatedProjects"
        :key="project.id"
        :project="project"
        class="transition-transform transform hover:scale-105"
      />
    </section>
    <Pagination :current-page="currentPage" :total-pages="totalPages" @page-changed="currentPage = $event" />
  </div>
</template>

<style scoped>
/* Add any additional styles here */
</style>
