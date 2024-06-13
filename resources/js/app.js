import "./bootstrap";
import { createApp } from "vue";
import vuetify from "./vuetify";

import ButtonComponent from "./components/auth/ButtonComponent.vue";
import LoginFormComponent from "./components/auth/LoginFormComponent.vue";
import RegisterFormComponent from "./components/auth/RegisterFormComponent.vue";
import LogoutComponent from "./components/auth/LogOutComponent.vue";
import User from "./components/auth/User.vue";
import ProfileComponent from "./components/auth/ProfileComponent.vue";


const app = createApp({
    components: {
        ButtonComponent,
        LoginFormComponent,
        RegisterFormComponent,
        LogoutComponent,
        User,
        ProfileComponent,
    }
});
app.use(vuetify);

const token = localStorage.getItem('token');
if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

app.config.globalProperties.$axios = axios;

app.mount("#app");