<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <!-- <BreezeGuestLayout> -->
        <Head title="Register" />
        <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-purple-500">
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
                <div class="flex justify-center mb-6">
                    <Link href="/"> <!-- Specify the root URL as href -->
                        <img src="/img/logo.png" alt="Logo" class="h-16">
                    </Link>
                </div>
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6" style="color: #4b5563;">S'inscrire</h2>
                <form @submit.prevent="submit">
                    <div>
                        <BreezeLabel for="name" value="Nom" />
                        <BreezeInput id="name" type="text" class="input mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                        <BreezeInputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="email" value="E-mail" />
                        <BreezeInput id="email" type="email" class="input mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                        <BreezeInputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="password" value="Mot de passe" />
                        <BreezeInput id="password" type="password" class="input mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                        <BreezeInputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="password_confirmation" value="Confirmez le mot de passe" />
                        <BreezeInput id="password_confirmation" type="password" class="input mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                        <BreezeInputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Déjà inscrit ?
                        </Link>

                        <BreezeButton class="btn ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            S'INSCRIRE
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    <!-- </BreezeGuestLayout> -->
</template>
