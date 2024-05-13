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
              Juan Cochin
            </h2>
            <P class="mb-4 text-accent"> est né en 1994 au Mexique et vit en France depuis 1997.</P>
            <hr class="mb-4 opacity-90 dark:opacity-5" />
            <p class="mb-8">
              Il grandit à Nantes.
              Les gants de boxe, les plumes et les pinceaux ne sont jamais loin de sa main.
              La peinture et l’encre viennent toujours couvrir ses toiles et raconter un univers imaginaire de révoltes et d’espoir.
            </p>
          </div>
          <div class="mb-4">
            <p class="italic">« La nature humaine m’inspire.</p>
            <p class="italic">Lorsque la plume rencontre la toile,</p>
            <p class="italic">une certaine énergie m’emporte,</p>
            <p class="italic">afin de créer un univers fantasmagorique et irréel.</p>
            <p class="italic">Le côté organique qui se dégage de certains tableaux suit une partition de musique qui me vient de l’intérieur ».</p>
          </div>
          <p class="mb-4">
            Pour toute question ou projet, contactez-moi dès maintenant !
            </p>
          <a href="#contact" class="btn btn-md bg-accent text-light-tail-100">
            Contactez moi
          </a>
        </div>
      </div>
    </div>
  </section>
</template>
