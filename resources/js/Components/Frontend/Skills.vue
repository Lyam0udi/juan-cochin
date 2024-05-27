<template>
  <section class="bg-light-tail-100 dark:bg-dark-navy-500 py-6 lg:py-10">
    <div class="container mx-auto">
      <div :class="containerClass">
        <div
          v-for="skill in skills.data"
          :key="skill.id"
          class="flex flex-col items-center"
        >
          <img
            :src="skill.image"
            :alt="skill.name"
            class="h-16 w-16 lg:h-20 lg:w-20 rounded-full shadow-md mb-2 sm:h-20 sm:w-20 sm:mb-3"
          />
          <div class="text-sm lg:text-base font-semibold text-gray-800 dark:text-gray-200">
            {{ skill.name }}
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { computed } from 'vue';

export default {
  props: {
    skills: Object,
  },
  setup(props) {
    const containerClass = computed(() => {
      const numSkills = props.skills.data.length;
      let classes = 'flex justify-around';

      if (numSkills === 1) {
        classes = 'flex justify-center';
      } else if (numSkills === 2) {
        classes = 'flex justify-between items-center';
      }

      return classes;
    });

    return {
      containerClass,
    };
  },
};
</script>
