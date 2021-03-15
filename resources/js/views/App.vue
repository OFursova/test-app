<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center my-2">Vue SPA with Sanctum Demo App</h1>
                <p>
                    <router-link :to="{ name: 'home' }">Home</router-link> |
                    <router-link :to="{ name: 'hello' }"
                        >Hello World</router-link
                    >
                    |
                    <router-link :to="{ name: 'books.index' }"
                        >Books</router-link
                    >
                </p>
            </div>
        </div>
        <div v-if="!loggedIn" class="row">
            <div class="col-12">
                <form action="#" @submit.prevent="handleLogin">
                    <div class="form-row">
                        <input type="email" v-model="formData.email" />
                    </div>
                    <div class="form-row">
                        <input type="password" v-model="formData.password" />
                    </div>
                    <div class="form-row">
                        <button type="submit">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
        <div v-else class="row">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            loggedIn: false,
            formData: {
                email: "",
                password: ""
            }
        };
    },
    methods: {
        handleLogin() {
            axios.get("/sanctum/csrf-cookie").then(response => {
                axios
                    .post("/login", this.formData)
                    .then(response => {
                        console.log("User signed in!");
                    })
                    .catch(error => console.log(error)); // credentials didn't match
            });
            this.loggedIn = true;
        }
    }
};
</script>
