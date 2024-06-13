<template>
  <v-container class="justify-center">
    <v-card class="pa-8" max-width="500">
      <v-card-title class="text-center">
        <span class="headline">Login</span>
      </v-card-title>
      <v-form @submit.prevent="login" ref="form">
        <v-card-text>
          <v-text-field
            v-model="email"
            :error-messages="errors.email"
            label="Email"
            type="email"
            required
            autofocus
          ></v-text-field>
          <v-text-field
            v-model="password"
            :error-messages="errors.password"
            label="Password"
            type="password"
            required
          ></v-text-field>
          <v-checkbox
            v-model="remember"
            label="Remember Me"
          ></v-checkbox>
          <v-alert
            v-if="loginError"
            type="error"
            dismissible
          >
            {{ loginError }}
          </v-alert>
        </v-card-text>
        <v-card-actions class="d-flex justify-between">
          <v-btn
            color="primary"
            type="submit"
          >
            Login
          </v-btn>
          <v-btn
            text
            color="primary"
            @click="forgotPassword"
          >
            Forgot Password?
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
        email: '',
        password: '',
        remember: false,
        errors: {},
        loginError: null
      };
    },
    methods: {
      async login() {
        this.errors = {};
        this.loginError = null;
        try {
          const response = await fetch('/api/auth/login', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json'
            },
            body: JSON.stringify({
              email: this.email,
              password: this.password,
              remember: this.remember
            })
          });
          const data = await response.json();
          if (!response.ok) {
            if (data.error) {
              this.loginError = data.error;
            } else {
              this.errors = data.errors || {};
            }
          } else {
            localStorage.setItem('token', data.access_token);
            window.location.href = '/';
            alert('Login successful');
          }
        } catch (error) {
          console.error('Error:', error);
          this.loginError = 'An error occurred while trying to login.';
        }
      }
    }
  };
</script>
