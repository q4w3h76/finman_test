
<template>
    <h1>{{title}}</h1>
    <ul>
        <li v-for="transaction in transactions" :key="transaction.id" class="">
            <p>{{ transaction.description }}</p>
            <p>{{ transaction.sum }}</p>
            <p>{{ transaction.category }}</p>
            <p>{{ transaction.created_at }}</p>
            <Link :href="route('transactions.destroy', transaction)" method="delete" as="button">Delete</Link>
            <Link :href="route('transactions.edit', transaction)" method="get" as="button">Edit</Link>
        </li>
    </ul>
</template>

<script>
import { Link } from '@inertiajs/vue3'
export default {
    components: {
        Link,
    },
    props: {
        title: String,
        transactions: Array
    },
}
</script>