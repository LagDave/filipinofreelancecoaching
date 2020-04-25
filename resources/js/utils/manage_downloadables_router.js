import VueRouter from "vue-router";
import ManageDownloadablesComponent from "../components/ManageDownloadablesComponent.vue";
// Export
let manage_downloadables_router = new VueRouter({
    routes: [
        {
            path: "/",
            component: ManageDownloadablesComponent,
            name: "manage_downloadables"
        }
    ]
});

export default manage_downloadables_router;
