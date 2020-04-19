import VueRouter from "vue-router";
import ManageCoursesComponent from "../components/ManageCoursesComponent.vue";

// Export
let manage_courses_router = new VueRouter({
    routes: [
        { path: "/", component: ManageCoursesComponent, name: "add_course" }
    ]
});

export default manage_courses_router;
