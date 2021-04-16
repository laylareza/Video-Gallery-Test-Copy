<template>
    <b-card class="form-container">
        <div class="title">User Login</div>
        <b-form>
            <b-form-group>
                <b-form-row>
                    <b-form-input
                        id="username"
                        v-model="form.username"
                        type="text"
                        required
                        placeholder="Your username"
                    >
                    </b-form-input>
                </b-form-row>
                <b-form-row>
                    <b-form-checkbox
                        id="remember"
                        v-model="form.remember"
                        name="remember"
                        value="remember"
                        unchecked-value="donot_remember"
                    >
                    Remember Me
                    </b-form-checkbox>
                </b-form-row>
            </b-form-group>
            <b-button class="submit-btn" pill :disabled="(form.username.length < 3)" @click="login">Login</b-button>
        </b-form>
    </b-card>
</template>


<script>
    export default {
        name: 'LoginForm',
        data() {
            return {
                title: 'Login',
                currentUser: '',
                form: {
                username: '',
                remember: false,
                },
            };
        },
        mounted() {
            this.currentUser = this.$store.getters['loginStore/getCurrentUser'];
        },
        methods: {
            login() {
                fetch('http://localhost:8080/users')
                .then(response => response.json())
                .then(responseData => {
                    if (responseData.statusCode === 200) { 
                        var validUsers = [];
                        var i = 0;
                        for (var i in responseData.data) {
                            validUsers.push(responseData.data[i]['username']);
                        }

                        if (validUsers.includes(this.form.username)) {
                            this.$store.commit('login/setCurrentUsername', this.form.username);
                        } else {
                            alert("Sorry, that username is not found");
                        }
                    } else {
                        alert("no-user-found");
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
            }
        },
    };
</script>
<style>
    .form-container {
        width: 30%;
        height: 60%;
    }

    .form-container input {
        margin-bottom: 10px;
    }

    .form-container checkbox {
        background-color: none;
    }
    .title {
        font-size: 2em;
        color: #3b8070;
        margin: 40px 40px;
    }

    .submit-btn {
        background-color: #3b8070;
            width: 150px;
            color: white;
            margin: 40px 40px;
    }

    .checkbox :checked {
        color: #fff !important;
        background-color: #3b8070 !important;
        border-color: #3b8070 !important;
    }
</style>
