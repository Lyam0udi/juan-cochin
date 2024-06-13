<template>
  <section id="services" class="section bg-light-secondary dark:bg-dark-secondary py-16">
    <div class="container mx-auto">
      <div class="text-center mb-12">
        <h2 class="section-title text-3xl font-bold">Services offerts à nos clients</h2>
        <p class="subtitle mt-4 text-lg text-gray-600 dark:text-gray-300">
          Cette partie est consacrée pour lister les services offerts à nos clients. Pour toute sorte de travail personnalisé, n'hésitez pas à me contacter.
        </p>
      </div>
      <div class="grid md:grid-cols-2 gap-12">
        <div class="service-card p-8 bg-white dark:bg-dark-navy-500 rounded-2xl shadow-lg flex flex-col items-center">
          <div class="service-icon mb-8">
            <img src="/img/paint-icon.jpeg" alt="Peinture" class="w-24 h-24 border border-gray-300 rounded-full" loading="lazy">
          </div>
          <h4 class="text-2xl font-semibold mb-4">Création de peinture</h4>
          <p class="text-gray-700 dark:text-gray-300">
            Nous offrons des services de création de peinture sur mesure pour embellir vos espaces et refléter votre style personnel.
          </p>
        </div>
        <div class="service-card p-8 bg-white dark:bg-dark-navy-500 rounded-2xl shadow-lg flex flex-col items-center">
          <div class="service-icon mb-8">
            <img src="/img/drawing-icon.jpeg" alt="Dessin" class="w-24 h-24 border border-gray-300 rounded-full" loading="lazy">
          </div>
          <h4 class="text-2xl font-semibold mb-4">Création de dessins</h4>
          <p class="text-gray-700 dark:text-gray-300">
            Nos services incluent la création de dessins personnalisés, idéaux pour des cadeaux uniques ou des projets artistiques spécifiques.
          </p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
</script>

<style>
.section {
  padding: 4rem 0;
}
.section-title {
  color: #2c3e50;
}
.subtitle {
  max-width: 600px;
  margin: 0 auto;
  color: #7f8c8d;
}
.service-card {
  transition: transform 0.3s ease;
}
.service-card:hover {
  transform: translateY(-10px);
}
.service-icon img {
  border-radius: 50%;
}
</style>
