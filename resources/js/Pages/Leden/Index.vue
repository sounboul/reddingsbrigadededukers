<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Leden
            </h2>
            <p>Hallo, {{ $page.props.user.firstname }}</p>
        </template>
        <div class="flex justify-center w-full">
            <div class="p-6 max-w-3xl">
                <basic-element>
                    <template #title>
                        Informatie
                    </template>
                    <template #description>
                    </template>
                    <template #content>
                        <div>
                            Je bent:
                            <ul>
                                <li v-if="user.is_active">actief</li>
                                <li v-if="user.is_admin">admin</li>
                                <li v-if="user.is_instructor">instructeur</li>
                                <li v-if="user.is_groupeditor">editor</li>
                            </ul>



                        </div>
                    </template>
                </basic-element>
                <basic-element>
                    <template #title>
                        Leden gekoppeld aan dit account
                    </template>

                    <template #description>
                        Selecteer hier het lid dat u wilt inzien
                    </template>

                    <template #content>

                        <div class="flex flex-col space-y-5 w-full">
                            <div v-for="member in user.confirmed_members" :key='member.id' class="flex justify-center">
                                <div>
                                    <link-button :href="route('leden.show', member)">
                                        {{ member.username }}
                                    </link-button>
                                </div>
                            </div>

                            <div v-for="member in user.requested_members" :key='member.id' class="flex justify-center">
                                <div>

                                    <link-button :href="route('leden.show', member)">

                                        {{ member.username }} (aangevraagd)
                                    </link-button>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <custom-button href="#" @click="openModal">
                                    <i class="fas fa-plus-circle mr-2"></i> Voeg toe
                                </custom-button>
                            </div>
                        </div>

                    </template>
                </basic-element>
                <basic-element>
                    <template #title>
                        Groepen
                    </template>
                    <template #description></template>
                    <template #content>
                        <link-button :href="route('groepen.index')">Alle Groepen</link-button>

                    </template>
                </basic-element>
            </div>
        </div>
        <!-- Modal for member coupling or create new member-->
        <jet-modal :show='isOpen' @close=closeModal()>
            <div class="p-6">
                <div class="py-4">
                    <div class="text-xl">
                        Nieuw lid toevoegen
                    </div>
                    <p>
                        Controlleer hier eerst of het account nog niet bestaat. Wanneer het ledenaccount al bestaat, kunt u een koppeling aanvragen.
                        Typ (een deel) van de naam of het emailadres in.
                    </p>
                </div>
                <!-- check already existing users -->
                <find-member @filtered-members="updateFilteredMembers"/>

                <div v-for="member in filteredMembers" :key="member.id" class="py-1">
                    {{ member.firstname }}
                    <jet-button @click="coupleMemberUser(member)">Koppel</jet-button>
                </div>
                <div class="flex">
                    <div>
                        <input id="confirmSearch" type="checkbox" v-model="confirmSearch" v-on:change="toggleNew" class="mx-4">
                    </div>
                    <div>
                        <label for="confirmSearch">Ik heb gezocht op naam en emailadres en het account bestaat nog niet*.</label>
                    </div>
                </div>
                <!-- if not exist, make new user -->
                <div v-if="createNew">
                    <div class="py-6">
                        <h1 class="text-lg">Toevoegen</h1>
                        <p>Voeg hier leden toe. Deze zijn vanuit dit account te beheren. Nieuwe leden moeten wel geaccepteerd worden door de administrator voordat deze gebruikt kan worden.</p>
                        <member-form @close="closeModal" />
                    </div>
                </div>
            </div>
        </jet-modal>
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
        user: Object,
        filteredmembers: Object,
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
            member._method = 'POST';
            this.$inertia.post('/couplememberuser/', member)
            this.$emit('close')
        },
    },
    data: function() {
        return {
            isOpen: false,
            filteredMembers: Object,
            confirmSearch: false,
            createNew: false,
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
