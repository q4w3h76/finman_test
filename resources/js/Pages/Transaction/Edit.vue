<template>
    <Head :title="title"/>
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-balance text-4xl font-semibold tracking-tight text-gray-900">{{ title }}</h1>
    </div>
    <form @submit.prevent="update" class="mx-auto mt-5 max-w-xl">
        <div class="mb-5">
            <label for="sum" class="mx-auto mt-5 max-w-xl">Sum:</label>
            <input v-model="form.sum" type="number" id="sum" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
            <DangerAlert v-if="form.errors.category" :message="form.errors.category" />
        </div>
        <div class="mb-5">
            <label for="description" class="mx-auto mt-5 max-w-xl">Description:</label>
            <input v-model="form.description" type="text" id="description" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
            <DangerAlert v-if="form.errors.category" :message="form.errors.category" />
        </div>
        <div class="mb-5">
            <label for="category" class="mx-auto mt-5 max-w-xl">Category:</label>
            <select v-model="form.category" id="category" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                <option value="income">Income</option>
                <option value="consumption">Consumption</option>
            </select>
            <DangerAlert v-if="form.errors.category" :message="form.errors.category" />
        </div>
        <button type="submit" :disabled="form.processing" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update transaction</button>
    </form>
</template>

<script>
import { Link, useForm, Head } from '@inertiajs/vue3'
import Layout from "../../Components/Layout.vue";
import DangerAlert from '../../Components/DangerAlert.vue';

export default {
    components: {
        Link,
        Head
    },
    props: {
        title: String,
        transaction: Object
    },
    layout: Layout,
    setup(props) {
        const form = useForm({
            sum: props.transaction.sum,
            description: props.transaction.description,
            category: props.transaction.category,
        })

        function update() {
            form.put(route('transactions.update', props.transaction))
        }

        return {form, update}
    },
}
</script>