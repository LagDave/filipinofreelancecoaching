window.Vue = require("vue");
import VueRouter from "vue-router";
import Vuex from "Vuex";
import axios from "axios";

Vue.use(Vuex);
Vue.use(VueRouter);

const manage_courses_store = new Vuex.Store({
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
import manage_courses_router from "./utils/manage_courses_router.js";

const manage_courses = new Vue({
    el: "#manage_courses",
    store: manage_courses_store,
    router: manage_courses_router
});

// Reusables

// Vue.component(
//     "example-component",
//     require("./components/ExampleComponent.vue").default
// );
