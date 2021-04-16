<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ member.firstname }} {{ member.tussenvoegsel }} {{ member.lastname }}
            </h2>
        </template>
        <div class=' m-10 px-4 py-5 bg-white sm:p-6 shadow rounded-md space-x-4'>
            <div>
                <div class="space-x-4">
                    <div class="inline-block">
                        {{ member.firstname }} {{ member.tussenvoegsel }} {{ member.lastname }}<br>
                        {{ member.email }}<br>
                        {{ member.dateofbirth }}<br>
                    </div>
                    <div class="inline-block">
                        <jet-button @click="edit(member)">Wijzigen</jet-button>
                    </div>
                    <div class="inline-block">
                        <jet-button @click="decoupleMemberUser(member)">Ontkoppel</jet-button>
                    </div>
                </div>
            </div>
            <div>
                <table class="table-auto">
                    <tbody>
                        <tr v-for="group in member.groups" :key="group.id">
                            <td class="px-2 py-3"><inertia-link :href="route('groepen.show', group.name)">{{ group.name }}</inertia-link></td>
                            <td class="px-2 py-3"><jet-button @click="removeFromGroup(member.id, group.id)"><i class="fas fa-user-minus"></i></jet-button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <jet-modal :show='isOpen' @close=closeModal()>
            <div class="p-6">
                <member-form @close="closeModal()" :form="form" :editMode="editMode" />
            </div>
        </jet-modal>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetButton from '@/Jetstream/Button'
import MemberForm from '@/custom/MemberForm'
import JetModal from '@/Jetstream/Modal'

export default {
    props: {
        member: Object,
    },
    methods: {
        openModal: function () {
            this.isOpen = true;
        },

        closeModal: function () {
            this.isOpen = false;
        },

        edit: function (member) {
            this.form.id = member.id,
            this.form.firstname = member.firstname,
            this.form.tussenvoegsel = member.tussenvoegsel,
            this.form.lastname = member.lastname,
            this.form.username = member.username,
            this.form.email = member.email,
            this.form.dateofbirth = member.dateofbirth,
            this.editMode = true;
            this.openModal();
        },

        decoupleMemberUser(member) {
            member._method = 'POST';
            this.$inertia.post('/decouplememberuser/', member)
        },

        removeFromGroup(memberID, groupID) {
            this.groupForm.memberID = memberID
            this.groupForm.groupID = groupID
            this.$inertia.post('/removeMemberFromGroup/', this.groupForm)
        },
    },

    components: {
        AppLayout,
        JetButton,
        MemberForm,
        JetModal
    },

    data: function() {
        return {
            isOpen: false,
            editMode: false,
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
            groupForm: this.$inertia.form({
                _method: 'POST',
                memberID: '',
                groupID: '',
            })

        }
    },
}
</script>
