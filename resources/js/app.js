window.Vue = require("vue");
import VueRouter from "vue-router";
import Vuex from "Vuex";
Vue.use(VueRouter);

import manage_courses_router from "./utils/manage_courses_router.js";
import manage_courses_store from "./utils/manage_courses_store.js";

const manage_courses = new Vue({
    el: "#manage_courses",
    store: manage_courses_store,
    router: manage_courses_router
});
