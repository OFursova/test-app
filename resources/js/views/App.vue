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
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input
                            type="email"
                            v-model="formData.email"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Enter email"
                        />
                        <small id="emailHelp" class="form-text text-muted"
                            >We'll never share your email with anyone
                            else.</small
                        >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input
                            type="password"
                            v-model="formData.password"
                            class="form-control"
                            id="exampleInputPassword1"
                            placeholder="Password"
                        />
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
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
import Http from "../Http";
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
                Http.post("/login", this.formData)
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
