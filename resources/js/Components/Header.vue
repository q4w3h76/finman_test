<template>
  <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="#" class="-m-1.5 p-1.5">
        <span class="sr-only">FinMan</span>
        <img class="h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="">
      </a>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
      <Link :href="route('transactions.create')" class="text-lg font-semibold leading-6 text-gray-900 hover:text-indigo-700" >Create</Link>
      <Link :href="route('transactions.index')" class="text-lg font-semibold leading-6 text-gray-900 hover:text-indigo-700" >Transactions</Link>
    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
      <div v-if="false">
          <Link :href="route('auth.logout')" method="post" as="button" class="text-lg font-semibold leading-6 text-gray-900 hover:text-red-700" >Logout</Link> 
      </div>
      <div v-else class="flex gap-x-3">
          <Link :href="route('auth.login.index')" class="text-lg font-semibold leading-6 text-gray-900 hover:text-indigo-700" >Login</Link>
          <Link :href="route('register.index')" class="text-lg font-semibold leading-6 text-gray-900 hover:text-indigo-700" >Register</Link> 
      </div>
    </div>
  </nav>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link
    }
}
</script>