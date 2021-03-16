<template>
    <div class="books">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            <p>{{ error }}</p>

            <p>
                <button @click.prevent="fetchData">
                    Try Again
                </button>
            </p>
        </div>

        <ol v-if="books">
            <li v-for="{ title, author, genre } in books">
                <p><strong>Title:</strong> {{ title }}</p>
                <p><strong>Author:</strong> {{ author }}</p>
                <p><strong>Genre:</strong> {{ genre }}</p>
            </li>
        </ol>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            loading: false,
            books: null,
            error: null
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.error = this.books = null;
            this.loading = true;
            axios.get("/sanctum/csrf-cookie").then(response => {
                axios
                    .get("/api/book")
                    .then(response => {
                        console.log(response.data.data);
                        this.loading = false;
                        this.books = response.data.data;
                    })
                    .catch(error => {
                        this.loading = false;
                        this.error =
                            error.response.data.message || error.message;
                    });
            });
        }
    }
};
</script>
