<template>
    <Head :title="title"/>
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-balance text-4xl font-semibold tracking-tight text-gray-900">{{ title }}</h1>
    </div>
    <form @submit.prevent="register" class="mx-auto mt-5 max-w-xl">
        <div class="mb-5">
            <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Name:</label>
            <input v-model="form.name" type="text" id="name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
            <DangerAlert v-if="form.errors.name" :message="form.errors.name" />
        </div>
        <div class="mb-5">
            <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email:</label>
            <input v-model="form.email" type="email" id="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
            <DangerAlert v-if="form.errors.email" :message="form.errors.email" />
        </div>
        <div class="mb-5">
            <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Password:</label>
            <input v-model="form.password" type="password" id="password" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
            <DangerAlert v-if="form.errors.password" :message="form.errors.password" />
        </div>
        <div class="mb-5">
            <label for="password_confirmation" class="block text-sm font-semibold leading-6 text-gray-900">Password confirmation:</label>
            <input v-model="form.password_confirmation" type="password" id="password_confirmation" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
            <DangerAlert v-if="form.errors.password_confirmation" :message="form.errors.password_confirmation" />
        </div>
        <button type="submit" :disabled="form.processing" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
    </form>
</template>

<script>
import { useForm, Head } from '@inertiajs/vue3'
import Layout from "../Components/Layout.vue";
import DangerAlert from '../Components/DangerAlert.vue';

export default {
    components: {
        Head,
        DangerAlert
    },
    props: {
        title: String
    },
    layout: Layout,
    setup() {
        const form = useForm({
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        })

        function register() {
            form.post(route('register.store'))
        }

        return {form, register}
    },
}
</script>