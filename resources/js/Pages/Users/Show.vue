<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ user.firstname }} {{ user.tussenvoegsel }} {{ user.lastname }}
            </h2>
        </template>
        <div class=' m-10 px-4 py-5 bg-white sm:p-6 shadow rounded-md space-x-4'>
            <div>
                <div class="space-x-4">
                    <div class="inline-block">
                         {{ user.firstname }} {{ user.tussenvoegsel }} {{ user.lastname }}<br>
                        {{ user.email }}<br>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="mb-3">Gekoppelde leden</div>
                <div v-for="member in user.members" :key="member.username">
                    <div v-if="member.pivot.is_confirmed">
                        <custom-button @click="unconfirmCouple(user.id, member.id)"><i class="fas fa-unlink"></i></custom-button>
                        {{member.username}}
                    </div>
                    <div v-if="!member.pivot.is_confirmed">
                        <custom-button @click="confirmCouple(user.id, member.id)"><i class="fas fa-unlink"></i></custom-button>
                        <span class="line-through">{{member.username}}</span>
                    </div>

                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetButton from '@/Jetstream/Button'
import MemberForm from '@/custom/MemberForm'
import JetModal from '@/Jetstream/Modal'
import CustomButton from '@/custom/CustomButton.vue'

export default {
    props: {
        user: Object,
    },
    methods: {
        unconfirmCouple(userID, memberID) {
            this.coupleForm.userID = userID;
            this.coupleForm.memberID = memberID;
            this.$inertia.post('/unconfirmCouple/', this.coupleForm)
        },
        confirmCouple(userID, memberID) {
            this.coupleForm.userID = userID;
            this.coupleForm.memberID = memberID;
            this.$inertia.post('/confirmCouple/', this.coupleForm)
        },
    },

    components: {
        AppLayout,
        JetButton,
        MemberForm,
        JetModal,
        CustomButton
    },

    data: function() {
        return {
            coupleForm: this.$inertia.form({
                _method: 'POST',
                memberID: '',
                userID: '',
            })
        }
    },
}
</script>
