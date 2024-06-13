<script setup>
import Projects from "./Projects.vue";

defineProps({
  skills: Object,
  projects: Object,
});
</script>

<template> <!-- pt-10 in the section to Reduce the space between the context and the edge in the top-->
  <section
    id="gallery"
    class="section bg-light-primary dark:bg-dark-primary min-h-[1000px] pt-20" 
  >
    <div
      class="container mx-auto"
      v-motion
      :initial="{
        opacity: 0,
        y: 100,
      }"
      :visible="{
        opacity: 1,
        y: 0,
      }"
    >
      <div class="flex flex-col items-center text-center">
        <h2 class="section-title">Galerie</h2>
        <p class="subtitle">
          Plongez-vous dans le festin visuel des œuvres de Juan Cochin. Des portraits captivants aux merveilles abstraites, 
          chaque pièce raconte une histoire, vous invitant à vivre la beauté de l'imagination de l'artiste
        </p>
      </div>
    </div>
    <Projects :skills="skills" :projects="projects" />
  </section>
</template>
