<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h4>Grant Certificates</h4>
            </div>

            <form class="form mt-2" @submit.prevent>
                <div class="row">
                    <div class="col-10 pr-1">
                        <input
                            type="text"
                            class="form-control"
                            v-model="certificateSearchQuery"
                        />
                    </div>
                    <div class="col-2 pl-1">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="card-body px-1 py-1">
                <div class="list-container">
                    <div
                        v-for="certificate in filteredCertificates"
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
                                    :href="'#collapse_cert_' + certificate.id"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"
                                    style="cursor:pointer"
                                    class="my-0"
                                >
                                    <small
                                        >@{{ certificate.user.username }}</small
                                    >
                                </p>
                            </div>
                            <div class="col-4">
                                <p class="text-right my-0">
                                    <button
                                        @click="
                                            toggleGrantCertificate(
                                                certificate.id
                                            )
                                        "
                                        class="btn btn-primary btn-sm"
                                    >
                                        <i
                                            v-if="
                                                certificate.checked == 'false'
                                            "
                                            class="fas fa-check"
                                        ></i>
                                        <i
                                            v-if="certificate.checked == 'true'"
                                            class="fas fa-times"
                                        ></i>
                                    </button>
                                </p>
                            </div>
                        </div>

                        <div
                            class="collapse"
                            :id="'collapse_cert_' + certificate.id"
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
            certificateList: [],
            certificateSearchQuery: ""
        };
    },
    comonents: {
        loader: Loader
    },
    methods: {
        ...mapActions(["toggleLoading"]),
        toggleGrantCertificate(id) {
            if (confirm("Are you sure to check/uncheck this user?")) {
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
            }
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
    computed: {
        filteredCertificates() {
            return this.certificateList.filter(certificate => {
                return certificate.user.username
                    .toLowerCase()
                    .includes(this.certificateSearchQuery.toLowerCase());
            });
        }
    },
    created() {
        this.getAllCerts();
    }
};
</script>
