<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    
        <Head title="Forgot Password" />

        <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-purple-500">
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
                <div class="flex justify-center mb-6">
                    <img src="/img/logo.png" alt="Logo" class="h-16">
                </div>
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6"  style="color: #4b5563;">Mot de passe oublié?</h2>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <BreezeLabel for="email" value="E-mail" />
                        <BreezeInput id="email" type="email" class="input mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                        <BreezeInputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Envoyer le lien de réinitialisation du mot de passe
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    <!-- </BreezeGuestLayout> -->
</template>
