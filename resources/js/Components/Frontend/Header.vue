<script setup>
import { ref, onMounted } from "vue";
import { toggleDarkMode } from "../../darkModeToggle";
const showMobileMenu = ref(false);
const scrollBg = ref(false);

const navigations = [
  { name: "Accueil", href: "#home" },
  { name: "À propos", href: "#about" },
  { name: "Galerie", href: "#gallery" },
  { name: "Services", href: "#services" },
  { name: "Contact", href: "#contact" },
];

const setScrollBg = (value) => {
  scrollBg.value = value;
};

onMounted(() => {
  window.addEventListener("scroll", () => {
    return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
  });
});
</script>

<template>
  <nav
    class="w-full fixed z-20 border-gray-200 px-2 sm:px-4 py-2.5 rounded"
    :class="{
      'bg-light-primary dark:bg-dark-primary': scrollBg,
      'bg-white dark:bg-slate-800': !scrollBg,
    }"
  >
    <div
      class="container flex flex-wrap justify-between items-center mx-auto"
      bis_skin_checked="1"
    >
      <a href="/" class="flex items-center">
        <img
          src="/img/logo.png"
          class="mr-3 h-10 sm:h-16"
          alt="LogoJuanCochin"
          loading="lazy"
        />
        <span
          class="
            self-center
            text-xl
            font-semibold
            whitespace-nowrap
            dark:text-white
          "
          >Juan Cochin</span
        >
      </a>

      <!-- Dark/white mode button for small devices -->
      <div class="flex items-center md:hidden space-x-2">
        <button
          @click="toggleDarkMode"
          class="
            inline-flex
            items-center
            p-2
            text-sm text-gray-500
            rounded-lg
            hover:bg-gray-100
            focus:outline-none focus:ring-2 focus:ring-gray-200
            dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600
          "
          aria-controls="navbar-default"
          aria-expanded="false"
        >
          <span class="sr-only">Toggle Dark/Light Mode</span>
          <!-- SVG icon for dark/light mode -->
          <svg
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="w-6 h-6"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8V16Z"
              fill="currentColor"
            ></path>
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.4183 2 12 2ZM12 4V8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16V20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4Z"
              fill="currentColor"
            ></path>
          </svg>
        </button>

        <button
          @click="showMobileMenu = !showMobileMenu"
          data-collapse-toggle="navbar-default"
          type="button"
          class="
            inline-flex
            items-center
            p-2
            text-sm text-gray-500
            rounded-lg
            hover:bg-gray-100
            focus:outline-none focus:ring-2 focus:ring-gray-200
            dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600
          "
          aria-controls="navbar-default"
          aria-expanded="false"
        >
          <span class="sr-only">Open main menu</span>
          <svg
            class="w-6 h-6"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </button>
      </div>

      <div
        class="w-full md:block md:w-auto"
        :class="{ hidden: showMobileMenu }"
        id="navbar-default"
        bis_skin_checked="1"
      >
        <ul
          class="
            flex flex-col
            p-4
            mt-4
            rounded-lg
            border border-light-tail-500
            dark:border-dark-navy-100
            md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0
          "
        >
          <li v-for="(navigation, index) in navigations" :key="index">
            <a
              :href="navigation.href"
              class="
                block
                py-2
                pr-4
                pl-3
                text-light-tail-500
                rounded
                dark:text-dark-navy-100
                hover:text-light-tail-100
                dark:hover:text-white
              "
              aria-current="page"
              >{{ navigation.name }}</a
            >
          </li>

          <!-- Dark/white mode button for normal devices -->
          <li class="hidden md:block">
            <button
              @click="toggleDarkMode"
              class="
                inline-flex
                items-center
                p-2
                ml-3
                text-sm text-gray-500
                rounded-lg
                hover:bg-gray-100
                focus:outline-none focus:ring-2 focus:ring-gray-200
                dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600
              "
              aria-controls="navbar-default"
              aria-expanded="false"
            >
              <span class="sr-only">Toggle Dark/Light Mode</span>
              <!-- SVG icon for dark/light mode -->
              <svg
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8V16Z"
                  fill="currentColor"
                ></path>
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.4183 2 12 2ZM12 4V8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16V20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4Z"
                  fill="currentColor"
                ></path>
              </svg>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
