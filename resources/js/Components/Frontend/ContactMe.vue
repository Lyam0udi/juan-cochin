<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const showMessage = ref(false);
const form = useForm({
  name: "",
  email: "",
  body: "",
});

function setShowMessage(value) {
  showMessage.value = value;
}

function cleanForm() {
  form.reset();
  setShowMessage(true);
  setTimeout(() => setShowMessage(false), 3000);
}

const submit = () => {
  form.post(route("contact"), {
    preserveScroll: true,
    onSuccess: () => cleanForm(),
  });
};
</script>

<template>
  <section id="contact" class="section bg-light-primary dark:bg-dark-primary">
    <div
      class="container mx-auto"
      v-motion
      :initial="{ opacity: 0, y: 100 }"
      :visible="{ opacity: 1, y: 0 }"
    >
      <div class="flex flex-col lg:flex-row lg:gap-x-8">
        <!-- Left side content -->
        <div class="flex flex-1 flex-col items-start space-y-8 mb-12 lg:mb-0 lg:pt-2">
          <!-- Contact Heading -->
          <h2 class="section-title text-left">Contactez Moi</h2>
          
          <!-- Introductory Text -->
          <p class="subtitle text-left">
            Connectez-vous directement avec Juan. Que vous ayez des questions, 
            des propositions de collaboration ou simplement envie de partager vos pensées, 
            Juan Cochin est ravi de recevoir vos messages.
          </p>

          <!-- Contact Information -->
          <div class="space-y-8">
            <div class="flex gap-x-4">
              <div class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 text-2xl">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                  />
                </svg>
              </div>
              <div>
                <h4 class="font-body text-xl mb-1">Avez-vous des questions ?</h4>
                <p class="mb-1 text-paragraph">Je suis joignable via ma boîte mail :</p>
                <p class="text-accent font-normal">lechatrouge28@gmail.com</p>
              </div>
            </div>
            <div class="flex gap-x-4">
              <div class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 text-2xl">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                  />
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                  />
                </svg>
              </div>
              <div>
                <h4 class="font-body text-xl mb-1">Emplacement actuel</h4>
                <p class="mb-1 text-paragraph">île de Houat, Bretagne</p>
                <p class="text-accent font-normal">Servant des clients à travers le monde</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right side form -->
        <div class="flex flex-1 flex-col items-start lg:items-end space-y-8">
          <form @submit.prevent="submit" class="space-y-8 w-full max-w-md">
            <div
              v-if="showMessage"
              class="m-2 p-4 bg-light-tail-500 dark:bg-dark-navy-100 text-light-secondary rounded-lg"
            >
              Merci de me contacter!
            </div>
            <div class="space-y-4">
              <div>
                <input
                  v-model="form.name"
                  type="text"
                  class="input w-full"
                  placeholder="Votre Nom"
                />
                <span v-if="form.errors.name" class="text-sm m-2 text-red-400">
                  {{ form.errors.name }}
                </span>
              </div>
              <div>
                <input
                  v-model="form.email"
                  type="email"
                  class="input w-full"
                  placeholder="Votre Email"
                />
                <span v-if="form.errors.email" class="text-sm m-2 text-red-400">
                  {{ form.errors.email }}
                </span>
              </div>
              <div>
                <textarea
                  v-model="form.body"
                  class="textarea w-full"
                  placeholder="Votre Message"
                  spellcheck="false"
                ></textarea>
                <span v-if="form.errors.body" class="text-sm m-2 text-red-400">
                  {{ form.errors.body }}
                </span>
              </div>
              <div>
                <button class="btn btn-lg bg-accent hover:bg-secondary text-white w-full">
                  Envoyer le Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
