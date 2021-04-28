<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Leden
            </h2>
            <p>Hallo, {{ $page.props.user.firstname }}</p>
        </template>
        <div class="flex justify-center w-full">
            <div class='m-6 max-w-3xl'>
                <basic-element>
                    <template #title>Nieuwe verzoeken</template>
                    <template #content>
                        <div class="text-bold">Gebruiker - Lid</div>
                        <div v-for="user in users" :key="user.id">
                            <div v-for="member in user.members" :key="member.id">
                                <div v-if="!member.pivot.is_confirmed" class="p-2">
                                    <custom-button @click="confirmCouple(user.id, member.id)"><i class="fas fa-link"></i></custom-button>
                                    {{ user.username }} - {{ member.username }} ({{member.pivot.is_confirmed}})
                                </div>
                            </div>
                        </div>
                    </template>
                </basic-element>




                <basic-element>
                    <template #title>
                        Gebruikers
                    </template>

                    <template #description>
                    </template>

                    <template #content>
                        <div class="flex flex-col space-y-5 w-full">
                            <table class="table-auto">
                                <tbody>
                                    <tr v-for="user in users" :key='user.id' class="flex justify-center space-x-2">
                                        <td><inertia-link :href="route('user.show', user)">{{ user.username }}</inertia-link></td>
                                        <td>
                                            <custom-button v-if="!user.is_active" @click="activateUser(user.id)" color="yellow"><i class="fas fa-user-slash"></i></custom-button>
                                            <custom-button v-if="user.is_active" @click="deactivateUser(user.id)" color="green"><i class="fas fa-user-check"></i></custom-button>
                                        </td>
                                        <td>
                                            <custom-button v-if="!user.is_admin" @click="makeAdmin(user.id)" color="yellow"><i class="fas fa-lock"></i></custom-button>
                                            <custom-button v-if="user.is_admin" @click="delAdmin(user.id)" color="green"><i class="fas fa-unlock"></i></custom-button>
                                        </td>
                                        <td>
                                            <custom-button v-if="!user.is_instructor" @click="makeInstructor(user.id)" color="yellow"><i class="fas fa-university"></i></custom-button>
                                            <custom-button v-if="user.is_instructor" @click="delInstructor(user.id)" color="green"><i class="fas fa-university"></i></custom-button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </template>
                </basic-element>
                <basic-element>
                    <template #title>
                        Members
                    </template>
                    <template #description></template>
                    <template #content>
                        <div class="flex flex-col space-y-5 w-full">
                            <div v-for="member in members" :key='member.id' class="flex justify-center">

                                    {{ member.username }}

                            </div>
                        </div>
                    </template>
                </basic-element>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetModal from '@/Jetstream/Modal'
import FindMember from '@/custom/FindMember'
import MemberForm from '@/custom/MemberForm'
import BasicElement from '@/custom/BasicElement'
import LinkButton from '@/custom/LinkButton'
import CustomButton from '@/custom/CustomButton'
import JetButton from '@/Jetstream/Button'




export default {
    props: {
        users: Object,
        members: Object,
    },
    methods: {
        openModal: function () {
            this.isOpen = true;
        },
        closeModal: function () {
            this.isOpen = false;
            this.createNew = false;
            this.confirmSearch = false;
        },
        updateFilteredMembers(e) {
            this.filteredMembers = e
        },

        toggleNew() {
            this.createNew = !this.createNew
        },
        coupleMemberUser(member) {
            console.log('couple')
            console.log(member)
            member._method = 'POST';
            this.$inertia.post('/couplememberuser/', member)
            this.$emit('close')
        },
        confirmCouple(userID, memberID) {
            this.coupleForm.memberID = memberID
            this.coupleForm.userID = userID
            this.$inertia.post('/confirmCouple/', this.coupleForm)
        },
        activateUser(userID) {
            this.coupleForm.userID = userID
            this.$inertia.post('/activateUser/', this.coupleForm)
        },
        deactivateUser(userID) {
            this.coupleForm.userID = userID
            this.$inertia.post('/deactivateUser/', this.coupleForm)
        },
        makeAdmin(userID) {
            this.coupleForm.userID = userID
            this.$inertia.post('/makeAdmin/', this.coupleForm)
        },
        delAdmin(userID) {
            this.coupleForm.userID = userID
            this.$inertia.post('/delAdmin/', this.coupleForm)
        },

        makeInstructor(userID) {
            this.coupleForm.userID = userID
            this.$inertia.post('/makeInstructor/', this.coupleForm)
        },
        delInstructor(userID) {
            this.coupleForm.userID = userID
            this.$inertia.post('/delInstructor/', this.coupleForm)
        },
    },
    data: function() {
        return {
            isOpen: false,
            filteredMembers: Object,
            confirmSearch: false,
            createNew: false,
            form: this.$inertia.form({
                _method: 'POST',
                id: '',
                firstname: '',
                tussenvoegsel: '',
                lastname: '',
                username: '',
                email: '',
                dateofbirth: '',
            }),
            coupleForm: this.$inertia.form({
                _method: 'POST',
                memberID: '',
                userID: '',
            })
        }
    },
    components: {
        AppLayout,
        JetModal,
        FindMember,
        MemberForm,
        BasicElement,
        LinkButton,
        CustomButton,
        JetButton
    },
}
</script>

