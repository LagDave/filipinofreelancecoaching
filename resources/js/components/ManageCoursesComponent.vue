<template>
    <div class="add_course">
        <loader></loader>
        <div class="container-fluid">
            <transition name="fade">
                <div
                    v-if="notif"
                    class="alert alert-success sticky-top shadow-sm"
                    role="alert"
                    style="top:90px"
                >
                    {{ notifMessage }}
                </div>
            </transition>
            <div class="card">
                <div class="card-header">
                    <h4>Manage Courses</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <h5><b>Add Course Entry</b></h5>
                            <hr />
                            <form @submit.prevent="submitForm" class="form">
                                <div class="form-group">
                                    <label>Course Title</label>
                                    <input
                                        required
                                        v-model="title"
                                        type="text"
                                        class="form-control"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="mb-0"
                                        >Course Cover Photo</label
                                    >
                                    <p class="mt-0">
                                        <a
                                            data-toggle="tooltip"
                                            data-placement="right"
                                            title='Click this link and upload your image. Then, paste the "direct link" below.'
                                            href="https://postimg.cc/"
                                            target="_blank"
                                            ><small class="text-muted"
                                                >Need Help?</small
                                            ></a
                                        >
                                    </p>
                                    <input
                                        required
                                        v-model="cover_img"
                                        type="text"
                                        class="form-control"
                                    />
                                </div>
                                <div class="form-group">
                                    <label>Course Description</label>

                                    <editor
                                        v-model="description"
                                        apiKey="w4aeovv2b7u52tut4ybdy0wh7y4849ptxv96adba15uk63d4"
                                        :init="{
                                            height: 500,
                                            menubar: false,
                                            plugins: [
                                                'advlist autolink lists link image charmap',
                                                'searchreplace visualblocks code fullscreen',
                                                'print preview anchor insertdatetime media',
                                                'paste code help wordcount table'
                                            ],
                                            toolbar:
                                                'undo redo | formatselect | bold italic | \
                                        alignleft aligncenter alignright | \
                                        bullist numlist outdent indent | help'
                                        }"
                                    />
                                    <transition name="fade">
                                        <p
                                            class="text-danger mt-3"
                                            v-if="description_blank"
                                        >
                                            <strong>
                                                <i
                                                    class="icofont-exclamation-circle"
                                                ></i>
                                                Course description should not be
                                                blank
                                            </strong>
                                        </p>
                                    </transition>
                                </div>
                                <div class="btn-group w-100">
                                    <button class="btn btn-primary w-100">
                                        <span v-if="editFlag == false"
                                            >Add Course</span
                                        >
                                        <span v-if="editFlag"
                                            >Update Course</span
                                        >
                                    </button>
                                    <button
                                        @click="clearEdit"
                                        v-if="editFlag"
                                        class="btn btn-secondary w-100"
                                    >
                                        Clear
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <h5><b>Courses</b></h5>
                            <hr />
                            <div class="courses">
                                <transition-group name="fade">
                                    <div
                                        :key="course.id"
                                        v-for="course in courses"
                                        :class="{
                                            'mb-2': true,
                                            'course-entry': true,
                                            published:
                                                course.published == 'true'
                                        }"
                                    >
                                        <div style="width:100%;" class="row">
                                            <div class="col-9">
                                                <p class="mb-0">
                                                    <router-link
                                                        :to="{
                                                            name:
                                                                'manage_topics',
                                                            params: {
                                                                id: course.id
                                                            }
                                                        }"
                                                    >
                                                        {{ course.title }}
                                                    </router-link>
                                                </p>
                                                <small class="text-muted"
                                                    >Published by:
                                                    {{ course.publisher }} @
                                                    {{
                                                        course.created_at
                                                    }}</small
                                                >
                                            </div>
                                            <div class="col-3 px-0">
                                                <div class="btn-group">
                                                    <button
                                                        @click="
                                                            deleteCourse(
                                                                course.id,
                                                                course.title
                                                            )
                                                        "
                                                        class="btn btn-danger "
                                                    >
                                                        <i
                                                            class="icofont-trash"
                                                        ></i>
                                                    </button>
                                                    <button
                                                        @click="
                                                            editCourse(
                                                                course.id
                                                            )
                                                        "
                                                        class="btn btn-primary "
                                                    >
                                                        <i
                                                            class="icofont-pencil-alt-2"
                                                        ></i>
                                                    </button>
                                                </div>
                                                <button
                                                    v-if="
                                                        course.published ==
                                                            'false'
                                                    "
                                                    @click="
                                                        togglePublishedState(
                                                            course.id,
                                                            course.published
                                                        )
                                                    "
                                                    class="btn btn-success"
                                                    data-toggle="tooltip"
                                                    data-placement="left"
                                                >
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button
                                                    v-if="
                                                        course.published ==
                                                            'true'
                                                    "
                                                    @click="
                                                        togglePublishedState(
                                                            course.id,
                                                            course.published
                                                        )
                                                    "
                                                    class="btn btn-secondary"
                                                    data-toggle="tooltip"
                                                    data-placement="left"
                                                >
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </transition-group>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.courses {
    max-height: 780px;
    width: 100%;
    overflow-y: auto;
}
.course-entry {
    background: #d3d3d336;
    padding: 10px;
    transition: 0.1s;
}

.course-entry:hover {
    background: #d3d3d386;
}
.published {
    background: #e60c3f25;
}
.published:hover {
    background: #e60c3f3d;
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>

<script>
import Editor from "@tinymce/tinymce-vue";
import Loader from "./Loader.vue";
import axios from "axios";
import { mapActions } from "vuex";

export default {
    data() {
        return {
            title: "",
            description: "",
            description_blank: false,
            cover_img: "",
            courses: [],
            editFlag: false,
            editId: 0,
            notif: false,
            notifMessage: ""
        };
    },
    components: {
        editor: Editor,
        loader: Loader
    },
    methods: {
        submitForm() {
            if (this.description !== "") {
                if (this.editFlag == true) {
                    this.toggleLoading();
                    axios
                        .post(`/admin/manage/courses/${this.editId}/update`, {
                            title: this.title,
                            description: this.description,
                            cover_img: this.cover_img
                        })
                        .then(response => {
                            this.getCourses();
                            this.title = "";
                            this.description = "";
                            this.cover_img = "";
                            this.toggleLoading();
                            this.flashNotif("Course updated successfully!");
                        })
                        .catch(err => {
                            console.log(err);
                            this.toggleLoading();
                        });
                } else {
                    this.toggleLoading();
                    axios
                        .post("/admin/manage/courses/store", {
                            title: this.title,
                            description: this.description,
                            cover_img: this.cover_img,
                            published: "false"
                        })
                        .then(data => {
                            this.getCourses();
                            this.title = "";
                            this.description = "";
                            this.cover_img = "";
                            this.toggleLoading();
                            this.flashNotif("Course created successfully!");
                        })
                        .catch(err => {
                            console.log(err);
                            this.toggleLoading();
                        });
                }
            } else {
                this.description_blank = true;
                setTimeout(() => {
                    this.description_blank = false;
                }, 5000);
            }
        },
        togglePublishedState(id, publishState) {
            if (publishState == "true") {
                if (
                    confirm(
                        "Note:\n Unpublishing course will reset all its users' progress."
                    )
                ) {
                    this.toggleLoading();
                    axios
                        .post(
                            `/admin/manage/courses/${id}/togglePublishedState`
                        )
                        .then(response => {
                            console.log(response);
                            this.getCourses();
                            this.toggleLoading();
                        })
                        .catch(err => {
                            console.log(err);
                            this.toggleLoading();
                        });
                }
            } else {
                if (
                    confirm(
                        "Note:\n Only publish when the course structure is final. \n Publish the course now?"
                    )
                ) {
                    this.toggleLoading();
                    axios
                        .post(
                            `/admin/manage/courses/${id}/togglePublishedState`
                        )
                        .then(response => {
                            console.log(response);
                            this.getCourses();
                            this.toggleLoading();
                        })
                        .catch(err => {
                            console.log(err);
                            this.toggleLoading();
                        });
                }
            }
        },
        getCourses() {
            this.toggleLoading();
            axios("/admin/manage/courses/get")
                .then(response => {
                    this.courses = response.data;
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                    this.toggleLoading();
                });
        },
        deleteCourse(id, title) {
            if (
                window.confirm(
                    `The course: "${title}" and its curriculum will be destroyed.`
                )
            ) {
                this.toggleLoading();
                axios
                    .post(`/admin/manage/courses/${id}/delete`)
                    .then(response => {
                        this.getCourses();
                        this.toggleLoading();
                        this.flashNotif("Course deleted successfully!");
                    })
                    .catch(err => {
                        console.log(err);
                        this.toggleLoading();
                    });
            }
        },
        editCourse(id) {
            this.toggleLoading();
            axios(`/admin/manage/courses/${id}/pick`)
                .then(response => {
                    let data = response.data;
                    this.editFlag = true;
                    this.editId = data.id;
                    this.title = data.title;
                    this.cover_img = data.cover_img;
                    this.description = data.description;
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                    this.toggleLoading();
                });
        },
        clearEdit() {
            this.toggleLoading();
            this.editFlag = false;
            this.editId = 0;
            this.title = "";
            this.cover_img = "";
            this.description = "";
            this.toggleLoading();
        },
        flashNotif(message) {
            this.notif = true;
            this.notifMessage = message;
            setTimeout(() => {
                this.notif = false;
            }, 5000);
        },
        ...mapActions(["toggleLoading"])
    },
    created() {
        this.getCourses();
    }
};
</script>
