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
  setTimeout(() => setShowMessage(false), 2000);
}

const submit = () => {
  form.post(route("contact"), {
    preserveScroll: true,
    onSuccess: () => cleanForm(),
  });
};
</script>

<template>
  <section id="contact" class="container section bg-light-primary dark:bg-dark-primary py-20">
    <div class="container mx-auto px-4 lg:px-0 flex justify-end">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
          <h2 class="text-4xl font-bold mb-8">Contactez-moi</h2>
          <p class="text-lg mb-8">Vous avez des questions, des demandes de collaboration ou simplement envie de discuter de vos projets artistiques? N'hésitez pas à me contacter via le formulaire.</p>
          <div class="flex items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-12 h-12 text-accent mr-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>
            <div>
              <h4 class="text-2xl font-bold mb-2">Besoin d'aide?</h4>
              <p class="text-lg mb-1">Je suis disponible par e-mail :</p>
              <p class="text-accent font-medium">info@monartiste.com</p>
            </div>
          </div>
          <div class="flex items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-12 h-12 text-accent mr-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
            </svg>
            <div>
              <h4 class="text-2xl font-bold mb-2">Localisation</h4>
              <p class="text-lg mb-1">Basé à :</p>
              <p class="text-accent font-medium">Ville, Pays</p>
            </div>
          </div>
        </div>
        <form @submit.prevent="submit" class="max-w-md">
          <div v-if="showMessage" class="bg-light-tail-500 dark:bg-dark-navy-100 text-light-secondary py-4 px-6 mb-6 rounded-lg">
            Merci pour votre message.
          </div>
          <div class="flex flex-col gap-6">
            <input v-model="form.name" type="text" class="input" placeholder="Votre nom" />
            <span v-if="form.errors.name" class="text-sm text-red-400">{{ form.errors.name }}</span>
            <input v-model="form.email" type="email" class="input" placeholder="Votre email" />
            <span v-if="form.errors.email" class="text-sm text-red-400">{{ form.errors.email }}</span>
          </div>
          <textarea v-model="form.body" class="textarea mt-6 mb-4" placeholder="Votre message" spellcheck="false"></textarea>
          <span v-if="form.errors.body" class="text-sm text-red-400">{{ form.errors.body }}</span>
          <button class="btn btn-lg bg-accent hover:bg-secondary text-white w-full py-3">Envoyer le message</button>
        </form>
      </div>
    </div>
  </section>
</template>
