<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h4>Grant Certificates</h4>
            </div>
            <div class="card-body px-1 py-1">
                <div class="list-container">
                    <div
                        v-for="certificate in certificateList"
                        :key="certificate.id"
                        :class="{
                            alert: true,
                            'py-2': true,
                            'px-2': true,
                            'alert-primary': certificate.checked == 'false',
                            'alert-success': certificate.checked == 'true'
                        }"
                    >
                        <div class="row">
                            <div class="col-8">
                                <p
                                    data-toggle="collapse"
                                    :href="'#collapse_' + certificate.id"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"
                                    style="cursor:pointer"
                                >
                                    <small
                                        >@{{ certificate.user.username }}</small
                                    >
                                </p>
                            </div>
                            <div class="col-4">
                                <button
                                    @click="
                                        toggleGrantCertificate(certificate.id)
                                    "
                                    class="btn btn-primary btn-sm"
                                >
                                    <i
                                        v-if="certificate.checked == 'false'"
                                        class="fas fa-check"
                                    ></i>
                                    <i
                                        v-if="certificate.checked == 'true'"
                                        class="fas fa-times"
                                    ></i>
                                </button>
                            </div>
                        </div>

                        <div
                            class="collapse"
                            :id="'collapse_' + certificate.id"
                        >
                            <div class="card card-body px-1 py-1">
                                <p class="mb-1">
                                    <small
                                        >Email:
                                        <b>{{
                                            certificate.user.email
                                        }}</b></small
                                    >
                                </p>
                                <p class="mb-1">
                                    <small>
                                        Course:
                                        <b>{{ certificate.course.title }}</b>
                                    </small>
                                </p>
                                <p class="mb-1">
                                    <small
                                        >Full Name:
                                        <b
                                            >{{ certificate.user.first_name }}
                                            {{ certificate.user.last_name }}</b
                                        ></small
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.list-container {
    min-height: 1630px;
    max-height: 1630px;
    overflow: scroll;
}
</style>

<script>
import Loader from "./Loader";
import axios from "axios";
import { mapActions } from "vuex";

export default {
    data() {
        return {
            certificateList: []
        };
    },
    comonents: {
        loader: Loader
    },
    methods: {
        ...mapActions(["toggleLoading"]),
        toggleGrantCertificate(id) {
            this.toggleLoading();
            axios(`/admin/manage/users/toggleGrant/certificates/${id}`)
                .then(res => {
                    console.log(res);
                    this.getAllCerts();
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                    this.toggleLoading();
                });
        },
        getAllCerts() {
            axios(`/admin/manage/users/get/certificates`)
                .then(response => {
                    this.certificateList = response.data;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    created() {
        this.getAllCerts();
    }
};
</script>
