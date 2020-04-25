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
import manage_users_store from "./utils/manage_users_store.js";
import manage_users_router from "./utils/manage_users_router.js";

let manage_users = new Vue({
    el: "#manage_users",
    router: manage_users_router,
    store: manage_users_store
});

import manage_downloadables_store from "./utils/manage_downloadables_store.js";
import manage_downloadables_router from "./utils/manage_downloadables_router.js";

let manage_downloadables = new Vue({
    el: "#manage_downloadables",
    router: manage_downloadables_router,
    store: manage_downloadables_store
});
