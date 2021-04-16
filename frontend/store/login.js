import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default({
    state: {
        currentUsername:''
    },
    mutations: {
        setCurrentUsername(state, username) {
            state.currentUsername = username;
            this.$router.push({
                path: '/videos',
            });
        }
    },
    getters: {
        getCurrentUsername(state) {
            return state.currentUsername;
        } 
    }
});