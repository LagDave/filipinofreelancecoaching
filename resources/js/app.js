window.Vue = require("vue");
import VueRouter from "vue-router";
import Vuex from "Vuex";
Vue.use(VueRouter);

// Manage Courses
import manage_courses_router from "./utils/manage_courses_router.js";
import manage_courses_store from "./utils/manage_courses_store.js";

let manage_courses = new Vue({
    el: "#manage_courses",
    store: manage_courses_store,
    router: manage_courses_router
});

// Manage Users
let manage_users = new Vue({
    el: "#manage_users"
});
