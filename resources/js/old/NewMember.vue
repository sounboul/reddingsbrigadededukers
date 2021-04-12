<template>
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
                <member-form @close="$emit('close')" :form="form"/>
            </div>

        </div>

    </div>
</template>


<script>
import JetButton from '@/Jetstream/Button'
import MemberForm from '@/custom/MemberForm'
import FindMember from '@/custom/FindMember'

export default {
    components: {
        JetButton,
        MemberForm,
        FindMember
    },
    props: {
        form: Object,
    },
    data: function() {
        return {
            createNew: false,
            filteredMembers: Object,
            confirmSearch: false

        }
    },
    emits: ['close'],
    methods: {
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
    }
}
</script>


