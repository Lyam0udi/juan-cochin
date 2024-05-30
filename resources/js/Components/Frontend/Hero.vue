<template>
  <section
    id="home"
    class="
      lg:h-[85vh]
      flex
      flex-col
      items-center
      bg-light-primary
      dark:bg-dark-primary
      py-20
      lg:py-0
      overflow-hidden
    "
  >
    <div
      class="container mx-auto h-full"
      v-motion
      :initial="{
        opacity: 0,
        y: 100,
      }"
      :visible="{
        opacity: 1,
        y: 0,
        transition: {
          type: 'spring',
          stiffness: 50,
          damping: 20
        }
      }"
    >
      <div class="flex flex-col md:flex-row items-center h-full pt-8 lg:pt-14">
        <div class="flex-1 flex flex-col items-center lg:items-start">
          <h2
            class="
              text-4xl
              leading-tight
              md:text-5xl md:leading-tight
              lg:text-7xl lg:leading-tight
              font-bold
              md:tracking-[-2px]
            "
          >
            Galerie & Art
          </h2>
          <p
            class="
              pt-4
              pb-2
              md:pt-6 md:pb-3
              max-w-[480px]
              text-lg text-center
              lg:text-left
            "
          >
            L’univers de Juan Cochin est mêlé de détails
            <br />
            concrets tels des insectes,
            <br />
            des humanoïdes ainsi que des êtres imaginaires,
            <br />
            dans un monde où ce mêlent couleurs et matières.
            <br />
            Les thèmes abordés qu’ils soient bustes de femme ou bien encore maritimes,
            <br />
            font d’eux des poèmes denses et lumineux.
            <br />
            <br />
            « L’imaginaire n’a pour limite que celle des plus beaux rêves de l’être »
          </p>
          <div>
            <h5
              class="
                text-lg
                flex
                justify-center
                lg:justify-start
                items-center
                text-black
                dark:text-white
                mb-2
              "
            >
              Suivez-moi sur :
            </h5>
            <div class="flex items-center">
              <a
                class="
                  w-12
                  h-12
                  rounded-full
                  flex
                  items-center
                  justify-center
                  border border-white
                  text-black
                  dark:text-white
                  hover:bg-light-secondary hover:border-light-secondary
                  dark:hover:bg-dark-secondary dark:hover:border-dark-secondary
                  mr-3
                  sm:mr-4
                "
                href="https://facebook.com/URLJuan"
              >
                <svg
                  width="8"
                  height="16"
                  viewBox="0 0 8 16"
                  class="fill-current"
                >
                  <path
                    d="M7.43902 6.4H6.19918H5.75639V5.88387V4.28387V3.76774H6.19918H7.12906C7.3726 3.76774 7.57186 3.56129 7.57186 3.25161V0.516129C7.57186 0.232258 7.39474 0 7.12906 0H5.51285C3.76379 0 2.54609 1.44516 2.54609 3.5871V5.83226V6.34839H2.10329H0.597778C0.287819 6.34839 0 6.63226 0 7.04516V8.90323C0 9.26452 0.243539 9.6 0.597778 9.6H2.05902H2.50181V10.1161V15.3032C2.50181 15.6645 2.74535 16 3.09959 16H5.18075C5.31359 16 5.42429 15.9226 5.51285 15.8194C5.60141 15.7161 5.66783 15.5355 5.66783 15.3806V10.1419V9.62581H6.13276H7.12906C7.41688 9.62581 7.63828 9.41935 7.68256 9.10968V9.08387V9.05806L7.99252 7.27742C8.01466 7.09677 7.99252 6.89032 7.85968 6.68387C7.8154 6.55484 7.61614 6.42581 7.43902 6.4Z"
                  />
                </svg>
              </a>
              <a
                class="
                  w-12
                  h-12
                  rounded-full
                  flex
                  items-center
                  justify-center
                  border
                  border-white
                  text-black
                  dark:text-white
                  hover:bg-light-secondary
                  hover:border-light-secondary
                  dark:hover:bg-dark-secondary
                  dark:hover:border-dark-secondary
                  mr-3
                  sm:mr-4
                "
                href="https://instagram.com/your_username"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="flex flex-1 justify-center md:justify-end items-center h-full mt-8 md:mt-0">
          <img
            class="rounded-lg w-[90%] md:w-[80%] lg:w-[80%] xl:w-[85%]"
            src="/img/accueil.jpeg"
            alt="Accueil image"
            loading="lazy"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
// Lazy load the image to avoid initial load delays
export default {
  mounted() {
    const img = new Image();
    img.src = "/img/accueil.jpeg";
    img.onload = () => {
      document.querySelector('img[alt="Accueil image"]').src = img.src;
    };
  },
};
</script>

