<template>
    <h1>{{ title }}</h1>
    <form @submit.prevent="login">
        <div v-if="form.errors.credentials">
            {{ form.errors.credentials }}
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
        <button type="submit" :disabled="form.processing" >Login</button>
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
            email: null,
            password: null,
        })

        function login() {
            form.post(route('auth.login.login'))
        }

        return {form, login}
    },
}
</script>