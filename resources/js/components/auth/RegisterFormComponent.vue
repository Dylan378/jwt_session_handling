<template>
  <v-container class="justify-center">
    <v-card class="pa-8" max-width="500">
      <v-card-title class="text-center">
        <span class="headline">Register</span>
      </v-card-title>
      <v-form @submit.prevent="register" ref="form">
        <v-card-text>
          <v-text-field
            v-model="name"
            :error-messages="errors.name"
            label="Name"
            required
            autofocus
          ></v-text-field>
          <v-text-field
            v-model="email"
            :error-messages="errors.email"
            label="Email"
            required
          ></v-text-field>
          <v-text-field
            v-model="password"
            :error-messages="errors.password"
            label="Password"
            type="password"
            required
          ></v-text-field>
          <v-text-field
            v-model="password_confirmation"
            :error-messages="errors.password_confirmation"
            label="Confirm Password"
            type="password"
            required
          ></v-text-field>
          <v-alert
            v-if="registerError"
            type="error"
            dismissible
          >
            {{ registerError }}
          </v-alert>
        </v-card-text>
        <v-card-actions>
          <v-btn
            color="primary"
            type="submit"
            :loading="loading"
            :disabled="loading"
          >
            Register
          </v-btn>
        </v-card-actions>
      </v-form>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      errors: {},
      registerError: null,
      loading: false,
    };
  },
  methods: {
    async register() {
      this.errors = {};
      this.registerError = null;
      this.loading = true;

      try {
        const response = await fetch('/api/auth/register', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
          },
          body: JSON.stringify({
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirmation: this.password_confirmation,
          }),
        });

        const data = await response.json();
        if (!response.ok) {
          if (data.errors) {
            this.errors = data.errors;
            if (this.errors.email) {
              this.registerError = 'This email is already taken.';
              alert(this.registerError);
            }
          } else {
            this.registerError = data.error;
          }
        } else {
          localStorage.setItem('token', data.access_token);
          window.location.href = '/';
        }
      } catch (error) {
        console.error('Error:', error);
        this.registerError = 'An error occurred while trying to register.';
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>

