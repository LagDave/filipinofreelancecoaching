import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);
import axios from "axios";

let manage_courses_store = new Vuex.Store({
    state: {
        isLoading: false
    },
    mutations: {
        FLIP_IS_LOADING(state) {
            state.isLoading = !state.isLoading;
        }
    },
    actions: {
        toggleLoading(context) {
            context.commit("FLIP_IS_LOADING");
        }
    }
});

export default manage_courses_store;
