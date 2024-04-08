<template>
  <section id="about" class="section bg-light-secondary dark:bg-dark-secondary">
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
      <div class="flex flex-col xl:flex-row gap-24">
        <img
          class="object-cover h-full w-[566px] md:mx-auto lg:mx-0 rounded-2xl"
          src="/img/about.jpeg"
          alt="Image A Propos"
          loading="lazy"
        />
        <div
          class="
            flex flex-col
            items-center
            text-center
            lg:items-start lg:text-left
          "
        >
          <div class="flex flex-col">
            <h2 class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3">
              À propos de l'artiste
            </h2>
            <P class="mb-4 text-accent">Juan Cochin</P>
            <hr class="mb-8 opacity-90 dark:opacity-5" />
            <p class="mb-8">
              est un artiste passionné au style distinctif qui capture l'essence des émotions et des récits. <br />
              <br />
              Explorez le parcours et l'inspiration derrière chaque chef-d'œuvre.
            </p>
          </div>
          <a href="#contact" class="btn btn-md bg-accent text-light-tail-100">
            Contactez moi
          </a>
        </div>
      </div>
    </div>
  </section>
</template>