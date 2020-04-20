import VueRouter from "vue-router";
import ManageCoursesComponent from "../components/ManageCoursesComponent.vue";
import ManageTopicsComponent from "../components/ManageTopicsComponent.vue";
// Export
let manage_courses_router = new VueRouter({
    routes: [
        {
            path: "/",
            component: ManageCoursesComponent,
            name: "manage_courses"
        },
        {
            path: "/course/:id",
            component: ManageTopicsComponent,
            props: true,
            name: "manage_topics"
        }
    ]
});

export default manage_courses_router;
