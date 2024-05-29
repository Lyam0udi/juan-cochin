<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeCheckbox from '@/Components/Checkbox.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <!-- <BreezeGuestLayout> -->
        <Head title="Log in" />

        <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-purple-500">
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
                <div class="flex justify-center mb-6">
                    <Link href="/"> <!-- Specify the root URL as href -->
                        <img src="/img/logo.png" alt="Logo" class="h-16">
                    </Link>
                </div>
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Log in</h2>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <BreezeLabel for="email" value="Email" />
                        <BreezeInput id="email" type="email" class="input mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                        <BreezeInputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="password" value="Password" />
                        <BreezeInput id="password" type="password" class="input mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                        <BreezeInputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <BreezeCheckbox name="remember" v-model:checked="form.remember" />
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Forgot your password?
                        </Link>

                        <BreezeButton class="btn ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Log in
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    <!-- </BreezeGuestLayout> -->
</template>
