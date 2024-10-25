<template>
    <h1>{{ title }}</h1>
    <form @submit.prevent="update">
        <div>
            <label for="sum">Sum:</label>
            <input v-model="form.sum" type="number" id="sum">
            <div v-if="form.errors.sum">
                {{ form.errors.sum }}
            </div>
        </div>
        <div>
            <label for="description">Description:</label>
            <input v-model="form.description" type="text" id="description">
            <div v-if="form.errors.description">
                {{ form.errors.description }}
            </div>
        </div>
        <div>
            <label for="category">Category:</label>
            <select v-model="form.category" id="Category">
                <option value="income">Income</option>
                <option value="consumption">Consumption</option>
            </select>
            <div v-if="form.errors.category">
                {{ form.errors.category }}
            </div>
        </div>
        <button type="submit">Update transaction</button>
    </form>
</template>

<script>
import { Link, useForm } from '@inertiajs/vue3'

export default {
    components: {
        Link,
    },
    props: {
        title: String,
        transaction: Object
    },
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