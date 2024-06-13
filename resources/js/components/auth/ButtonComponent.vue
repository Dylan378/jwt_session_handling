<template>
    <a :href="url">
        <slot></slot>
    </a>
</template>

<script>
export default {
    props: {
        url: {
            type: String,
            required: true
        }
    }
}
</script>
