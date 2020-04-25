<template>
    <div>
        <loader></loader>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3>Downloadables</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5><b>Add Downloadables Entry</b></h5>
                            <hr />
                            <form
                                @submit.prevent="saveDownloadable"
                                class="form"
                            >
                                <div class="form-group">
                                    <label>Entry Name</label>
                                    <input
                                        v-model="name"
                                        type="text"
                                        class="form-control"
                                        required
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="mb-0"
                                        >Entry Cover Photo</label
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
                                        v-model="cover_img"
                                        required
                                        type="text"
                                        class="form-control"
                                    />
                                </div>
                                <div class="form-group">
                                    <label>Entry Type</label>
                                    <select
                                        required
                                        v-model="type"
                                        class="form-control"
                                    >
                                        <option value="ebook">Ebook</option>
                                        <option value="software_or_tool"
                                            >Software or Tool</option
                                        >
                                        <option value="template"
                                            >Template</option
                                        >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Entry Description</label>
                                    <editor
                                        v-model="description"
                                        apiKey="sgnir4z2npzar92coa1b95977socito44qv5y6qa4ebsitla"
                                        :init="{
                                            height: 300,
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
                                </div>
                                <button class="btn btn-primary w-100">
                                    Save Downloadable
                                </button>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <h5><b>Downloadables</b></h5>
                            <hr />
                            <div class="downloadables-container">
                                <transition-group name="fade">
                                    <div
                                        v-for="downloadable in downloadables"
                                        :key="downloadable.id"
                                    >
                                        <div
                                            class="alert alert-info"
                                            v-if="downloadable.type == 'ebook'"
                                        >
                                            <div class="row">
                                                <div class="col-9">
                                                    <b>{{
                                                        downloadable.name
                                                    }}</b
                                                    ><small
                                                        >@{{
                                                            downloadable.publisher
                                                        }}</small
                                                    >
                                                </div>
                                                <div class="col-3">
                                                    <div class="btn-group">
                                                        <button
                                                            class="btn btn-primary"
                                                            @click="
                                                                deleteDownloadable(
                                                                    downloadable.id
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fas fa-trash"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="alert alert-success"
                                            v-if="
                                                downloadable.type == 'template'
                                            "
                                        >
                                            <div class="row">
                                                <div class="col-9">
                                                    <b>{{
                                                        downloadable.name
                                                    }}</b
                                                    ><small
                                                        >@{{
                                                            downloadable.publisher
                                                        }}</small
                                                    >
                                                </div>
                                                <div class="col-3">
                                                    <div class="btn-group">
                                                        <button
                                                            class="btn btn-primary"
                                                            @click="
                                                                deleteDownloadable(
                                                                    downloadable.id
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fas fa-trash"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="alert alert-primary"
                                            v-if="
                                                downloadable.type ==
                                                    'software_or_tool'
                                            "
                                        >
                                            <div class="row">
                                                <div class="col-9">
                                                    <b>{{
                                                        downloadable.name
                                                    }}</b
                                                    ><small
                                                        >@{{
                                                            downloadable.publisher
                                                        }}</small
                                                    >
                                                </div>
                                                <div class="col-3">
                                                    <div class="btn-group">
                                                        <button
                                                            class="btn btn-primary"
                                                            @click="
                                                                deleteDownloadable(
                                                                    downloadable.id
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fas fa-trash"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
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
.downloadables-container {
    max-height: 700px;
    overflow: auto;
}
</style>

<script>
import Editor from "@tinymce/tinymce-vue";
import Loader from "./Loader.vue";
import { mapActions } from "vuex";
import axios from "axios";

export default {
    components: {
        editor: Editor,
        Loader
    },
    data() {
        return {
            name: "",
            cover_img: "",
            type: "",
            description: "",
            downloadables: []
        };
    },
    methods: {
        ...mapActions(["toggleLoading"]),
        getAllDownloadables() {
            axios("/admin/manage/downloadables/get")
                .then(res => {
                    this.downloadables = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },

        saveDownloadable() {
            this.toggleLoading();
            axios
                .post(`/admin/manage/downloadables/store`, {
                    name: this.name,
                    cover_img: this.cover_img,
                    type: this.type,
                    description: this.description
                })
                .then(res => {
                    console.log(res);
                    this.name = "";
                    this.cover_img = "";
                    this.type = "";
                    this.description = "";
                    this.getAllDownloadables();
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                    this.toggleLoading();
                });
        },
        deleteDownloadable(id) {
            if (confirm("This donwloadable will be deleted.")) {
                this.toggleLoading();
                axios
                    .post(`/admin/manage/downloadables/${id}/destroy`)
                    .then(res => {
                        console.log(res);
                        this.getAllDownloadables();
                        this.toggleLoading();
                    })
                    .catch(err => {
                        console.log(err);
                        this.toggleLoading();
                    });
            }
        }
    },
    created() {
        this.getAllDownloadables();
    }
};
</script>
