<template>
    <div class="profile">
      <h1>Profile</h1>
      <div v-if="user">
        <p>Name: {{ user.name }}</p>
        <p>Email: {{ user.email }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        user: null,
      };
    },
    mounted() {
      this.fetchProfile();
    },
    methods: {
      async fetchProfile() {
        try {
          const response = await fetch('/api/me', {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': `Bearer ${localStorage.getItem('token')}`,
            },
          });
  
          if (!response.ok) {
            throw new Error('Failed to fetch profile.');
          }
  
          this.user = await response.json();
        } catch (error) {
          console.error('Error:', error);
          // Handle error, e.g., show error message to user
        }
      },
    },
  };
  </script>
  
  <style>
  .profile {
    margin: 20px;
  }
  </style>
  