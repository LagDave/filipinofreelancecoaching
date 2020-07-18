<template>
    <div>
        <loader></loader>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 pr-1">
                    <div class="card">
                        <div class=" card-header">
                            <h4>
                                Manage Students
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Unsubscribed -->
                                <div class="col-lg-6 list-container">
                                    <div class="row">
                                        <div class="col-7">
                                            <h5>
                                                <b>Unsubscribed </b>
                                            </h5>
                                        </div>
                                        <div class="col-5">
                                            <form @submit.prevent>
                                                <div class="row">
                                                    <div class="col-8 pr-1">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="
                                                                unsubscribedSearchQuery
                                                            "
                                                        />
                                                    </div>
                                                    <div class="col-4 pl-1">
                                                        <button
                                                            class="btn btn-primary"
                                                        >
                                                            <i
                                                                class="fas fa-search"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <hr />
                                    <transition-group name="fade">
                                        <div
                                            v-for="(user,
                                            index) in filteredUnsubscribed"
                                            :key="user.id"
                                            class="alert alert-secondary"
                                        >
                                            <span
                                                class="user_name"
                                                style="cursor:pointer"
                                                data-toggle="collapse"
                                                :href="'#collapse_' + user.id"
                                                role="button"
                                                aria-expanded="false"
                                                :aria-controls="
                                                    'collapse_' + user.id
                                                "
                                            >
                                                {{ index + 1 + ". " }}
                                                {{ user.first_name }}
                                                {{ user.last_name }}
                                                <small class=""
                                                    >@{{ user.username }}</small
                                                >
                                            </span>

                                            <div
                                                class="collapse"
                                                :id="'collapse_' + user.id"
                                            >
                                                <div class="card card-body">
                                                    <p class="mb-0">
                                                        Registered at:
                                                        <b>{{
                                                            user.created_at
                                                        }}</b>
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
                                <!-- Pending Registration -->
                                <div class="col-lg-6 list-container">
                                    <div class="row">
                                        <div class="col-7">
                                            <h5>
                                                <b>Pending Registration </b>
                                            </h5>
                                        </div>
                                        <div class="col-5">
                                            <form @submit.prevent>
                                                <div class="row">
                                                    <div class="col-8 pr-1">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="
                                                                pendingSearchQuery
                                                            "
                                                        />
                                                    </div>
                                                    <div class="col-4 pl-1">
                                                        <button
                                                            class="btn btn-primary"
                                                        >
                                                            <i
                                                                class="fas fa-search"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <hr />
                                    <transition-group name="fade">
                                        <div
                                            v-for="(user,
                                            index) in filteredPending"
                                            :key="user.id"
                                        >
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
                                                        <div
                                                            class="modal-header"
                                                        >
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
                                                                <span
                                                                    aria-hidden="true"
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
                                                                    :src="
                                                                        proof.url
                                                                    "
                                                                    style="width:100%"
                                                                    alt=""
                                                                    class="mb-3"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-secondary">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <p
                                                            class="user_name my-2"
                                                            style="cursor:pointer"
                                                            data-toggle="collapse"
                                                            :href="
                                                                '#collapse_' +
                                                                    user.id
                                                            "
                                                            role="button"
                                                            aria-expanded="false"
                                                            :aria-controls="
                                                                'collapse_' +
                                                                    user.id
                                                            "
                                                        >
                                                            {{
                                                                index + 1 + ". "
                                                            }}
                                                            {{
                                                                user.first_name
                                                            }}
                                                            {{ user.last_name }}
                                                            <small class=""
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
                                                                    user.proofs &&
                                                                        user
                                                                            .proofs
                                                                            .length ==
                                                                            0
                                                                "
                                                                class="ml-1"
                                                            >
                                                                <small
                                                                    class="proof-status"
                                                                    >No Proof
                                                                    Yet</small
                                                                >
                                                            </span>
                                                            <span
                                                                style="cursor:pointer"
                                                                class="ml-1"
                                                                v-else
                                                                data-toggle="modal"
                                                                :data-target="
                                                                    '#modal_' +
                                                                        user.id
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
                                                            <b>{{
                                                                user.created_at
                                                            }}</b>
                                                        </p>
                                                        <p class="mb-0">
                                                            Email:
                                                            <b
                                                                >{{
                                                                    user.email
                                                                }}
                                                            </b>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </transition-group>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <!-- Subscribed -->
                                <div class="col-lg-6 list-container">
                                    <div class="row">
                                        <div class="col-7">
                                            <h5>
                                                <b>Subscribed </b>
                                            </h5>
                                        </div>
                                        <div class="col-5">
                                            <form @submit.prevent>
                                                <div class="row">
                                                    <div class="col-8 pr-1">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="
                                                                subscribedSearchQuery
                                                            "
                                                        />
                                                    </div>
                                                    <div class="col-4 pl-1">
                                                        <button
                                                            class="btn btn-primary"
                                                        >
                                                            <i
                                                                class="fas fa-search"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <hr />
                                    <transition-group name="fade">
                                        <div
                                            :key="user.id"
                                            v-for="(user,
                                            index) in filteredSubscribed"
                                            class="alert alert-primary"
                                        >
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
                                                        <div
                                                            class="modal-header"
                                                        >
                                                            <h5
                                                                class="modal-title"
                                                                style="color:black !important"
                                                                id="exampleModalLabel"
                                                            >
                                                                <b>
                                                                    {{
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
                                                                <span
                                                                    aria-hidden="true"
                                                                    >&times;</span
                                                                >
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div
                                                                :key="proof.id"
                                                                v-for="proof in user.proofs"
                                                            >
                                                                <p
                                                                    class="text-center"
                                                                    style="color:black !important"
                                                                >
                                                                    Uploaded:
                                                                    {{
                                                                        proof.created_at
                                                                    }}
                                                                </p>
                                                                <hr />
                                                                <img
                                                                    :src="
                                                                        proof.url
                                                                    "
                                                                    style="width:100%"
                                                                    alt=""
                                                                    class="mb-3"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <p
                                                        style="cursor:pointer"
                                                        data-toggle="collapse"
                                                        class="my-2"
                                                        :href="
                                                            '#collapse_' +
                                                                user.id
                                                        "
                                                        role="button"
                                                        aria-expanded="false"
                                                        :aria-controls="
                                                            'collapse_' +
                                                                user.id
                                                        "
                                                    >
                                                        {{ index + 1 + ". "
                                                        }}{{ user.first_name }}
                                                        {{ user.last_name }}
                                                    </p>
                                                </div>
                                                <div class="col-7">
                                                    <div class="btn-group">
                                                        <button
                                                            @click="
                                                                moveToPending(
                                                                    user.id
                                                                )
                                                            "
                                                            class="btn btn-sm btn-primary"
                                                        >
                                                            Move to Pending
                                                        </button>
                                                        <button
                                                            @click="
                                                                unsubscribe(
                                                                    user.id
                                                                )
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
                                                    <p class="mb-0">
                                                        Proof of Payment:
                                                        <span
                                                            v-if="
                                                                user.proofs &&
                                                                    user.proofs
                                                                        .length ==
                                                                        0
                                                            "
                                                            class="ml-1"
                                                        >
                                                            <small
                                                                class="proof-status"
                                                                >No Proof
                                                                Yet</small
                                                            >
                                                        </span>
                                                        <span
                                                            style="cursor:pointer"
                                                            class="ml-1"
                                                            v-else
                                                            data-toggle="modal"
                                                            :data-target="
                                                                '#modal_' +
                                                                    user.id
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
                                                        Plan:
                                                        <b>{{
                                                            user.plan_name.toUpperCase()
                                                        }}</b>
                                                    </p>

                                                    <p class="mb-0">
                                                        Registered at:
                                                        <b>{{
                                                            user.created_at
                                                        }}</b>
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
                                <!-- Expired -->
                                <div class="col-lg-6 list-container">
                                    <div class="row">
                                        <div class="col-7">
                                            <h5>
                                                <b>Expired </b>
                                            </h5>
                                        </div>
                                        <div class="col-5">
                                            <form @submit.prevent>
                                                <div class="row">
                                                    <div class="col-8 pr-1">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="
                                                                expiredSearchQuery
                                                            "
                                                        />
                                                    </div>
                                                    <div class="col-4 pl-1">
                                                        <button
                                                            class="btn btn-primary"
                                                        >
                                                            <i
                                                                class="fas fa-search"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <hr />
                                    <div
                                        :key="user.id"
                                        v-for="(user, index) in filteredExpired"
                                        :class="{
                                            alert: true,
                                            'alert-secondary':
                                                user.expired_check == 'false',
                                            'alert-success':
                                                user.expired_check == 'true'
                                        }"
                                    >
                                        <div class="row">
                                            <div class="col-9">
                                                <p
                                                    data-toggle="collapse"
                                                    :href="
                                                        '#collapse_' + user.id
                                                    "
                                                    role="button"
                                                    aria-expanded="false"
                                                    :aria-controls="
                                                        'collapse_' + user.id
                                                    "
                                                    style="cursor:pointer"
                                                    class="my-2"
                                                >
                                                    {{ index + 1 + ". " }}
                                                    {{ user.first_name }}
                                                    {{ user.last_name }}
                                                </p>
                                            </div>
                                            <div class="col-3">
                                                <p class="text-right">
                                                    <button
                                                        @click="
                                                            toggleExpiredCheck(
                                                                user.id
                                                            )
                                                        "
                                                        class="btn btn-sm btn-primary"
                                                    >
                                                        <i
                                                            :class="{
                                                                fas: true,
                                                                'fa-check':
                                                                    user.expired_check ==
                                                                    'false',
                                                                'fa-times':
                                                                    user.expired_check ==
                                                                    'true'
                                                            }"
                                                        ></i>
                                                    </button>
                                                </p>
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
                                </div>
                            </div>
                            <div class="row mt-5">
                                <!-- Renewal -->
                                <div class="col-lg-6 list-container">
                                    <div class="row">
                                        <div class="col-7">
                                            <h5>
                                                <b>Pending Renewal </b>
                                            </h5>
                                        </div>
                                        <div class="col-5">
                                            <form @submit.prevent>
                                                <div class="row">
                                                    <div class="col-8 pr-1">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="
                                                                renewalSearchQuery
                                                            "
                                                        />
                                                    </div>
                                                    <div class="col-4 pl-1">
                                                        <button
                                                            class="btn btn-primary"
                                                        >
                                                            <i
                                                                class="fas fa-search"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <hr />
                                    <transition-group name="fade">
                                        <div
                                            v-for="user in filteredRenewal"
                                            :key="user.id"
                                        >
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
                                                        <div
                                                            class="modal-header"
                                                        >
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
                                                                <span
                                                                    aria-hidden="true"
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
                                                                    :src="
                                                                        proof.url
                                                                    "
                                                                    style="width:100%"
                                                                    alt=""
                                                                    class="mb-3"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-secondary">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <p
                                                            class="user_name"
                                                            style="cursor:pointer"
                                                            data-toggle="collapse"
                                                            :href="
                                                                '#collapse_' +
                                                                    user.id
                                                            "
                                                            role="button"
                                                            aria-expanded="false"
                                                            :aria-controls="
                                                                'collapse_' +
                                                                    user.id
                                                            "
                                                        >
                                                            {{
                                                                user.first_name
                                                            }}
                                                            {{ user.last_name }}
                                                            <small class=""
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
                                                                    user.proofs &&
                                                                        user
                                                                            .proofs
                                                                            .length ==
                                                                            0
                                                                "
                                                                class="ml-1"
                                                            >
                                                                <small
                                                                    class="proof-status"
                                                                    >No Proof
                                                                    Yet</small
                                                                >
                                                            </span>
                                                            <span
                                                                style="cursor:pointer"
                                                                class="ml-1"
                                                                v-else
                                                                data-toggle="modal"
                                                                :data-target="
                                                                    '#modal_' +
                                                                        user.id
                                                                "
                                                            >
                                                                <small
                                                                    class="proof-status"
                                                                >
                                                                    CLICK TO SEE
                                                                </small>
                                                            </span>
                                                        </p>
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
                                                            Registered at:
                                                            <b>{{
                                                                user.created_at
                                                            }}</b>
                                                        </p>
                                                        <p class="mb-0">
                                                            Email:
                                                            <b
                                                                >{{
                                                                    user.email
                                                                }}
                                                            </b>
                                                        </p>
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
                <div class="pl-1 col-lg-3">
                    <grant-certificates-component></grant-certificates-component>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.list-container {
    padding: 10px;
    min-height: 500px;
    max-height: 500px;
    overflow: scroll;
}
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
import GrantCertificatesComponent from "./GrantCertificatesComponent.vue";

export default {
    data() {
        return {
            unsubscribed: [],
            unsubscribedSearchQuery: "",
            pending: [],
            pendingSearchQuery: "",
            subscribed: [],
            subscribedSearchQuery: "",
            expired: [],
            expiredSearchQuery: "",
            renewal: [],
            renewalSearchQuery: ""
        };
    },
    computed: {
        filteredUnsubscribed() {
            if (this.unsubscribed.length > 0) {
                return this.unsubscribed.filter(user => {
                    var full_name = user.first_name + " " + user.last_name;
                    return full_name
                        .toLowerCase()
                        .includes(this.unsubscribedSearchQuery.toLowerCase());
                });
            }
            return this.unsubscribed;
        },
        filteredPending() {
            if (this.pending.length > 0) {
                return this.pending.filter(user => {
                    var full_name = user.first_name + " " + user.last_name;
                    return full_name
                        .toLowerCase()
                        .includes(this.pendingSearchQuery.toLowerCase());
                });
            }
            return this.pending;
        },
        filteredSubscribed() {
            if (this.subscribed.length > 0) {
                return this.subscribed.filter(user => {
                    var full_name = user.first_name + " " + user.last_name;
                    return full_name
                        .toLowerCase()
                        .includes(this.subscribedSearchQuery.toLowerCase());
                });
            }
            return this.subscribed;
        },
        filteredExpired() {
            if (this.expired.length > 0) {
                return this.expired.filter(user => {
                    var full_name = user.first_name + " " + user.last_name;
                    return full_name
                        .toLowerCase()
                        .includes(this.expiredSearchQuery.toLowerCase());
                });
            }
            return this.expired;
        },
        filteredRenewal() {
            if (this.renewal.length > 0) {
                return this.renewal.filter(user => {
                    var full_name = user.first_name + " " + user.last_name;
                    return full_name
                        .toLowerCase()
                        .includes(this.renewalSearchQuery.toLowerCase());
                });
            }
            return this.renewal;
        }
    },
    components: {
        loader: Loader,
        GrantCertificatesComponent
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
        gatherRenewal() {
            axios("/admin/manage/users/get/renewal")
                .then(response => {
                    this.renewal = response.data;
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
            this.gatherRenewal();
        },
        gatherAllWithLoad() {
            this.gatherAll();
        },
        grantUser(id, grantType) {
            if (confirm("Grant the Plan to user?")) {
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
            }
        },
        moveToPending(id) {
            if (
                confirm(
                    "This will move user to pending and will forfeit its current plan."
                )
            ) {
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
            }
        },
        unsubscribe(id) {
            if (
                confirm(
                    "This will unsubscribe the user and forfeit its plan \nUser has to reapply for a plan before admin can grant a subscription."
                )
            ) {
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
        toggleExpiredCheck(id) {
            if (confirm("Are you sure to check/uncheck this user?")) {
                this.toggleLoading();
                axios
                    .post(`/admin/manage/users/toggleCheck/expired/${id}`)
                    .then(res => {
                        console.log(res);
                        this.gatherAll();
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
        this.toggleLoading();
        this.gatherAllWithLoad();
        setTimeout(() => {
            this.toggleLoading();
        }, 1000);
    }
};
</script>
