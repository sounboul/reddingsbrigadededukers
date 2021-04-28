<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Groep: {{ group.name }}
            </h2>
        </template>
        <div class=' m-10 px-4 py-5 bg-white sm:p-6 shadow rounded-md'>
            <div>
                <div class="inline-block pr-6">
                    <span class="font-bold">{{ group.name }}</span><br>
                    {{ group.description }}<br>
                </div>
                <jet-button class="mx-4" @click="editMember">Wijzigen</jet-button>
                <jet-button class="mx-4" @click="addMember=true">Leden toevoegen</jet-button>
            </div>
            <div class="mt-10">
                <p>Deelnemers</p>
                <table class="table-auto">
                    <tbody>
                        <tr v-for="member in group.members" :key="member.id">
                            <td class="px-2 py-3"><inertia-link :href="route('leden.show', member.username)">{{ member.firstname }} {{ member.tussenvoegsel }} {{ member.lastname }}</inertia-link></td>
                            <td class="px-2 py-3"><jet-button @click="removeFromGroup(member.id, group.id)"><i class="fas fa-user-minus"></i></jet-button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <jet-modal :show='isOpen' @close=closeModal()>
            <div class="p-6">
                <group-form @close="closeModal()" :group="group" :editMode="editMode" />
            </div>
        </jet-modal>
        <jet-modal :show='addMember' @close="addMember=false">
            <div class="relative p-6">
                <div class="absolute top-4 right-4">
                    <button @click="addMember=false">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <find-member @filtered-members="updateFilteredMembers"/>
                <table class="table-auto mt-6 my-6">
                    <tbody>
                            <tr v-for="member in filteredMembers" :key="member.id">
                                <td class="py-3 px-2">
                                    {{ member.firstname }} {{ member.tussenvoegsel }} {{ member.lastname }}
                                </td>
                                <td class="py-3 px-2">
                                    <jet-button @click="addToGroup(member.id, group.id)"><i class="fas fa-user-plus"></i></jet-button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </jet-modal>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetButton from '@/Jetstream/Button'
import GroupForm from '@/custom/GroupForm'
import JetModal from '@/Jetstream/Modal'
import FindMember from '@/custom/FindMember.vue'

export default {
    props: {
        group: Object,
    },

    methods: {
        openModal: function () {
            this.isOpen = true;
        },
        closeModal: function () {
            this.isOpen = false;
        },

        editMember: function () {
            this.editMode = true;
            this.openModal();
        },

        decoupleMemberUser(group) {
            console.log('decouple')
            console.log(group)
            group._method = 'POST';
            this.$inertia.post('/decouplegroupmember/', group)
        },

        addToGroup(memberID, groupID) {
            this.groupForm.memberID = memberID
            this.groupForm.groupID = groupID
            this.$inertia.post('/addMemberToGroup/', this.groupForm)
        },

        removeFromGroup(memberID, groupID) {
            this.groupForm.memberID = memberID
            this.groupForm.groupID = groupID
            this.$inertia.post('/removeMemberFromGroup/', this.groupForm)
        },

        updateFilteredMembers(e) {
            this.filteredMembers = e
        },
    },

    components: {
        AppLayout,
        JetButton,
        GroupForm,
        JetModal,
        FindMember
    },

    data: function() {
        return {
            isOpen: false,
            editMode: false,
            addMember: false,
            filteredMembers: Object,
            form: this.$inertia.form({
                _method: 'POST',
                id: '',
                name: '',
                description: '',
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
