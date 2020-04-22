import VueRouter from "vue-router";
import ManageUsersComponent from "../components/ManageUsersComponent.vue";
// Export
let manage_users_router = new VueRouter({
    routes: [
        {
            path: "/",
            component: ManageUsersComponent,
            name: "manage_users"
        }
    ]
});

export default manage_users_router;
