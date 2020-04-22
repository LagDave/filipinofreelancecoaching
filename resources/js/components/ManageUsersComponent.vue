<template>
    <div>
        <loader></loader>
        <div class="container">
            <div class="card">
                <div class=" card-header">
                    <h4>
                        Manage Students
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>
                                <button
                                    @click="gatherUnsubscribed"
                                    class="btn btn-sm btn-primary"
                                >
                                    <i class="icofont-refresh"></i>
                                </button>
                                <b>Unsubscribed </b>
                            </h5>
                            <hr />
                            <transition-group name="fade">
                                <div
                                    v-for="user in unsubscribed"
                                    :key="user.id"
                                    class="alert alert-secondary"
                                >
                                    <p
                                        class="user_name"
                                        style="cursor:pointer"
                                        data-toggle="collapse"
                                        :href="'#collapse_' + user.id"
                                        role="button"
                                        aria-expanded="false"
                                        :aria-controls="'collapse_' + user.id"
                                    >
                                        {{ user.first_name }}
                                        {{ user.last_name }}
                                        <small class="text-muted"
                                            >@{{ user.username }}</small
                                        >
                                    </p>

                                    <div
                                        class="collapse"
                                        :id="'collapse_' + user.id"
                                    >
                                        <div class="card card-body">
                                            <p class="mb-0">
                                                Registered at:
                                                <b>{{ user.created_at }}</b>
                                            </p>
                                            <p class="mb-0">
                                                Email:
                                                <b>{{ user.email }} </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </transition-group>
                        </div>
                        <div class="col-lg-6">
                            <h5>
                                <button
                                    @click="gatherPending"
                                    class="btn btn-sm btn-primary"
                                >
                                    <i class="icofont-refresh"></i>
                                </button>
                                <b>Pending</b>
                            </h5>
                            <hr />
                            <transition-group name="fade">
                                <div v-for="user in pending" :key="user.id">
                                    <div
                                        class="modal fade"
                                        :id="'modal_' + user.id"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-labelledby="exampleModalLabel"
                                        aria-hidden="true"
                                    >
                                        <div
                                            class="modal-dialog"
                                            role="document"
                                        >
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5
                                                        class="modal-title"
                                                        id="exampleModalLabel"
                                                    >
                                                        <b
                                                            >{{
                                                                user.first_name
                                                            }}
                                                            {{
                                                                user.last_name
                                                            }}</b
                                                        >
                                                        Proof of Payment
                                                    </h5>
                                                    <button
                                                        type="button"
                                                        class="close"
                                                        data-dismiss="modal"
                                                        aria-label="Close"
                                                    >
                                                        <span aria-hidden="true"
                                                            >&times;</span
                                                        >
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div
                                                        :key="proof.id"
                                                        v-for="proof in user.proofs"
                                                    >
                                                        <h5>
                                                            Uploaded:
                                                            {{
                                                                proof.created_at
                                                            }}
                                                        </h5>
                                                        <hr />
                                                        <img
                                                            :src="proof.url"
                                                            style="width:100%"
                                                            alt=""
                                                            class="mb-3"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-success">
                                        <div class="row">
                                            <div class="col-5">
                                                <p
                                                    class="user_name"
                                                    style="cursor:pointer"
                                                    data-toggle="collapse"
                                                    :href="
                                                        '#collapse_' + user.id
                                                    "
                                                    role="button"
                                                    aria-expanded="false"
                                                    :aria-controls="
                                                        'collapse_' + user.id
                                                    "
                                                >
                                                    {{ user.first_name }}
                                                    {{ user.last_name }}
                                                    <small class="text-muted"
                                                        >@{{
                                                            user.username
                                                        }}</small
                                                    >
                                                </p>
                                            </div>
                                            <div class="col-7">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-sm btn-primary"
                                                        @click="
                                                            grantUser(
                                                                user.id,
                                                                'monthly'
                                                            )
                                                        "
                                                    >
                                                        MONTHLY
                                                    </button>
                                                    <button
                                                        class="btn btn-sm btn-primary"
                                                        @click="
                                                            grantUser(
                                                                user.id,
                                                                'yearly'
                                                            )
                                                        "
                                                    >
                                                        YEARLY
                                                    </button>
                                                    <button
                                                        class="btn btn-sm btn-primary"
                                                        @click="
                                                            grantUser(
                                                                user.id,
                                                                'lifetime'
                                                            )
                                                        "
                                                    >
                                                        LIFETIME
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="collapse"
                                            :id="'collapse_' + user.id"
                                        >
                                            <div class="card card-body">
                                                <p class="mb-0">
                                                    Applying for:
                                                    <b>{{
                                                        user.plan_name.toUpperCase()
                                                    }}</b>
                                                </p>
                                                <p class="mb-0">
                                                    Proof of Payment:
                                                    <span
                                                        v-if="
                                                            user.proofs
                                                                .length == 0
                                                        "
                                                        class="ml-1"
                                                    >
                                                        <small
                                                            class="proof-status"
                                                            >No Proof Yet</small
                                                        >
                                                    </span>
                                                    <span
                                                        style="cursor:pointer"
                                                        class="ml-1"
                                                        v-else
                                                        data-toggle="modal"
                                                        :data-target="
                                                            '#modal_' + user.id
                                                        "
                                                    >
                                                        <small
                                                            class="proof-status"
                                                        >
                                                            CLICK TO SEE
                                                        </small>
                                                    </span>
                                                </p>

                                                <hr />
                                                <p class="mb-0">
                                                    Registered at:
                                                    <b>{{ user.created_at }}</b>
                                                </p>
                                                <p class="mb-0">
                                                    Email:
                                                    <b>{{ user.email }} </b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </transition-group>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <h5>
                                <button
                                    @click="gatherSubscribed"
                                    class="btn btn-sm btn-primary"
                                >
                                    <i class="icofont-refresh"></i>
                                </button>
                                <b>Subscribed</b>
                            </h5>
                            <hr />
                            <transition-group name="fade">
                                <div
                                    :key="user.id"
                                    v-for="user in subscribed"
                                    class="alert alert-primary"
                                >
                                    <div class="row">
                                        <div class="col-5">
                                            <p
                                                style="cursor:pointer"
                                                data-toggle="collapse"
                                                :href="'#collapse_' + user.id"
                                                role="button"
                                                aria-expanded="false"
                                                :aria-controls="
                                                    'collapse_' + user.id
                                                "
                                            >
                                                {{ user.first_name }}
                                                {{ user.last_name }}
                                            </p>
                                        </div>
                                        <div class="col-7">
                                            <div class="btn-group">
                                                <button
                                                    @click="
                                                        moveToPending(user.id)
                                                    "
                                                    class="btn btn-sm btn-primary"
                                                >
                                                    Move to Pending
                                                </button>
                                                <button
                                                    @click="
                                                        unsubscribe(user.id)
                                                    "
                                                    class="btn btn-sm btn-secondary"
                                                >
                                                    Unsubscribe
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="collapse"
                                        :id="'collapse_' + user.id"
                                    >
                                        <div class="card card-body">
                                            <p class="mb-0">
                                                Plan started:
                                                <b>{{
                                                    user.subscription_start
                                                }}</b>
                                            </p>
                                            <p class="mb-0">
                                                Plan end:
                                                <b>{{
                                                    user.subscription_end
                                                }}</b>
                                            </p>
                                            <hr />
                                            <p class="mb-0">
                                                Plan:
                                                <b>{{
                                                    user.plan_name.toUpperCase()
                                                }}</b>
                                            </p>

                                            <p class="mb-0">
                                                Registered at:
                                                <b>{{ user.created_at }}</b>
                                            </p>
                                            <p class="mb-0">
                                                Email:
                                                <b>{{ user.email }} </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </transition-group>
                        </div>
                        <div class="col-lg-6">
                            <h5>
                                <button
                                    @click="gatherExpired"
                                    class="btn btn-sm btn-primary"
                                >
                                    <i class="icofont-refresh"></i>
                                </button>
                                <b>Expired</b>
                            </h5>
                            <hr />
                            <div
                                :key="user.id"
                                v-for="user in expired"
                                class="alert alert-secondary"
                            >
                                <p
                                    data-toggle="collapse"
                                    :href="'#collapse_' + user.id"
                                    role="button"
                                    aria-expanded="false"
                                    :aria-controls="'collapse_' + user.id"
                                    style="cursor:pointer"
                                >
                                    {{ user.first_name }} {{ user.last_name }}
                                </p>
                                <div
                                    class="collapse"
                                    :id="'collapse_' + user.id"
                                >
                                    <div class="card card-body">
                                        <p class="mb-0">
                                            Plan started:
                                            <b>{{ user.subscription_start }}</b>
                                        </p>
                                        <p class="mb-0">
                                            Plan end:
                                            <b>{{ user.subscription_end }}</b>
                                        </p>
                                        <hr />
                                        <p class="mb-0">
                                            Plan:
                                            <b>{{
                                                user.plan_name.toUpperCase()
                                            }}</b>
                                        </p>

                                        <p class="mb-0">
                                            Registered at:
                                            <b>{{ user.created_at }}</b>
                                        </p>
                                        <p class="mb-0">
                                            Email:
                                            <b>{{ user.email }} </b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.proof-status {
    margin-right: 5px;
    padding: 3px 8px;
    color: #777;
    min-width: 50px !important;
    background: #d3d3d37a;
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
import axios from "axios";
import Loader from "./Loader";
import { mapActions } from "vuex";

export default {
    data() {
        return {
            unsubscribed: [],
            pending: [],
            subscribed: [],
            expired: []
        };
    },
    components: {
        loader: Loader
    },
    methods: {
        ...mapActions(["toggleLoading"]),
        gatherUnsubscribed() {
            axios("/admin/manage/users/get/unsubscribed")
                .then(response => {
                    this.unsubscribed = response.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        gatherPending() {
            axios("/admin/manage/users/get/pending")
                .then(response => {
                    this.pending = response.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        gatherSubscribed() {
            axios("/admin/manage/users/get/subscribed")
                .then(response => {
                    this.subscribed = response.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        gatherExpired() {
            axios("/admin/manage/users/get/expired")
                .then(response => {
                    this.expired = response.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        gatherAll() {
            this.gatherUnsubscribed();
            this.gatherPending();
            this.gatherSubscribed();
            this.gatherExpired();
        },
        grantUser(id, grantType) {
            this.toggleLoading();
            axios
                .post(`/admin/manage/users/${id}/grant/${grantType}`)
                .then(response => {
                    this.gatherAll();
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                    this.toggleLoading();
                });
        },
        moveToPending(id) {
            this.toggleLoading();
            axios
                .post(`/admin/manage/users/${id}/moveToPending`)
                .then(response => {
                    console.log(response);
                    this.gatherAll();
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                });
        },
        unsubscribe(id) {
            this.toggleLoading();
            axios
                .post(`/admin/manage/users/${id}/unsubscribe`)
                .then(response => {
                    console.log(response);
                    this.gatherAll();
                    this.toggleLoading();
                })
                .catch(err => {
                    console.log(err);
                    this.toggleLoading();
                });
        }
    },
    created() {
        this.toggleLoading();
        this.gatherAll();
        this.toggleLoading();
    }
};
</script>
