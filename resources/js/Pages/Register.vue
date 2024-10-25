<template>
    <h1>{{ title }}</h1>
    <form @submit.prevent="register">
        <div>
            <label for="name">Name:</label>
            <input v-model="form.name" type="text" id="name">
            <div v-if="form.errors.name">
                {{ form.errors.name }}
            </div>
        </div>
        <div>
            <label for="email">Email:</label>
            <input v-model="form.email" type="email" id="email">
            <div v-if="form.errors.email">
                {{ form.errors.email }}
            </div>
        </div>
        <div>
            <label for="password">Password:</label>
            <input v-model="form.password" type="password" id="password">
            <div v-if="form.errors.password">
                {{ form.errors.password }}
            </div>
        </div>
        <div>
            <label for="password_confirmation">Password confirmation:</label>
            <input v-model="form.password_confirmation" type="password" id="password_confirmation">
            <div v-if="form.errors.password_confirmation">
                {{ form.errors.password_confirmation }}
            </div>
        </div>
        <button type="submit" :disabled="form.processing">Register</button>
    </form>
</template>

<script>
import { useForm } from '@inertiajs/vue3'

export default {
    props: {
        title: String
    },
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