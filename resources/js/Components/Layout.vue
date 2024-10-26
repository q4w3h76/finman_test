<template>
    <Header/>
    <div class="container mx-auto mt-20">
        <slot/>
    </div>
</template>

<script>
import Header from "./Header.vue";

export default {
    components: {
        Header
    }
}
</script>