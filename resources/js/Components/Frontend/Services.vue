<template>
  <section id="services" class="section bg-light-secondary dark:bg-dark-secondary">
    <div class="container mx-auto" v-motion :initial="{ opacity: 0, y: 100 }" :visible="{ opacity: 1, y: 0 }">
      <div class="flex flex-col items-center text-center">
        <h2 class="section-title">Services offerts à nos clients</h2>
        <p class="subtitle">
          Cette partie est consacrée pour lister les services offerts à nos clients. Pour toute sorte de travail personnalisé, n'hésitez pas à me contacter.
        </p>
      </div>
      <div class="grid lg:grid-cols-2 gap-8">
        <div class="service-card p-8 bg-white dark:bg-dark-navy-500 rounded-2xl shadow-lg flex flex-col items-center">
          <div class="service-icon mb-4">
            <img src="/img/paint-icon.jpeg" alt="Peinture" class="w-24 h-24 border border-gray-300 rounded-full" loading="lazy">
          </div>
          <h4 class="text-2xl font-semibold mb-4">Création de peinture</h4>
          <p class="text-gray-700 dark:text-gray-300 text-center">
            Nous offrons des services de création de peinture sur mesure pour embellir vos espaces et refléter votre style personnel.
          </p>
        </div>
        <div class="service-card p-8 bg-white dark:bg-dark-navy-500 rounded-2xl shadow-lg flex flex-col items-center">
          <div class="service-icon mb-4">
            <img src="/img/drawing-icon.jpeg" alt="Dessin" class="w-24 h-24 border border-gray-300 rounded-full" loading="lazy">
          </div>
          <h4 class="text-2xl font-semibold mb-4">Création de dessins</h4>
          <p class="text-gray-700 dark:text-gray-300 text-center">
            Nos services incluent la création de dessins personnalisés, idéaux pour des cadeaux uniques ou des projets artistiques spécifiques.
          </p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
  // Your script setup logic can go here
</script>

<style scoped>
    .service-card {
      transition: transform 0.3s ease;
    }
    .service-card:hover {
      transform: translateY(-10px);
    }

  /* Add scoped styles for adjustments */
  @media (min-width: 1024px) {
    /* Adjust grid layout for larger screens */
    .lg\:grid-cols-2 {
      grid-template-columns: repeat(2, minmax(0, 1fr)); /* Adjust to 2 columns */
    }
    .section {
      padding: 7rem 0;
    }
  }
</style>
