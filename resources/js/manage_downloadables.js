window.Vue = require("vue");
import VueRouter from "vue-router";
import Vuex from "Vuex";
Vue.use(VueRouter);

import manage_downloadables_store from "./utils/manage_downloadables_store.js";
import manage_downloadables_router from "./utils/manage_downloadables_router.js";

let manage_downloadables = new Vue({
    el: "#manage_downloadables",
    router: manage_downloadables_router,
    store: manage_downloadables_store
});
