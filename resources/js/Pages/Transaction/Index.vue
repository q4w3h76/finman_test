<template>
    <Head :title="title"/>
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-balance text-4xl font-semibold tracking-tight text-gray-900">{{ title }}</h1>
    </div>
    <div class="flex mx-auto max-w-2xl text-center justify-evenly mt-5">
        <h2 class="text-balance text-xl font-semibold tracking-tight text-gray-900">Income: {{ sumByCategory['income'] ?? 0 }}</h2>
        <h2 class="text-balance text-xl font-semibold tracking-tight text-gray-900">Expense: {{ sumByCategory['expense'] ?? 0 }}</h2>
    </div>
    <div class="my-5 flex-col mx-auto items-center">
        <h3 class="text-balance text-lg font-semibold tracking-tight text-gray-900" >Filter by date:</h3>
        <div class="flex-col mt-3">
            <div class="flex gap-x-2 items-center mb-3">
                <label for="start_date" class="font-medium">Start:</label>
                <input v-model="filters_date.start_date" type="date" id="start_date" class="block rounded-md border-0 p-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"/>
            </div>
            <div class="flex gap-x-2 items-center mb-3">
                <label for="end_date" class="font-medium">End:</label>
                <input v-model="filters_date.end_date" type="date" id="end_date" class="block rounded-md border-0 p-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"/>
            </div>
        </div>
        <Link :href="route('transactions.index')" method="get" :data="filters_date" as="button" class="block rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Filter</Link>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Sum
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="transaction in transactions.data" :key="transaction.id" class="odd:bg-white even:bg-gray-50 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ transaction.description }}
                </th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ transaction.sum }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ transaction.category }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ transaction.created_at }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-x-3">
                        <Link :href="route('transactions.edit', transaction)" method="get" as="button" class="font-medium text-blue-600 dark:text-indigo-500 hover:underline">Edit</Link>
                        <Link :href="route('transactions.destroy', transaction)" method="delete" as="button" class="font-medium text-blue-600 dark:text-indigo-500 hover:underline">Delete</Link>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { Link, Head } from '@inertiajs/vue3'
import Layout from "../../Components/Layout.vue";

export default {
    components: {
        Link,
        Layout,
        Head,
    },
    layout: Layout,
    props: {
        title: String,
        transactions: Object,
        sumByCategory: Object,
        filters: Object
    },
    data(props) {
        return {
            filters_date: {
                start_date: props.filters.start_date ?? props.transactions.data[props.transactions.data.length-1]?.created_at ?? '',
                end_date: props.filters.end_date ?? props.transactions.data[0]?.created_at ?? '',
            }
        }
    }
}
</script>