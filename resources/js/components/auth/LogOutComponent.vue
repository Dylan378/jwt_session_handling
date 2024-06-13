<template>
  <div v-if="isLoggedIn">
    <a :href="url">
      <slot></slot>
    </a>
    <v-btn @click="logout" :loading="loading" color="primary">
      <v-icon left>mdi-logout</v-icon>
      Log Out
    </v-btn>
  </div>
</template>

<script>
export default {
  
    props: {
        url: {
            type: String,
            required: true
        }
    },

  data() {
    return {
      loading: false,
      isLoggedIn: false,
    };
  },
  mounted() {
    this.checkIfLoggedIn();
  },
  methods: {
    checkIfLoggedIn() {
      const token = localStorage.getItem('token');
      this.isLoggedIn = !!token;
    },
    async logout() {
      this.loading = true;
      try {
        const response = await fetch('/api/auth/logout', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
          },
        });

        if (!response.ok) {
          throw new Error('Failed to log out.');
        }

        localStorage.removeItem('token');
        window.location.href = '/login';
      } catch (error) {
        console.error('Error:', error);
        this.$emit('error', 'An error occurred while trying to log out.');
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>

<style scoped>
.v-btn {
  margin: 0.5rem;
}
</style>
