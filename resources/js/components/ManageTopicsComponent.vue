<template>
    <div>
        <loader></loader>
        <div class="container-fluid">
            <div class="card">
                <div class=" card-header">
                    <h4>
                        <router-link
                            style="color:white !important; text-decoration:none"
                            :to="{ name: 'manage_courses' }"
                            ><i class="icofont-arrow-left"></i>
                            {{ page_title }}</router-link
                        >
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <h5><b>Add Main Topic</b></h5>
                            <hr />
                            <form @submit.prevent="saveTopic" class="form">
                                <div class="form-group">
                                    <label>Topic Name</label
                                    ><span
                                        data-toggle="tooltip"
                                        data-placement="right"
                                        title="Always start the name with a number followed by a '.' (dot) for sorting topic items."
                                        class="ml-1 text-primary"
                                        style="font-size:1.3em"
                                    >
                                        <i class="icofont-question-circle"></i
                                    ></span>
                                    <input
                                        required
                                        v-model="topic_name"
                                        class="form-control"
                                    />
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-primary">
                                        <span v-if="editTopicFlag == true">
                                            Update Topic
                                        </span>
                                        <span v-if="editTopicFlag == false">
                                            Save Topic
                                        </span>
                                    </button>
                                    <button
                                        v-if="editTopicFlag == true"
                                        @click="clearEditTopic"
                                        class="btn btn-secondary"
                                    >
                                        Clear
                                    </button>
                                </div>
                            </form>
                            <h5 class="mt-5"><b>Add Lesson</b></h5>
                            <hr />
                            <form @submit.prevent="saveLesson" class="form">
                                <div class="form-group">
                                    <label>Lesson Name</label
                                    ><span
                                        data-toggle="tooltip"
                                        data-placement="right"
                                        title="Always start the name with a number followed by a '.' (dot) for sorting lesson items."
                                        class="ml-1 text-primary"
                                        style="font-size:1.3em"
                                    >
                                        <i class="icofont-question-circle"></i
                                    ></span>
                                    <input
                                        v-model="lesson_name"
                                        required
                                        type="text"
                                        class="form-control"
                                    />
                                </div>
                                <div class="form-group">
                                    <label>Topic</label>
                                    <select
                                        required
                                        v-model="lesson_topic"
                                        class="custom-select"
                                    >
                                        <option
                                            v-for="topic in topics"
                                            :key="topic.id"
                                            v-bind:value="topic.id"
                                            >{{ topic.name }}</option
                                        >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Embed Video URL</label>
                                    <textarea
                                        v-model="vimeo_link"
                                        required
                                        type="text"
                                        class="form-control"
                                    >
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Duration</label>
                                    <br />
                                    <input
                                        type="text"
                                        v-model="duration"
                                        class="form-control"
                                        required
                                    />
                                </div>
                                <div class="btn-group">
                                    <button
                                        type="submit"
                                        class="btn-primary btn"
                                    >
                                        <span v-if="editLessonFlag == false"
                                            >Save Lesson</span
                                        >
                                        <span v-if="editLessonFlag == true"
                                            >Update Lesson</span
                                        >
                                    </button>
                                    <button
                                        v-if="editLessonFlag == true"
                                        class="btn btn-secondary"
                                        @click="clearLessonEdit"
                                    >
                                        Clear
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <h5><b>Curriculum Hierarchy</b></h5>
                            <hr />
                            <div class="curriculum-hierarchy">
                                <transition-group name="fade">
                                    <div
                                        v-for="topic in topics"
                                        :key="topic.id"
                                        class="main-topic mb-4"
                                    >
                                        <div class="topic-container">
                                            <div style="width:100%" class="row">
                                                <div class="col-9">
                                                    <p>
                                                        <b>{{ topic.name }}</b>
                                                    </p>
                                                    <small class="text-muted"
                                                        >Published by
                                                        {{ topic.publisher }} @
                                                        {{
                                                            topic.created_at
                                                        }}</small
                                                    >
                                                </div>
                                                <div class="col-3">
                                                    <div class="btn-group">
                                                        <button
                                                            @click="
                                                                deleteTopic(
                                                                    topic.id
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
                                                                editTopic(
                                                                    topic.id
                                                                )
                                                            "
                                                            class="btn btn-primary "
                                                        >
                                                            <i
                                                                class="icofont-pencil-alt-2"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lessons-container pt-2">
                                            <transition-group name="fade">
                                                <div
                                                    class="lesson mb-2"
                                                    v-for="lesson in topic.lessons"
                                                    :key="lesson.id"
                                                >
                                                    <div
                                                        style="width:100%"
                                                        class="row"
                                                    >
                                                        <div
                                                            class="col-2 mx-0 px-0"
                                                        >
                                                            <span
                                                                class="lesson-duration shadow-sm"
                                                                >{{
                                                                    lesson.duration
                                                                }}</span
                                                            >
                                                            <br />
                                                        </div>
                                                        <div class="pl-0 col-6">
                                                            <p>
                                                                {{
                                                                    lesson.name
                                                                }}
                                                            </p>
                                                        </div>
                                                        <div class="col-3">
                                                            <div
                                                                class="btn-group"
                                                            >
                                                                <button
                                                                    class="btn btn-sm btn-outline-secondary "
                                                                    @click="
                                                                        deleteLesson(
                                                                            lesson.id
                                                                        )
                                                                    "
                                                                >
                                                                    <i
                                                                        class="icofont-trash"
                                                                    ></i>
                                                                </button>
                                                                <button
                                                                    @click="
                                                                        editLesson(
                                                                            lesson.id
                                                                        )
                                                                    "
                                                                    class="btn btn-sm btn-outline-secondary "
                                                                >
                                                                    <i
                                                                        class="icofont-pencil-alt-2"
                                                                    ></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </transition-group>
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

<style lang="scss" scoped>
.lesson-duration {
    margin-right: 10px;
    padding: 3px 8px;
    color: white;
    min-width: 50px !important;
    background: #e60c3e;
}
.lessons-container {
    padding-left: 30px;
    border-left: 1px solid #e60c3e;
}
.lesson {
    background: #f5f5f5;
    color: #777;
    padding: 10px;
}
.topic-container {
    background: #ececec;
    padding: 20px;
    border-left: 5px solid #e60c3e;
}
.topic-container p {
    margin-bottom: 0;
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
.curriculum-hierarchy {
    max-height: 780px;
    width: 100%;
    overflow-y: auto;
}
</style>
<script>
import axios from "axios";
import Loader from "./Loader.vue";

import { mapActions } from "vuex";
export default {
    data() {
        return {
            page_title: "",
            // Topics
            topics: [],
            topic_name: "",
            editTopicFlag: false,
            editTopicId: "",
            // Lessons
            lesson_name: "",
            lesson_topic: "",
            vimeo_link: "",
            duration: "",
            editLessonFlag: false,
            editLessonId: ""
        };
    },
    props: ["id"],
    components: { Loader },
    methods: {
        ...mapActions(["toggleLoading"]),
        gatherCourseData() {
            this.toggleLoading();
            axios(`/admin/manage/courses/${this.id}/pick`)
                .then(response => {
                    this.page_title = response.data.title;
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                    this.toggleLoading();
                });
        },
        gatherTopicsAndLessons() {
            this.toggleLoading();
            axios(`/admin/manage/courses/${this.id}/topics/get`)
                .then(response => {
                    this.topics = response.data;
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                    this.toggleLoading();
                });
        },
        saveTopic() {
            if (this.editTopicFlag == true) {
                this.toggleLoading();
                axios
                    .post(
                        `/admin/manage/courses/topics/${this.editTopicId}/update`,
                        {
                            name: this.topic_name
                        }
                    )
                    .then(response => {
                        console.log(response);
                        this.clearEditTopic();
                        this.gatherTopicsAndLessons();
                        this.toggleLoading();
                    })
                    .catch(err => {
                        console.log(err);
                        this.clearEditTopic();
                        this.gatherTopicsAndLessons();
                        this.toggleLoading();
                    });
            } else {
                this.toggleLoading();
                axios
                    .post(`/admin/manage/courses/${this.id}/topics`, {
                        name: this.topic_name,
                        course_id: this.id
                    })
                    .then(response => {
                        this.topic_name = "";
                        this.toggleLoading();
                        this.gatherTopicsAndLessons();
                    })
                    .catch(err => {
                        console.log(err);
                        this.toggleLoading();
                    });
            }
        },
        deleteTopic(id) {
            if (confirm("This topic and all of its lessons will be deleted.")) {
                this.toggleLoading();
                axios
                    .post(`/admin/manage/courses/topics/${id}/delete`)
                    .then(response => {
                        console.log(response.data);
                        this.toggleLoading();
                        this.gatherTopicsAndLessons();
                    })
                    .catch(err => {
                        console.log(err);
                        this.toggleLoading();
                    });
            }
        },
        editTopic(id) {
            this.toggleLoading();
            this.editTopicFlag = true;
            this.editTopicId = id;

            axios(`/admin/manage/courses/topics/${id}/pick`)
                .then(response => {
                    this.topic_name = response.data.name;
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                    this.toggleLoading();
                });
        },
        clearEditTopic() {
            this.editTopicFlag = false;
            this.editTopicId = "";
            this.topic_name = "";
            this.duration = "";
        },
        saveLesson() {
            if (this.editLessonFlag == true) {
                this.toggleLoading();
                axios
                    .post(
                        `/admin/manage/courses/topics/lessons/${this.editLessonId}/update`,
                        {
                            name: this.lesson_name,
                            topic_id: this.lesson_topic,
                            vimeo_link: this.vimeo_link,
                            duration: this.duration
                        }
                    )
                    .then(response => {
                        this.lesson_name = "";
                        this.lesson_topic = "";
                        this.vimeo_link = "";
                        this.duration = "";
                        this.clearLessonEdit();
                        this.gatherTopicsAndLessons();
                        this.toggleLoading();
                    })
                    .catch(err => {
                        console.log(err);
                        this.toggleLoading();
                    });
            } else {
                this.toggleLoading();
                axios
                    .post(`/admin/manage/courses/topics/lessons/store`, {
                        name: this.lesson_name,
                        topic_id: this.lesson_topic,
                        vimeo_link: this.vimeo_link,
                        duration: this.duration
                    })
                    .then(response => {
                        this.lesson_name = "";
                        this.lesson_topic = "";
                        this.vimeo_link = "";
                        this.duration = "";
                        this.gatherTopicsAndLessons();
                        this.toggleLoading();
                    })
                    .catch(err => {
                        console.log(err);
                        this.toggleLoading();
                    });
            }
        },
        deleteLesson(id) {
            if (confirm("This lesson will be deleted.")) {
                this.toggleLoading();
                axios
                    .post(`/admin/manage/courses/topics/lessons/${id}/delete`)
                    .then(response => {
                        console.log(response);
                        this.gatherTopicsAndLessons();
                        this.toggleLoading();
                    })
                    .catch(err => {
                        console.log;
                        this.toggleLoading();
                    });
            }
        },
        editLesson(id) {
            this.toggleLoading();
            this.editLessonFlag = true;
            this.editLessonId = id;

            axios(`/admin/manage/courses/topics/lessons/${id}/pick`)
                .then(response => {
                    this.lesson_name = response.data.name;
                    this.lesson_topic = response.data.topic_id;
                    this.vimeo_link = response.data.vimeo_link;
                    this.duration = response.data.duration;
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                    this.toggleLoading();
                });
        },
        clearLessonEdit() {
            this.editLessonFlag = false;
            this.editLessonId = "";
        }
    },
    created() {
        this.gatherCourseData();
        this.gatherTopicsAndLessons();
    }
};
</script>
