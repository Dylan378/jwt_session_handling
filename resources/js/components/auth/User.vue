// resources/js/components/UserInfo.vue
<template>
    <div v-if="user">
        {{ user.name }}
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null
        };
    },
    async created() {
        try {
            const response = await axios.get('/api/user');
            this.user = response.data;
        } catch (error) {
            console.error('Error fetching user data:', error);
        }
    }
}
</script>
