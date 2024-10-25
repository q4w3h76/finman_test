
<template>
    <h1>{{title}}</h1>
    <ul>
        <li v-for="transaction in transactions" :key="transaction.id" class="">
            <p>{{ transaction.description }}</p>
            <p>{{ transaction.sum }}</p>
            <p>{{ transaction.category }}</p>
            <p>{{ transaction.created_at }}</p>
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        title: String,
        transactions: Array
    },
}
</script>