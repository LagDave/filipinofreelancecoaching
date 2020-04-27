window.Vue = require("vue");
import VueRouter from "vue-router";
import Vuex from "Vuex";
Vue.use(VueRouter);

// Manage Users
import manage_users_store from "./utils/manage_users_store.js";
import manage_users_router from "./utils/manage_users_router.js";

let manage_users = new Vue({
    el: "#manage_users",
    router: manage_users_router,
    store: manage_users_store
});
